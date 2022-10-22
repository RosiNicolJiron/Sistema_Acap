function VerificarUsuario(){
    var usu = $("#txt_usu").val();
    var con = $("#txt_con").val();

    if(usu.length==0 || con.length==0){
        return Swal.fire("CAMPOS VACIOS", "SISTEMA ACAP");
    }
    $.ajax({
        url:'../controlador/usuario/controlador_verificar_usuario.php',
        type:'POST',
        data:{
            user:usu,
            pass:con
        }
    }).done(function(resp){
        if(resp==0){
            Swal.fire("CREDENCIALES ERRONEAS!", "SISTEMA ACAP");

           
        }else{
            let data= JSON.parse(resp);
            if(data[0][4]==='INACTIVO'){
                return Swal.fire("El usuario "+usu+ "esta INACTIVO", "comuniquese con el administrador del sistema ACAP");
            }
            $.ajax({
                url:'../controlador/usuario/controlador_crear_session.php',
                type:'POST',
                data:{
                    idusuario:data[0][0],
                    user:data[0][1],
                    rol:data[0][5]
                }
            }).done(function(resp){
                let timerInterval
                Swal.fire({
                title: 'BIENVENIDO AL SISTEMA ACAP',
                html: 'ACCEDIENDO BIENVENIDO ACAP en <b></b> milisegundos.',
                timer: 2000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                        b.textContent = Swal.getTimerLeft()
                        }
                    }
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    location.reload();
                }
})
            })
           
        }
    })
}

function mostrarContrasena(){
    var tipo = document.getElementById("txt_con");
    if(tipo.type == "password"){
        tipo.type = "text";
    }else{
        tipo.type = "password";
    }
}

var table
function listar_usuario(){
     table = $("#tabla_usuario").DataTable({
       "ordering":false,
       "paging": false,
       "searching": { "regex": true },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
       "pageLength": 10,
       "destroy":true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/usuario/controlador_usuario_listar.php",
           type:'POST'
       },
       "columns":[
           {"data":"posicion"},
           {"data":"usu_name"},
           {"data":"rol_nombre"},
           {"data":"usu_sexo",
                render: function (data, type, row ) {
                    if(data=='M'){
                        return "MASCULINO";                   
                    }else{
                        return "FEMINO";                 
                    }
                }
           }, 
           {"data":"usu_estatus",
             render: function (data, type, row ) {
               if(data=='ACTIVO'){
                   return "<span class='label label-success'>"+data+"</span>";                   
               }else{
                 return "<span class='label label-danger'>"+data+"</span>";                 
               }
             }
           },  
           {"defaultContent":"<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-trash'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success'><i class='fa fa-check'></i></button>"}
       ],

       "language":idioma_espanol,
       select: true
   });
   document.getElementById("tabla_usuario_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column'));
    });

}

$('#tabla_usuario').on('click','.activar',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de activar al usuario?',
        text: "Una vez hecho esto el usuario  tendra acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.usu_id,'ACTIVO');
        }
      })
})

$('#tabla_usuario').on('click','.desactivar',function(){
    var data = table.row($(this).parents('tr')).data();
    if(table.row(this).child.isShown()){
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de desactivar al usuario?',
        text: "Una vez hecho esto el usuario no tendra acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
      }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.usu_id,'INACTIVO');
        }
      })
})

function Modificar_Estatus(idusuario,estatus){
    var mensaje ="";
    if(estatus=='INACTIVO'){
        mensaje="desactivo";
    }else{
        mensaje="activo";
    }
    $.ajax({
        "url":"../controlador/usuario/controlador_modificar_estatus_usuario.php",
        type:'POST',
        data:{
            idusuario:idusuario,
            estatus:estatus
        }
    }).done(function(resp){
        if(resp>0){
            Swal.fire("Mensaje De Confirmacion","El usuario se "+mensaje+" con exito","success")            
            .then ( ( value ) =>  {
                table.ajax.reload();
            }); 
        }
    })


}

function filterGlobal() {
    $('#tabla_usuario').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}


function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

function AbrirModalRegistro2(){
    $("#modal_registro2").modal({backdrop:'static',keyboard:false})
    $("#modal_registro2").modal('show');
}

function listar_combo_rol(){
    $.ajax({
        "url":"../controlador/usuario/controlador_combo_rol_listar.php",
        type:'POST'
    }).done(function(resp){
        var data = JSON.parse(resp);
        var cadena="";
        if(data.length>0){
            for(var i=0; i < data.length; i++){
                cadena+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
            }
            $("#cbm_rol").html(cadena);
        }else{
            cadena+="<option value=''>NO SE ENCONTRARON REGISTROS</option>";
        }
    })
}

function Registrar_Usuario(){
    var usu = $("#txt_usu").val();
    var contra = $("#txt_con1").val();
    var contra2 = $("#txt_con2").val();
    var sexo = $("#cbm_sexo").val();
    var rol = $("#cbm_rol").val();
    var email = $("#txt_email").val();



    var testUsuario = /^[a-zA-Z0-9\_\-]{4,16}$/.test(usu);
    if(!testUsuario){
        return Swal.fire("EL USUARIO DEBE TENER UN MINIMO DE 4 CARACTERES")
    }
    var testContra = /^.{8,12}$/.test(contra);
    if(!testContra){
        return Swal.fire("LA CONTRASEÑA DEBE TENER UN MINIMO DE 4 CARACTERES")
    }
    var testEmail = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(email);
    if(!testEmail){
        return Swal.fire("EL CORREO NO ES VALIDO")
    }
   

   


    if(usu.length==0 || contra.length==0 ||contra2.length==0 ||sexo.length==0 ||rol.length==0 ||email.length==0 ){
      return Swal.fire("CAMPOS VACIOS")
    }

    if(contra != contra2){
        return Swal.fire("LAS CONTRASEÑAS DEBEN SER IGUALES")
    }

  
   $.ajax({
        "url":"../controlador/usuario/controlador_usuario_registro.php",
        type:'POST',

        data:{
           usuario: usu,
           contrasena: contra,
           sexo:sexo,
           rol:rol,
           email:email
        }

    }).done(function(resp){
        console.log(resp)
        if(resp>0){
            if(resp==1){ 
                $("#modal_registro").modal('hide');
                Swal.fire("REGISTRO INSERTADO")

                .then((value)=>{
                    LimpiarRegistro();
                    table.ajax.reload()
                }) 

            }else{
                Swal.fire("EL USUARIO YA EXISTE");
            }
        }else{
          Swal.fire("NO SE PUDO HACER EL REGISTRO");
        }
    })

}

function Registrar_Usuario2(){
    var usu = $("#txt_usu").val();
    var contra = $("#txt_con1").val();
    var contra2 = $("#txt_con2").val();
    var sexo = $("#cbm_sexo").val();
    var rol = $("#cbm_rol").val();
    var email = $("#txt_email").val();






   


    if(usu.length==0 || contra.length==0 ||contra2.length==0 ||sexo.length==0 ||rol.length==0 ||email.length==0 ){
      return Swal.fire("CAMPOS VACIOS")
    }

    var testUsuario = /^[a-zA-Z0-9\_\-]{4,16}$/.test(usu);
    if(!testUsuario){
        return Swal.fire("EL USUARIO DEBE TENER UN MINIMO DE 4 CARACTERES")
    }
    var testContra = /^.{8,12}$/.test(contra);
    if(!testContra){
        return Swal.fire("LA CONTRASEÑA DEBE TENER UN MINIMO DE 4 CARACTERES")
    }
    var testEmail = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(email);
    if(!testEmail){
        return Swal.fire("EL CORREO NO ES VALIDO")
    }
    if(contra != contra2){
        return Swal.fire("LAS CONTRASEÑAS DEBEN SER IGUALES")
    }

  
   $.ajax({
        "url":"../controlador/usuario/controlador_auto_registro.php",
        type:'POST',

        data:{
           usuario: usu,
           contrasena: contra,
           sexo:sexo,
           rol:rol,
           email:email
        }

    }).done(function(resp){
       
        if(resp>0){
            if(resp==1){ 
                $("#modal_registro").modal('hide');
                Swal.fire("REGISTRO INSERTADO")

                .then((value)=>{
                    LimpiarRegistro();
                    table.ajax.reload()
                }) 

            }else{
                Swal.fire("EL USUARIO YA EXISTE");
            }
        }else{
          Swal.fire("NO SE PUDO HACER EL REGISTRO");
        }
    })

}


function LimpiarRegistro(){
    $("#txt_usu").val("")
    $("#txt_con1").val("")
    $("#txt_con2").val("")
    $("#txt_email").val("")

}
function AbrirModalRestablecer(){
    $("#modal_restablecer_contra").modal({backdrop:'static', keyboard:false});
    $("#modal_restablecer_contra").modal('show');
    $("#modal_restablecer_contra").on('shown.bs.modal',function(){
        $('#txt_email').focus();
    })

}


function Restablecer_Contra(){
var caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789"
var contrasena = "";
var email = document.getElementById("txt_email").value

if(email.length == 0){
  return  Swal.fire("EL CORREO ES REQUERIDO")
}



for (var i = 0; i < 8; i++) {
   
  contrasena += caracteres.charAt(Math.floor(Math.random()*caracteres.length))
    }


$.ajax({
url:'../controlador/usuario/controlador_restablecer_contra.php',
type:'POST',
data:{
    email: email,
    contrasena:contrasena
}
}).done(function(resp){
alert("CORREO ENVIADO")
})


}


function Cambiar(){
    let con1 = document.getElementById("con1").value
    let con2 = document.getElementById("con2").value
    let email = document.getElementById("email").value

    if(con1.length==0 ||con2.length==0 ||email.length==0 ){
        return Swal.fire("CAMPOS VACIOS")
      }
  
      var testContra = /^.{8,12}$/.test(con1);
      if(!testContra){
          return Swal.fire("LA CONTRASEÑA DEBE TENER UN MINIMO DE 4 CARACTERES")
      }

      if(con1 != con2){
          return Swal.fire("LAS CONTRASEÑAS DEBEN SER IGUALES")
      }
      
      $.ajax({
       
        "url":"../controlador/usuario/controlador_contra.php",
        type:'POST',

        data:{
            email:email,
           contrasena: con1
            
        }

    }).done(function(resp){
        alert("ACTUALIZADO")
    })
    }
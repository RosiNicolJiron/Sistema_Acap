<script type="text/javascript" src="../js/usuario.js?rev=<?php echo time();?>"></script>
<script src="https://kit.fontawesome.com/4634888c33.js" crossorigin="anonymous"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
              <h3 class="box-title">BIENVENIDO USUARIO</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
              <!-- /.box-tools -->
        </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="form-group">
                <div class="col-lg-10">
                    <div class="input-group">
                        <input type="text" class="global_filter form-control" id="global_filter" placeholder="Ingresar dato a buscar">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    </div>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                </div>
            </div>
            <table id="tabla_usuario" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Sexo</th>
                        <th>Estatus</th>
                        <th>Acci&oacute;n</th>
                    </tr>
                </thead>
               
            </table>
            </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
</div>
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>Registro De Usuario</b></h4>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" id="txt_usu" placeholder="Ingrese usuario"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="txt_con1" placeholder="Ingrese contrase&ntilde;a"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Repita la Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="txt_con2" placeholder="Repita contrase&ntilde;a"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Correo</label>
                    <input type="text" class="form-control" id="txt_email" placeholder="Ingrese Correo"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Sexo</label>
                    <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select><br><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Rol</label>
                    <select class="js-example-basic-single" name="state" id="cbm_rol" style="width:100%;">
                    <option value=1 >ADMINISTRADOR</option>
                    <option value=2 >INVITADO</option>
                    </select><br><br>
                </div>

            </div>
            <div class="modal-footer">
                <button onclick="Registrar_Usuario()" class="btn btn-primary"> <i class="fa-sharp fa-solid fa-check"> REGISTRARSE</i></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-right-from-bracket">SALIR</i></button>
            </div>
        </div>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    listar_usuario();
    $('.js-example-basic-single').select2();
    listar_combo_rol();
    $("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_usu").focus();  
    })
} );
</script>

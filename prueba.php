<?php
// Ver el ejemplo de password_hash() para ver de dónde viene este hash.
$hash = 'sEe6VmLcWMLfW2T+eL1Um2Hb909nO1SnfsEXxF/bILHIIvUM0zPYly0zgeS4a/IR';

if (password_verify('HPANIAGUA2020', $hash)) {
    echo '¡La contraseña es válida!';
} else {
    echo 'La contraseña no es válida.';
}
?>
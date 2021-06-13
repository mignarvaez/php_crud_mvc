<?php
//Se incluye el encabezado o header, luego se crear una estructura html para mostrar el mensaje de error
//La estructura en la que se lee el error message equivale a la del php echo
include('header.php');
?>
<h2>Error</h2>
<br>
<p><?= $error_message ?></p>
<br>
<p><a href=".">Regresa al formulario de peticiones</a></p>

<?php
//Se incluye el footer
include('footer.php');
?>

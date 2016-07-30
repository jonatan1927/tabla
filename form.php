<?php
//incluímos la clase ajax
require ('xajax.php');

//instanciamos el objeto de la clase xajax
$xajax = new xajax(); 
$xajax->setCharEncoding('ISO-8859-1');
$xajax->decodeUTF8InputOn();
//registramos la función creada anteriormente al objeto xajax
$xajax->registerFunction("procesar_formulario");
//El objeto xajax tiene que procesar cualquier petición
$xajax->processRequests();
?>
<html>
<head>

   <title>Enviar y procesar un formulario con Ajax y PHP</title>
   <?php
   //En el <head> indicamos al objeto xajax se encargue de generar el javascript necesario
   $xajax->printJavascript("xajax/");
   ?>
</head>

<body>
<h1>Recibir y procesar formulario con Ajax y PHP</h1>
<div id="mensaje">
Rellena los datos de este formulario y pulsa "Enviar"
</div>
<br />
<div id="capaformulario">
<form id="formulario">
Nombre: <input type="text" name="nombre" />
<br />
Apellidos: <input type="text" name="apellidos" />
<br />
<input type="checkbox" name="acepto" value="1" /> Acepto los términos y condiciones ;)
<br />
<input type="button" value="Enviar" onclick="xajax_procesar_formulario(xajax.getFormValues('formulario'))" />
</form>
</div>

</body>
</html>
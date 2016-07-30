<?php function procesar_formulario($form_entrada){
   //creo el xajaxResponse para generar una salida
   $respuesta = new xajaxResponse('ISO-8859-1');

   //validación
   $error_form = "";
   if ($form_entrada["nombre"] == "")
      $error_form = "Debes escribir tu nombre";
   elseif ($form_entrada["apellidos"] == "")
      $error_form = "Debes escribir tus apellidos";
   elseif (!isset($form_entrada["acepto"]))
      $error_form = "Debes aceptar los términos y condiciones";
      
   //compruebo resultado de la validación
   if ($error_form != ""){
      //Hubo un error en el formulario
      //en la capa donde se muestran mensajes, muestro el error
      $respuesta->addAssign("mensaje","innerHTML","<span style='color:red;'>$error_form</span>");
   }else{
      //es que no hubo error en el formulario
      $salida = "Hemos procesado esto:<p>";
      $salida .= "Nombre: " . $form_entrada["nombre"];
      $salida .= "<br>Apellidos: " . $form_entrada["apellidos"];
      
      //mostramos en capa mensaje el texto que está todo correcto
      $respuesta->addAssign("mensaje","innerHTML","<span style='color:blue;'>Todo correcto... Muchas gracias!</span>");
      //escribimos en la capa con id="capaformulario" el texto que aparece en $salida
      $respuesta->addAssign("capaformulario","innerHTML",$salida);
      
      //tenemos que devolver la instanciación del objeto xajaxResponse
   }
   return $respuesta;
} 
?>


<?php
// antes de entrar al la captura primero se devera comprobar el acceso al capturista
// y establecer el paquete al que perteneceran todos las encuestas a capturar
//
session_start();
      
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
         <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    
            <style type="text/css">
.classname {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5');
	background-color:#79bbff;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:1px 1px 0px #528ecc;
}.classname:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378de5', endColorstr='#79bbff');
	background-color:#378de5;
}.classname:active {
	position:relative;
	top:1px;
}
/* This imageless css button was generated by CSSButtonGenerator.com */
</style>
       
    </head>
    <body>
       
        <div style="margin:40px auto 0 auto; width:390px;box-shadow: 0px 0px 10px #888888;padding: 15px; font-family: Aharoni; ">
                       <h1>Acceso a Administracion </h1>
            <form id="login" method="post">
            <label  for="nombre">Nombre</label><input id="nombre" name="nombre">
            <br>
            <label for="contra">Contraseña</label><input id="contra" name="contra"type="password">
            <br>
            <input id="entrar" class="classname" type="button" value="Entrar"> </input>           
        </form>
        <span  id="results"></span>
        </div>
 <script>

     $('#entrar').click(function () {
         var str = $("form").serialize();
         
         //alert(str);
         $.ajax({
             url: "../validarlogin.php",
             method: "post",
             data: str,
             success: function (data) {
                 if (data == 1) {
                     window.open("index.php", "_self")
                 } else {
                     $("#results").text(data);
                 }


             }
         });

     });

</script>

    </body>

</html>
<?php
    include('conexion.php');    
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Opciones  Admin</title>
         <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
         <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
         <style>
           html,
           body{
            width: 100%;
            height: 100%;
           } 
         </style>
    </head>
    <body class="container">
       <!--div de botón monitor-->
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> <h3 style="height: 34px; padding: 0px; margin: 0px;">Monitoreo de capturas <button id="monitor" class="btn btn-success"> Mostrar </button></h3> 
       <hr style="margin: 2px;"></div>
       <!--====================-->

       <!--div de reporte por capturista-->
       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="height: calc(50% - 40px);">
           <h3>Reporte Excel Filtro por Capturista</h3>
          <form id="usuarios" method="post">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 15px;">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                <?
                 $mysql= new MySQL;
                 $consulta ='select * from usuario';
                 $resultado = $mysql->MyConsulta($consulta);
                 $mysql->MyResultado($resultado);
                ?>
            </div>
            <div div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 ">
                <input type="radio" name="encuestas" value="preferencias" checked> Preferencias Declaradas<br>
                <input type="radio" name="encuestas" value="ods"> Origen y Destino<br>
            </div>
            <div div class="col-xs-9 col-sm-9 col-md-9 col-md-offset-3 col-lg-9 col-lg-offset-3" style="padding-top: 15px;">
              <button id="btnUsuarios" class="btn btn-primary">Crear EXCEl</button>
            </div>
          </div>
        </form>
       </div>
       <!--=============================-->
 
       <!--div de reporte por estaciones-->
       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="height: calc(50% - 40px);"> 
           <h3>Reporte Excel Filtro por Estaciones</h3>
           <h3>Preferencias Declaradas</h3> 
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 15px;">   
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           		<form id="paquetes" method="post">
		             <?
		             $mysql= new MySQL;
		             $consulta ='select * from paquetes where estacion !=""';
		             $resultado = $mysql->MyConsulta($consulta);
		            
		                      echo "<select name=\"id_paquete\">";
		                       while ($fila=mysql_fetch_array($resultado, MYSQL_NUM)) {
		                         echo"<option value=\"$fila[0]\" >".$fila[2]."-".$fila[3]."-".$fila[4]."</option>";
		                       }
		                       echo "</select>";
		             ?>       
           		</form>
          	</div>         
          	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 15px;">
	           <input type="radio" name="encuestas2" value="preferencias" checked> Preferencias Declaradas<br>
	           <input type="radio" name="encuestas2" value="ods"> Origen y Destino<br>
         	</div>
          </div>
          <div div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 15px;">
           <button id="btnPaquetes" class="btn btn-primary">Crear EXCEl</button>
          </div>
       </div>
       <!--=============================-->

       <!--div para agregar capturista-->
       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="height: 50%;">
               <h3>Agregar Capturista</h3>
           <form id="agregarUsuario">
           	 <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-top: 15px;">
               <label for="nombre"> Primer Nombre</label>
             </div>
             <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding-top: 15px;">
               <input name="nombre"></input>
             </div>
             <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-top: 15px;">
               <label for="apellidos">Apellidos</label>
             </div>
             <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding-top: 15px;">
             	<input name="apellidos"></input>
             </div>
             <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-top: 15px;">
               <label for="nombre">Contraseña</label>
             </div>
             <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding-top: 15px;">
             	<input name="contra" type="password"></input>
             </div>
             <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-top: 15px;">
               <label for="nombre">Tipo de usuario</label>
             </div>
             <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding-top: 15px;">
               <select name="tipo">
               <option>capturista</option>
               <option>administrador</option>
               </select><br>  
             </div>
           </form>
           <div div class="col-xs-12 col-sm-12 col-md-9 col-md-offset-3 col-lg-9 col-lg-offset-3" style="padding-top: 15px;">
           	<button id="btn_agregarUsuario" class="btn btn-primary">Crear Nuevo</button>
           </div> 
       </div>
       <!--=============================-->
       
       <!--div para agregar capturista-->
       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="height: 50%;">
           <h3>Agregar Estaciones</h3>      
           <form id="agregarEstaciones">
               <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-top: 15px;">
               	<label for="estacion">Estacion</label>
               </div>
               <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding-top: 15px;">
               	<input name="estacion"></input>
               </div>
               <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-top: 15px;">
               	<label for="carretera">Carretera</label>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding-top: 15px;">
              	<input name="carretera"></input><br>
              </div>
              <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-top: 15px;">
               <label for="km">KM</label>
              </div>
              <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" style="padding-top: 15px;">
              	<input name="km" ></input>
             </div>
           </form>
           <div div class="col-xs-12 col-sm-12 col-md-9 col-md-offset-3 col-lg-9 col-lg-offset-3" style="padding-top: 15px;">
           	<button id="btn_agregarEstaciones"  class="btn btn-primary">Crear Nuevo</button>
          </div>
       </div>
       <!--=============================-->

       <script>
           $('#btnUsuarios').click(function () {
               opcion = $( "input:radio[name=encuestas]:checked" ).val();
               
               var str = $("#usuarios").serialize();
               
            if( opcion == "preferencias"){
              //alert(str);
              window.open("../excel/excel_pre_dec_nov_user.php?" + str, "_blank");
            }else if( opcion == "ods"){
              alert('Desde usuarios' + str);
              window.open("../excel/excel_ods_nov_user.php?" + str, "_blank");
            };
                
           });

           $("#monitor").click(function(){
              window.open("../monitor.html", "_blank");
           });

           $('#btnPaquetes').click(function () {
            opcion = $( "input:radio[name=encuestas2]:checked" ).val();
               var str = $("#paquetes").serialize();
               console.log('Desde Paquetes' + str);
              if( opcion == "preferencias"){
               window.open("../excel/excel_pre_dec_nov.php?" + str, "_self");
              }else if( opcion == "ods"){
              
              window.open("../excel/excel_ods_nov2.php?" + str, "_self");
            }
           })

           $('#btn_agregarUsuario').click(function () {
               var str = $("#agregarUsuario").serialize();
               console.log('Desde agregarUsuario' + str);
               $.ajax({
                   url: "agregarUsuario.php",
                   data: str,
                   success: function (data) {
                       if (data == 1) {
                           alert('el usuario ha sido agregado a la base de datos')
                       } else {
                           alert('no se pudo agregar el usuario');
                       }
                   }
               });
           })
             $('#btn_agregarEstaciones').click(function () {
               var str = $("#agregarEstaciones").serialize();
               console.log('Desde agregarEstaciones' + str);
               $.ajax({
                   url: "agregarEstaciones.php",
                   data: str,
                   success: function (data) {
                       if (data == 1) {
                           alert('la estacion fue dada de alta satisfactoriamente');
                       } else {
                           alert('no se pudo agregar la estacion');
                       }
                   }
               });
           })
       </script>

    </body>
</html>

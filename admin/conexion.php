<?php
 class ACCESS{

  public $conexion; private $total_consultas;

  public function ACCESS(){ 
   
    if(!isset($this->conexion)){
    $mdbFilename="Gestion.mdb";
	$accesFile = dirname(__FILE__) . "\\" . $mdbFilename;
    echo $accesFile;
    $user="";
    $password="";
    $this->conexion = (odbc_connect("Driver={Microsoft Access Driver (*.mdb)};Dbq=$accesFile" , $user, $password))
		or die(odbc_error());
		}
		}

		public function consulta($consulta){
		$this->total_consultas++;
		if ($resultado = odbc_exec($this -> conexion, $consulta)) {
		return $resultado;
		}
		}

		public function fetch_object($resultado){
		$datoscsv[][] = "";
		$i=0;
		$j=0;
		while ($fila = odbc_fetch_object($resultado)) {
		$j=0;	
		foreach ($fila as $NomColumna => $ValColumna) {
		$datoscsv[$i][$j] = $ValColumna;
		//$datoscsv[][] = ;
		$j++;
		}
		$i++;
		}
		return $datoscsv;
		}

        public function veriAccess($datoscsv){
		 	
		 if(count($datoscsv)!=1){
		 	echo "<br>Esta base de datos cuenta con mas de una Carretera<br>";
			 }
		 else{
		 	echo "<br>Esta base de datos cuenta con una Carretera<br>";
		 	return $datoscsv; 
		 }	
	       
		}
		public function echoarray($datoscsv){
		//echo count($datoscsv)."<br>";	
	        $cadena="";
		foreach($datoscsv as $primeros){
                     foreach($primeros as $segundos){
                     	 $cadena .= $segundos." , ";	          				 
                 }
		          $cadena .="<br>";
               }
        echo $cadena;
		}
      


		public function getTotalConsultas(){
		return $this->total_consultas;
		}
         //OBTIENE EL TOTAL DE LAS TABLAS ESXISTENTES EN ACCES
		 public function getTotalTablas(){
		 	$result = odbc_tables($this -> conexion);
     		$tables = array();
	         	while (odbc_fetch_row($result)) {
			           if (odbc_result($result, "TABLE_TYPE") == "TABLE") {
			        	$tablas[] = odbc_result($result, "TABLE_NAME");
			           }
		           }
		 		return $tablas;  
		 }
    	
    	
}

		
		class MySQL{  
 private $conexion;  
  private $total_consultas;  
 public function MySQL(){  
  if(!isset($this->conexion)){  
  $this->conexion = (mysql_connect("jayrosalgadocom.ipagemysql.com","pre_dec_user","pre_dec_123")) or die(mysql_error());  
  mysql_select_db("pre_dec",$this->conexion) or die(mysql_error());  
  }  
  }  
 public function MyConsulta($consulta){  
  $this->total_consultas++;  
  $resultado = mysql_query($consulta,$this->conexion);
  if(!$resultado){  
  echo 'MySQL Error: ' . mysql_error();  
  exit;  
  }  else{
  return $resultado;   
  }
  
  }  
 
        public function MyEcho($resultado){
         $ray = mysql_num_rows($resultado);
         if($ray>0){
  	  
           return TRUE;   
          }else{
        //    	echo"La carretera no se encontro en la base de datos se procedera a agregarla...";
           return FALSE;  
		  }

        	}
	public function MyResultado($resultado){
         $ray = mysql_num_rows($resultado);
         if($ray>0){
  	   // echo "<br>La carretera lla existe en mysql. Desea reemplazarla por la nueva?";	
  	    
            //printf("ID: %s  Nombre: %s", $fila[0], $fila[1]);
                      echo "<select name=\"id\">";
                       while ($fila=mysql_fetch_array($resultado, MYSQL_NUM)) {
                         echo"<option value=\"$fila[0]\" >$fila[1]</option>";
                       }
                       echo "</select>";
           
           return TRUE;   
          }else{
        //    	echo"La carretera no se encontro en la base de datos se procedera a agregarla...";
           return FALSE;  
		  }

        	}
	
}
		
		
		
?>


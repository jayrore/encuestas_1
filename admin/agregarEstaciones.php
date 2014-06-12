<?php
$con=mysqli_connect("jayrosalgadocom.ipagemysql.com","pre_dec_user","pre_dec_123","pre_dec");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

mysqli_query($con,"INSERT INTO paquetes (estacion,carretera,km)
VALUES ('$estacion', '$carretera', '$km')");
echo mysqli_affected_rows($con);

mysqli_close($con);
?>


<?php 
session_start();
include "init.php";
$username= $_POST["username"];
$Password = $_POST["pass"];


$qiot = $con->prepare('SELECT * FROM Dati_iot WHERE Username = :name and Password = :pw ');
$qiot->execute(array('name' => $username, 'pw' => $Password));


foreach ($qiot as $result) {
	$_SESSION['name'] = $result['Username'];
	if( $result['Admin'] == 1 ) $_SESSION['priv'] = 1;
	else if ( $result['Ambientista'] == 1 ) $_SESSION['priv'] = 2;
	else $_SESSION['priv'] = 3;
	
header("location: adiot/panel.php");}
    


$clst = $con->prepare('SELECT * FROM Dati_clienti WHERE Username = :name and Password = :pw ');
$clst->execute(array('name' => $username, 'pw' => $Password));



foreach ($clst as $resc) {
	 $v = 1;
	 $_SESSION['name'] = $resc['Username'];
	 $_SESSION['azienda']= $resc['Azienda'];
	 $_SESSION['mail']= $resc['Mail'];
	 $_SESSION['prop']= $resc['Proprietario'];
	 header("location: cli/clients.php");
	
}

if ( !isset($v) ){

	
	echo '<script type="text/javascript">'; 
	echo 'alert("Username o Password errata.");'; 
	echo 'window.location.href = "index.php";';
	echo '</script>';
}	
	

/*

$qiot = "select * from Dati_iot where Username='$username' and Password='$Password';";
$qclient = "select * from Dati_clienti where Username='$username' and Password='$Password';";

if(mysqli_num_rows( mysqli_query($con,$qiot) ) > 0)
{
 $fetch = mysqli_fetch_array( mysqli_query($con,$qiot) );
 $_SESSION['name'] = $fetch['Username'];
 echo '<script type="text/javascript">'; 
 echo 'window.location.href = "/adiot/panel.php";';
 echo '</script>';
 
}
elseif (mysqli_num_rows(mysqli_query($con,$qclient))> 0) {

 $fetch = mysqli_fetch_array( mysqli_query($con,$qclient) );
 $_SESSION['name'] = $fetch['Username'];
 $_SESSION['azienda']= $fetch['Azienda'];
 $_SESSION['mail']= $fetch['Mail'];
 $_SESSION['prop']= $fetch['Proprietario'];

 echo '<script type="text/javascript">'; 
 echo 'window.location.href = "/cli/clients.php";';
 echo '</script>';
 
}

else{

echo '<script type="text/javascript">'; 
echo 'alert("Username o Password errata.");'; 
echo 'window.location.href = "index.php";';
echo '</script>';
}

*/
?>
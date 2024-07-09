<?php
function wa_auth(){
	if(!isset($_SESSION['cus_name'])){
	  header('Location: http://localhost/arraysystemslimited/login_cus.php');
	}
	else{
		return true;
	}
}
?>
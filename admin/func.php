<?php
function wa_auth(){
	if(!isset($_SESSION['admin_name'])){
	  header('Location: http://localhost/arraysystemslimited/admin/login.php');
	}
	else{
		return true;
	}
}
?>
<?php
function wa_auth(){
	if(!isset($_SESSION['salesuser'])){
	  header('Location: https://dashboard.selectdigitizing.com/sales/login.php');
	}
	else{
		return true;
	}
}
?>
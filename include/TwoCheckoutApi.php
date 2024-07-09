<?php 

 
 class TwoCheckoutApi
{
    function __construct()
	{
        include_once 'include/lib/Twocheckout.php'; 
        
        Twocheckout::sellerId('253800487474'); 
        Twocheckout::privateKey('AA0B68F6-5DB9-41B2-A24A-D5F024245800');
    }
	
    public function createCharge($post_data, $token)
	{ 
		if(!$token) {return "<p>Error on form submission.</p>";}
		
		//store order details in database 
		//and get order_id from database
		// $merchantOrderID 	= 1;
		echo ($token);
        try { 
		
            $charge = Twocheckout_Charge::auth(array(
                "sellerId" => "253800487474",
    "privateKey" => "AA0B68F6-5DB9-41B2-A24A-D5F024245800",
                "merchantOrderId" => "123",
                "token"      	  => $token,
                "currency"   	  => "usd",
                "total"      	  => "0.01",
                "billingAddr" 	  => array(
                    "name" 		  => "John Doe",
                    "addrLine1"   => "123 Test St",
                    "city" 		  => "Columbus",
                    "state" 	  => "Ohio",
                    "zipCode" 	  => "43123",
                    "country" 	  => "USA",
                    "email" 	  => "example@2co.com",
                    "phoneNumber"=> "5555555555"
                ),
				"demo"=> false,
            ));
			
			if ($charge['response']['responseCode'] == 'APPROVED') 
			{
				$statusMsg = "";
				$statusMsg = '<h2>Thanks for your Order!</h2>';
				$statusMsg .= '<h4>The transaction was successful. Order details are given below:</h4>';
				$statusMsg .= "<p>Response Code: ".$charge['response']['responseCode']."</p>";
				$statusMsg .= "<p>Order ID: ".$charge['response']['orderNumber']."</p>";
				$statusMsg .= "<p>Transaction ID: ".$charge['response']['transactionId']."</p>";
				$statusMsg .= "<p>Order Total: ".$charge['response']['total']." ".CURRENCY_CODE."</p>";
			}
			else
			{
				$statusMsg = "";
				$statusMsg = '<h2>OOPS! Transaction Faild</h2>';
				$statusMsg .= '<h4>The transaction was not successful. Response code is given below:</h4>';
				$statusMsg .= "<p>Response Code: ".$charge['response']['responseCode']."</p>";
			}
			
			return $statusMsg; 
			
        }catch(Exception $e) { 
            return "<p>API Errors: {$e->getMessage()}</p>";
        }
	
	}
	
}
?>
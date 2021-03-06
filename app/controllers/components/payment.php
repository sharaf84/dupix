<?php
class PaymentComponent extends AppController {
	
	var $name = 'Payment';
	
	// ----------------
	// This is secret for encoding the MD5 hash
	// This secret will vary from merchant to merchant
	// To not create a secure hash, let SECURE_SECRET be an empty string - ""
	public $secureSecret = "E49780B4C8FDB4E38222ADE7F3B97CCA";
	public $virtualPaymentClientURL = 'https://migs.mastercard.com.au/vpcpay';
	public $postData = array (
		'Title' => 'PHP VPC 3-Party',
		'vpc_AccessCode' => 'F05FC469', 
		'vpc_Merchant' => 'TEST512345USD', 
		'vpc_MerchTxnRef' => 'sharaf123', 
		'vpc_Version' => 1, 
		'vpc_Command' => 'pay', 
		'vpc_OrderInfo' => 'VPC Example', 
		'vpc_Locale' => 'en', 
		'vpc_TicketNo' => '', 
		'vpc_TxSourceSubType' => '',
		'vpc_Amount' => 0,//set from controller 
		'vpc_ReturnURL' => 'http://localhost/projects/bank/vpc_php_serverhost_dr.php'//set from controller 
	);
	//public $responseData = array();
	
	/***************************************************
	 * Initializes PaymentComponent for use in the controller
	 *
	 * @param object $controller A reference to the instantiating controller object
	 * @return void
	 * @access public
	 */
	function startup(&$controller) {
		$this->setVars ();
	}
	
	public function setVars() {
		//set data here
	}
	
	public function postPaymentData() {
		// *********************
		// START OF MAIN PROGRAM
		// *********************
		
		// add the start of the vpcURL querystring parameters
		$vpcURL = $this->virtualPaymentClientURL."?";
		
		// The URL link for the receipt to do another transaction.
		// Note: This is ONLY used for this example and is not required for 
		// production code. You would hard code your own URL into your application.

		// Get and URL Encode the AgainLink. Add the AgainLink to the array
		// Shows how a user field (such as application SessionIDs) could be added
		//$_POST['AgainLink']=urlencode($HTTP_REFERER);

		// Create the request to the Virtual Payment Client which is a URL encoded GET
		// request. Since we are looping through all the data we may as well sort it in
		// case we want to create a secure hash and add it to the VPC data if the
		// merchant secret has been provided.
		
		$md5HashData = $this->secureSecret;
		ksort ($this->postData);
		
		// set a parameter to show the first pair in the URL
		$appendAmp = 0;
		
		foreach ( $this->postData as $key => $value ) {
			
			// create the md5 input and URL leaving out any fields that have no value
			if (strlen ( $value ) > 0) {
				
				// this ensures the first paramter of the URL is preceded by the '?' char
				if ($appendAmp == 0) {
					$vpcURL .= urlencode ( $key ) . '=' . urlencode ( $value );
					$appendAmp = 1;
				} else {
					$vpcURL .= '&' . urlencode ( $key ) . "=" . urlencode ( $value );
				}
				$md5HashData .= $value;
			}
		}
		
		// Create the secure hash and append it to the Virtual Payment Client Data if
		// the merchant secret has been provided.
		if (strlen ( $this->secureSecret ) > 0) {
			$vpcURL .= "&vpc_SecureHash=" . strtoupper ( md5 ( $md5HashData ) );
		}
		
		// FINISH TRANSACTION - Redirect the customers using the Digital Order
		// ===================================================================
		header ( "Location: " . $vpcURL );
		
	// *******************
	// END OF MAIN PROGRAM
	// *******************
	}
	
	public function getResponseData() {
		// *********************
		// START OF MAIN PROGRAM
		// *********************
				
		// If there has been a merchant secret set then sort and loop through all the
		// data in the Virtual Payment Client response. While we have the data, we can
		// append all the fields that contain values (except the secure hash) so that
		// we can create a hash and validate it against the secure hash in the Virtual
		// Payment Client response.
		
		// NOTE: If the vpc_TxnResponseCode in not a single character then
		// there was a Virtual Payment Client error and we cannot accurately validate
		// the incoming data from the secure hash. */
		
		// get and remove the vpc_TxnResponseCode code from the response fields as we
		// do not want to include this field in the hash calculation
		$vpc_Txn_Secure_Hash = $_GET["vpc_SecureHash"];
		unset($_GET["vpc_SecureHash"]);

		unset($_GET["url"]);//This is a CAKE key causing invaled hash.
		
		// set a flag to indicate if hash has been validated
		//$errorExists = false;
		
		if (strlen($this->secureSecret) > 0 && $_GET["vpc_TxnResponseCode"] != "7" && $_GET["vpc_TxnResponseCode"] != "No Value Returned") {
		
		    $md5HashData = $this->secureSecret;
		
		    // sort all the incoming vpc response fields and leave out any with no value
		    foreach($_GET as $key => $value) {
		        if ($key != "vpc_SecureHash" || strlen($value) > 0) {
		            $md5HashData .= $value;
		        }
		    }
		    
		    // Validate the Secure Hash (remember MD5 hashes are not case sensitive)
			// This is just one way of displaying the result of checking the hash.
			// In production, you would work out your own way of presenting the result.
			// The hash check is all about detecting if the data has changed in transit.
		    if (strtoupper($vpc_Txn_Secure_Hash) == strtoupper(md5($md5HashData))) {
		        // Secure Hash validation succeeded, add a data field to be displayed later.
		        $hashValidated = "CORRECT";
		    } else {
		        // Secure Hash validation failed, add a data field to be displayed later.
		        $hashValidated = "INVALID HASH";
		        //$errorExists = true;
		    }
		} else {
		    // Secure Hash was not validated, add a data field to be displayed later.
		    $hashValidated = "Not Calculated - No 'SECURE_SECRET' present.";
		}
		
		// Define Variables
		// ----------------
		// Extract the available receipt fields from the VPC Response
		// If not present then let the value be equal to 'No Value Returned'
		
		// Standard Receipt Data
		/*$title           = $this->null2unknown($_GET["Title"]);
		$amount          = $this->null2unknown($_GET["vpc_Amount"]);
		$locale          = $this->null2unknown($_GET["vpc_Locale"]);
		$batchNo         = $this->null2unknown($_GET["vpc_BatchNo"]);
		$command         = $this->null2unknown($_GET["vpc_Command"]);
		$message         = $this->null2unknown($_GET["vpc_Message"]);
		$version         = $this->null2unknown($_GET["vpc_Version"]);
		$cardType        = $this->null2unknown($_GET["vpc_Card"]);
		$orderInfo       = $this->null2unknown($_GET["vpc_OrderInfo"]);
		$receiptNo       = $this->null2unknown($_GET["vpc_ReceiptNo"]);
		$merchantID      = $this->null2unknown($_GET["vpc_Merchant"]);
		$authorizeID     = $this->null2unknown($_GET["vpc_AuthorizeId"]);
		$merchTxnRef     = $this->null2unknown($_GET["vpc_MerchTxnRef"]);
		$transactionNo   = $this->null2unknown($_GET["vpc_TransactionNo"]);
		$acqResponseCode = $this->null2unknown($_GET["vpc_AcqResponseCode"]);
		$txnResponseCode = $this->null2unknown($_GET["vpc_TxnResponseCode"]);
		
		
		// 3-D Secure Data
		$verType         = array_key_exists("vpc_VerType", $_GET)          ? $_GET["vpc_VerType"]          : "No Value Returned";
		$verStatus       = array_key_exists("vpc_VerStatus", $_GET)        ? $_GET["vpc_VerStatus"]        : "No Value Returned";
		$token           = array_key_exists("vpc_VerToken", $_GET)         ? $_GET["vpc_VerToken"]         : "No Value Returned";
		$verSecurLevel   = array_key_exists("vpc_VerSecurityLevel", $_GET) ? $_GET["vpc_VerSecurityLevel"] : "No Value Returned";
		$enrolled        = array_key_exists("vpc_3DSenrolled", $_GET)      ? $_GET["vpc_3DSenrolled"]      : "No Value Returned";
		$xid             = array_key_exists("vpc_3DSXID", $_GET)           ? $_GET["vpc_3DSXID"]           : "No Value Returned";
		$acqECI          = array_key_exists("vpc_3DSECI", $_GET)           ? $_GET["vpc_3DSECI"]           : "No Value Returned";
		$authStatus      = array_key_exists("vpc_3DSstatus", $_GET)        ? $_GET["vpc_3DSstatus"]        : "No Value Returned";*/
		
		// *******************
		// END OF MAIN PROGRAM
		// *******************
		
		// FINISH TRANSACTION - Process the VPC Response Data
		// =====================================================
		// For the purposes of demonstration, we simply display the Result fields on a
		// web page.
		
		// Show 'Error' in title if an error condition
		//$errorTxt = "";
		
		// Show this page as an error page if vpc_TxnResponseCode equals '7'
		//if ($txnResponseCode == "7" || $txnResponseCode == "No Value Returned" || $errorExists) {
		    //$errorTxt = "Error ";
		//}
		// The URL link for the receipt to do another transaction.
		// Note: This is ONLY used for this example and is not required for 
		// production code. You would hard code your own URL into your application
		// to allow customers to try another transaction.
		//TK//$againLink = URLDecode($_GET["AgainLink"]);
		
		$_GET["vpc_TxnResponseDescription"] = $this->getResponseDescription($_GET["vpc_TxnResponseCode"]);
		$_GET["vpc_VerStatusDescription"] = $this->getResponseDescription(isset($_GET["vpc_VerStatus"]));
		$_GET["hashValidated"] = $hashValidated;
		return $_GET;
	}
	
	// End Processing

	// This method uses the QSI Response code retrieved from the Digital
	// Receipt and returns an appropriate description for the QSI Response Code
	//
	// @param $responseCode String containing the QSI Response Code
	//
	// @return String containing the appropriate description
	//
	function getResponseDescription($responseCode) {
	
	    switch ($responseCode) {
	        case "0" : $result = "Transaction Successful"; break;
	        case "?" : $result = "Transaction status is unknown"; break;
	        case "1" : $result = "Unknown Error"; break;
	        case "2" : $result = "Bank Declined Transaction"; break;
	        case "3" : $result = "No Reply from Bank"; break;
	        case "4" : $result = "Expired Card"; break;
	        case "5" : $result = "Insufficient funds"; break;
	        case "6" : $result = "Error Communicating with Bank"; break;
	        case "7" : $result = "Payment Server System Error"; break;
	        case "8" : $result = "Transaction Type Not Supported"; break;
	        case "9" : $result = "Bank declined transaction (Do not contact Bank)"; break;
	        case "A" : $result = "Transaction Aborted"; break;
	        case "C" : $result = "Transaction Cancelled"; break;
	        case "D" : $result = "Deferred transaction has been received and is awaiting processing"; break;
	        case "F" : $result = "3D Secure Authentication failed"; break;
	        case "I" : $result = "Card Security Code verification failed"; break;
	        case "L" : $result = "Shopping Transaction Locked (Please try the transaction again later)"; break;
	        case "N" : $result = "Cardholder is not enrolled in Authentication scheme"; break;
	        case "P" : $result = "Transaction has been received by the Payment Adaptor and is being processed"; break;
	        case "R" : $result = "Transaction was not processed - Reached limit of retry attempts allowed"; break;
	        case "S" : $result = "Duplicate SessionID (OrderInfo)"; break;
	        case "T" : $result = "Address Verification Failed"; break;
	        case "U" : $result = "Card Security Code Failed"; break;
	        case "V" : $result = "Address Verification and Card Security Code Failed"; break;
	        default  : $result = "Unable to be determined"; 
	    }
	    return $result;
	}
	
	
	
	//  -----------------------------------------------------------------------------
	
	// This method uses the verRes status code retrieved from the Digital
	// Receipt and returns an appropriate description for the QSI Response Code
	
	// @param statusResponse String containing the 3DS Authentication Status Code
	// @return String containing the appropriate description
	
	function getStatusDescription($statusResponse) {
	    if ($statusResponse == "" || $statusResponse == "No Value Returned") {
	        $result = "3DS not supported or there was no 3DS data provided";
	    } else {
	        switch ($statusResponse) {
	            Case "Y"  : $result = "The cardholder was successfully authenticated."; break;
	            Case "E"  : $result = "The cardholder is not enrolled."; break;
	            Case "N"  : $result = "The cardholder was not verified."; break;
	            Case "U"  : $result = "The cardholder's Issuer was unable to authenticate due to some system error at the Issuer."; break;
	            Case "F"  : $result = "There was an error in the format of the request from the merchant."; break;
	            Case "A"  : $result = "Authentication of your Merchant ID and Password to the ACS Directory Failed."; break;
	            Case "D"  : $result = "Error communicating with the Directory Server."; break;
	            Case "C"  : $result = "The card type is not supported for authentication."; break;
	            Case "S"  : $result = "The signature on the response received from the Issuer could not be validated."; break;
	            Case "P"  : $result = "Error parsing input from Issuer."; break;
	            Case "I"  : $result = "Internal Payment Server system error."; break;
	            default   : $result = "Unable to be determined"; break;
	        }
	    }
	    return $result;
	}
	
	//  -----------------------------------------------------------------------------
	   
	// If input is null, returns string "No Value Returned", else returns input
	function null2unknown($data) {
	    if ($data == "") {
	        return "No Value Returned";
	    } else {
	        return $data;
	    }
	} 
	    
	//  ----------------------------------------------------------------------------

}
?>
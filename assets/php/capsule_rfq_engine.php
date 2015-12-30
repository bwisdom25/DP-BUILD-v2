<?php
//Define Variables & Set to Empty Values
	$firstName = "";
	$lastName = "";
	$email = "";
	$phoneNumber = "";
	$companyName = "";
	$title = "";
	$address = "";
	$city = "";
	$state = "";
	$intrestModel = "";
	$selectedModel = "";
	$rateValue = "";
	$rateLabel = "";
	$accuracy = ""; 
	$prePrintBool = ""; 
	$primaryToolSize = "";
	$dosingdiskThick = "";
	$additToolBool = "";
	$capPolishBool = "";
	$vacPumpBool = "";
	$dustColBool = "";
	$vacLoadBool = ""; 
	$productDesc = ""; 

	$message = ""; 

	
    $thank_you_url = "../../products/RFQ/successful_form.html";



//Error Varriables 
	$nameErr = $emailErr = $phoneNumberErr = $modelSelectErr = ""; 

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["fnameInput"]) || empty($_POST["lnameInput"])) {
			$nameErr = "Name is Required"; 
		} else {
			$firstName = test_input($_POST["fnameInput"]);
			$lastName = test_input($_POST["lnameInput"]);

			if (!preg_match("/^[a-zA-Z ]*$/",$firstName) || !preg_match("/^[a-zA-Z ]*$/",$lastName) ){
				$nameErr = "Only Letters and White Space are Allowed.";
			}
		}

		if (empty($_POST["emailInput"])) {
			$emailErr = " Email Address is Required";
		} else {
			$email = test_input($_POST["emailInput"]);
		}

		if (empty($_POST["phonenumberInput"])) {
			$phoneNumberErr = "Phone Number is Required";
		} else {
			$phoneNumber = test_input($_POST["phonenumberInput"]); 
		} 

		if (empty($_POST["modelIntrest"])) {
			$modelSelectErr = "Atleast One Model Must Be Selected";
		} else {
			//Iterate through array to find all models selected
			/*
			$interestModel = $_POST['modelIntrest'];

			$N = count($interestModel);

			for ($i=0; $i < $N; $i++) { 
				$seletedModel = $selectedModel . test_input($interestModel[$i]) . ", "; 
			}
			*/

			$selectedModel = implode(", ", $_POST["modelIntrest"]);
		}
		    $companyName = test_input($_POST["compnameInput"]);
			$title = test_input($_POST["titleInput"]);
			$address = test_input($_POST["addressInput"]); 
			$city = test_input($_POST["cityInput"]);
			$state = test_input($_POST["stateInput"]);
			
			$rateValue = test_input($_POST["rateNUMInput"]); 
			$rateLabel = test_input($_POST["runRateInput"]);
			$accuracy = test_input($_POST["accuracyInput"]); 
			$prePrintBool = test_input($_POST["prePrintCapsInput"]); 
			$primaryToolSize = test_input($_POST["primToolSizeInput"]);
			$dosingdiskThick = test_input($_POST["ddthickInput"]);
			$additToolBool = test_input($_POST["toolInput"]); 
			$capPolishBool = test_input($_POST["capPolishInput"]);
			$vacPumpBool = test_input($_POST["vacPumpInput"]);
			$dustColBool = test_input($_POST["dustColInput"]);
			$vacLoadBool = test_input($_POST["vacLoadInput"]); 
			$productDesc = test_input($_POST["productDescInput"]);  
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data; 
	}
	/*
	fwrite($leadFile, "First Name: " . $firstName . "\n");
	fwrite($leadFile, "Last Name: " . $lastName  ."\n");
	fwrite($leadFile, "Email: " . $email . "\n");
	fwrite($leadFile, "Phone Number: " . $phoneNumber . "\n");
	fwrite($leadFile, "Company: " . $companyName . "\n");
	fwrite($leadFile, "Title: " . $title . "\n");
	fwrite($leadFile, "Address: " . $address . "\n");
	fwrite($leadFile, "City: " . $city . "\n");
	fwrite($leadFile, "State: " . $state . "\n");
    fwrite($leadFile, "\n");
	fwrite($leadFile, "Models Intrested In: " . $selectedModel . "\n");	
	fwrite($leadFile, "Desired Output Rate: ". $rateValue . " Capsules Per " . $rateLabel . "\n");	
	fwrite($leadFile, "Filling Accuracy: " . $accuracy . " %\n" );	
	fwrite($leadFile, "Using Pre-Printed Capsules: " . $prePrintBool . "\n");	
	fwrite($leadFile, "Primary Tooling Size: " . $primaryToolSize . "\n");	
	fwrite($leadFile, "Primary Dosing Disk Thickness: " . $dosingdiskThick . " mm \n");
	fwrite($leadFile, "Additional Tooling Required: " . $additToolBool . "\n");
	fwrite($leadFile, "Capsule Polisher Needed: " . $capPolishBool . "\n");
	fwrite($leadFile, "Vacuum Pump Needed: " . $vacPumpBool . "\n"); 
	fwrite($leadFile, "Dust Collector Needed: " . $dustColBool . "\n");
	fwrite($leadFile, "Vacuum Loader Needed: " . $vacLoadBool . "\n");
	fwrite($leadFile, "Product Detail: " . $productDesc . "\n");
	*/
	$message .= "First Name: " . $firstName . "\n"; 
	$message .= "Last Name: " . $lastName  ."\n"; 
	$message .= "Email: " . $email . "\n";
	$message .= "Phone Number: " . $phoneNumber . "\n"; 
	$message .= "Company: " . $companyName . "\n"; 
	$message .= "Title: " . $title . "\n";
	$message .= "Address: " . $address . "\n"; 
	$message .= "City: " . $city . "\n"; 
	$message .= "State: " . $state . "\n"."\n";
	$message .= "Models Intrested In: " . $selectedModel . "\n";
	$message .= "Desired Output Rate: ". $rateValue . " Capsules Per " . $rateLabel . "\n";
	$message .= "Filling Accuracy: " . $accuracy . " %\n"; 
	$message .= "Using Pre-Printed Capsules: " . $prePrintBool . "\n";
	$message .= "Primary Tooling Size: " . $primaryToolSize . "\n";
	$message .=  "Primary Dosing Disk Thickness: " . $dosingdiskThick . " mm \n";
	$message .= "Additional Tooling Required: " . $additToolBool . "\n";
	$message .= "Capsule Polisher Needed: " . $capPolishBool . "\n"; 
	$message .= "Vacuum Pump Needed: " . $vacPumpBool . "\n";
	$message .= "Dust Collector Needed: " . $dustColBool . "\n";
	$message .= "Vacuum Loader Needed: " . $vacLoadBool . "\n";
	$message .= "Product Detail: " . $productDesc . "\n";

     //Open txt file for testing purposes 
	$leadFile = fopen("../newLead2.txt", "w") or die("Unable to open file!");
    fwrite($leadFile, $message);
    fclose($leadFile);
    //EMAIL DATA 
    $from_add = "bwisdom@wizbang-workspace.com"; 

	$to_add = "wizbangtheory@gmail.com,bwisdom@rightstuffequipment.com"; //<-- put your yahoo/gmail email address here

	$subject = "[RFQ][Capsule Filler] - A New Lead has Filled Out an RFQ";
	
	$headers = "From: $from_add \r\n";
	$headers .= "Reply-To: $from_add \r\n";
	$headers .= "Return-Path: $from_add\r\n";
	$headers .= "X-Mailer: PHP \r\n";
 
  if(mail($to_add,$subject,$message,$headers)) 
	{
		header('Location: ' . $thank_you_url);
	} 

    
?>
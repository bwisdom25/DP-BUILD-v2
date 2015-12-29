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
	
    $thank_you_url = "successful_form.html"
//Open txt file for testing purposes 
	$leadFile = fopen("../newLead.txt", "w") or die("Unable to open file!");


//Error Varriables 
	$nameErr = $emailErr = $phoneNumberErr = ""; 

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		fwrite($leadFile, "REQUEST_METHOD == POST")
		if (empty($_POST["fnameInput"]) || empty($_POST["lnameInput"])) {
			$nameErr = "Name is Required"; 
		} else {
			$firstName = test_input($_POST["fnameInput"]);
			$lastName = test_input($_POST["lnameInput"]);

			if(!preg_match("/^[a-ZA-Z ]*$/", $firstName) || !preg_match("/^[a-ZA-Z ]*$/", $lastName) ){
				$nameErr = "Only Letters and White Space Allowed.";
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

			$companyName = test_input($_POST["compnameInput"]);
			$title = test_input($_POST["titleInput"]);
			$address = test_input($_POST["addressInput"]); 
			$city = test_input($_POST["cityInput"]);
			$State = test_input($_POST["stateInput"]);
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data; 
	}
	fwrite($leadFile, "First Name: " + $firstName + "\n");
	fwrite($leadFile, "Last Name: " + $lastName + "\n");
	fwrite($leadFile, "Email: " + $email + "\n");
	fwrite($leadFile, "Phone Number: " + $phoneNumber + "\n");
	fwrite($leadFile, "Company: " + $companyName + "\n");
	fwrite($leadFile, "Title: " + $title + "\n");
	fwrite($leadFile, "Address: " + $address + "\n");
	fwrite($leadFile, "City: " + $city + "\n");
	fwrite($leadFile, "State: " + $state + "\n");
    
    fclose($leadFile)

    header('Location: '.$thank_you_url);
?>
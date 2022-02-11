<?php   
    require("./mailing/mailfunction.php");

    $name = $_POST["name"];
    $phone = $_POST['phone'];
    $email = $_POST["email"];
    $applyfor = $_POST["status"];
    $experience = $_POST["experience"];
    $otherdetails = $_POST["details"];

    $filename = $_FILES["fileToUpload"]["name"];
	$filetype = $_FILES["fileToUpload"]["type"];
	$filesize = $_FILES["fileToUpload"]["size"];
	$tempfile = $_FILES["fileToUpload"]["tmp_name"];
	$filenameWithDirectory = "".$name.".pdf";  //give path of tmp-uploads folder(available in this project folder) with slash(/ or \ as per your path) at end of path

    $body = "<ul><li>Name: ".$name."</li><li>Phone: ".$phone."</li><li>Email: ".$email."</li><li>Apply For: ".$applyfor."</li><li>Experience: ".$experience." Yrs.</li><li>Resume(Attached Below):</li></ul>";
	if(move_uploaded_file($tempfile, $filenameWithDirectory))
	{
		$status = mailfunction("", "Company", $body, $filenameWithDirectory); //reciever
        if($status)
            echo '<center><h1>Thanks! We will contact you soon.</h1></center>';
        else
            echo '<center><h1>Error sending message! Please try again.</h1></center>';
	}
	else 
	{
		echo "<center><h1>Error uploading file! Please try again.</h1></center>";
	}

?>
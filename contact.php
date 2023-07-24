<?php
// Host Name   = Localhost
$conn = mysqli_connect('localhost', 'root', '', 'proj1');

if (!$conn) {
    die("Connect Failed ");
}
$error = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST["email"];
    $comments = $_POST["comments"];

	

    if(empty($firstName)){
        $error['firstNameErr'] ='firstName  required';
    }
    if(empty($lastName)){
        $error['lastNameErr'] ='lastName  required';
    }
    
   
    
    if(empty($comments)){
        $error['cardNumErr'] ='cardNum  required';
    }
    
    if(empty($email)){
        $error['cvcErr'] ='cvc  required';
    }
    
    
 if (count($error) == 0) {
$firstName = mysqli_real_escape_string($conn, $firstName);
$lastName = mysqli_real_escape_string($conn, $lastName);
$comments = mysqli_real_escape_string($conn, $comments);
$email = mysqli_real_escape_string($conn, $email);
 
     //email	fname	lname	comments
       $insert = mysqli_query($conn, "INSERT INTO contact (fname,lname,email,comments) 
 VALUES ('$firstName','$lastName','$email','$comments')");

        if ($insert) {
            echo "thanks";
            echo '<script>alert("Contact Saved Successfully !");window.location.assign("ContactUs.html");</script>';
            
        } else {
            echo "dont";
        }
   
}
}

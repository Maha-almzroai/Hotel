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
    $id = $_POST['id'];
    $Password = $_POST['pass'];
    $cardnum = $_POST['cardNum'];
    $cvc = $_POST['cvc'];
    $month = $_POST["Month"];
    $year = $_POST["Year"];
    $roomNumbers = $_POST["roomNumbers"];



    if(empty($firstName)){
        $error['firstNameErr'] ='firstName  required';
    }
    if(empty($lastName)){
        $error['lastNameErr'] ='lastName  required';
    }
    if(empty($id)){
        $error['idErr'] = 'id required';
    }
    if(empty($Password)){
        $error['passwordErr'] ='password required';
    }
    
    if(empty($cardnum)){
        $error['cardNumErr'] ='cardNum  required';
    }
    
    if(empty($cvc)){
        $error['cvcErr'] ='cvc  required';
    }
    
    
 if (count($error) == 0) {
$firstName = mysqli_real_escape_string($conn, $firstName);
$lastName = mysqli_real_escape_string($conn, $lastName);
$id = mysqli_real_escape_string($conn, $id);
$password = mysqli_real_escape_string($conn, $password);
$cardNum = mysqli_real_escape_string($conn, $cardnum);
$cvc = mysqli_real_escape_string($conn, $cvc);
 
       $insert = mysqli_query($conn, "INSERT INTO bookin (firstName,lastName,password,cardNum,cvc,roomNumbers,month,year) 
 VALUES ('$firstName','$lastName','$Password','$cardnum','$cvc','$roomNumbers','$month','$year')");

        if ($insert) {
            echo "thanks";
            echo '<script>alert("Booking Saved Successfully !");window.location.assign("Booking.html");</script>';
            
        } else {
            echo "dont";
        }
   
}
}

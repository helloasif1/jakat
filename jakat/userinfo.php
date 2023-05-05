<?php 

$con = mysqli_connect('localhost', 'root');

//if($con){
  //  echo "connection succesful";
//}else{
    //echo "no connection";}


mysqli_select_db($con, 'zakat');

$user = $_POST['user'];
$email = $_POST['email'];
$amount = $_POST['amount'];
$message = $_POST['message'];

$query = "INSERT INTO donation(user, email, amount, message) Values ('$user','$email','$amount','$message')"


mysqli_query($con, $query )); 

//mysqli_query($con,$query, $result_mode = MYSQLI_STORE_RESULT );

//header('location:index.html');
?>
<?php
session_start();
$con =mysqli_connect("localhost","root","","admin");

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    $q = mysqli_query($con, "INSERT INTO `users` SET `name` ='$name',`email`='$email',`password`='$password' ,`usertype`='$usertype' ");

    if($q == true ){
        header("location:login.php");
    } else {
        echo "<h1>sorry!</h1>";
    }
  
}


$con =mysqli_connect("localhost","root","","admin");

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype =$_POST['usertype'];

    $q = mysqli_query($con,"SELECT * FROM `users` WHERE `usertype`='$usertype' and `password`= '$password' ");
    
    $data = mysqli_fetch_array($q);
    if(count($data)>0){
       $_SESSION['uid'] = $data['id'];
    echo "<script>location.href='home.php'</script>";
    } else{
        echo "<script>location.href='login.php'</script>";
 }
    }
    
  
   

?>

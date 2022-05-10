<?php
session_start();
$con =mysqli_connect("localhost","root","","admin");

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = $_POST['rank'];

    $q = mysqli_query($con, "INSERT INTO `users` SET `name` ='$name',`email`='$email',`password`='$password' ,`rank`='$rank' ");

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
    $rank =$_POST['rank'];

//     $q = mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email' and `password`= '$password' ");
    
//     $data = mysqli_fetch_array($q);
//     if(count($data)>0){
//        $_SESSION['uid'] = $data['id'];
//     echo "<script>location.href='home.php'</script>";
//     } else{
//         echo "<script>location.href='login.php'</script>";
//  }
//     }
    
//  user&admin 

$q = mysqli_query($con,"SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' "); 
    $user = mysqli_fetch_array($q);

    if($user!=null) {
        $_SESSION['login'] = true; 
        $_SESSION['uid']= $user['id']; 
        if($user['rank']=='admin') {
            header("location:admin.php"); 
        } else {
             header("location:index.php"); 
        }
    } else {
        echo "<script>alert('Wrong username or password')</script>";
    }

   
}
?>



******If it is an admin, redirect to admin.php(admin panel) and if it is a user, redirect to index.php*****

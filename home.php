<?php
session_start();

if(isset($_SESSION['uid']) <1 || !isset ($_SESSION['uid'])){

    header("location:login.php");
}
?>
<h1>hello you are login</h1>
<a href="logout.php" class="btn"><button>logout</button></a>
<a href="postadd.php" class="btn"><button>ADD YOUR POST</button></a>

<style>
    body{color:blue;
    text-align:center;
    background:gray;
    }
</style>

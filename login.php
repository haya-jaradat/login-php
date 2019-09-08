<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>First PHP</title>

</head>
<body>

<?php

 include "header.php";


?>

<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "Haya3010!!";
$message=" ";

try {
  $conn = new PDO("mysql:host=$servername;dbname=Users", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  if (isset($_POST["submit"]))
  {
    if (empty($_POST['username']) || empty($_POST['password']))
    {
       $message = "<label>All fields are required</label>";
    }

    else 
    {
      $query= "SELECT * FROM  user WHERE user_name =:username AND password = :password";
      $stmt=$conn -> prepare($query);
      $stmt -> execute(
          array (
            'username' => $_POST["username"],
            'password' => $_POST["password"]
          )
      );

      $count = $stmt -> rowCount();
      if ($count >0)
      { 
        $row= $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION["role"] = $row["role"];
        $_SESSION["user_name"] = $_POST["username"];
        if($_SESSION["role"]=="user"){
        header ("location: index.php");
      }

        else
        {
          header ("location: dashbord.php");
        }
      }
      else 
      {
        $message = "<label>Wrong Data</label>";
      }

    }
  }

  }
catch(PDOException $error)
  {
  $message = $error->getMessage();
  }

?>

    
<div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
</div>




<form class=" w-75 m-auto" method="post" >
  <div class="form-group ">
    <label for="exampleInputEmail1">User Name</label>
    <input type="userName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="username" name="username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit" value="login">Submit</button>
</form>



<?php


include "footer.php";
?>
    
</body>
</html>

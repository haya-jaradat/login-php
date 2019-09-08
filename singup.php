<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
<?php
  include 'header.php';
  ?>
<?php
session_start();

if (isset($_POST["submit"])){


$servername = "localhost";
$username = "root";
$password = "Haya3010!!";
$datab = 'Users';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$datab", $username, $password);
    // set the PDO error mode to exception
    $sql = "insert into user(user_name, email, password)
     values ('$_POST[username]', '$_POST[email]', '$_POST[password]')";
     $_SESSION["username"]=$_POST["username"];
    

     header("Location: index.php");
     
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}
$conn = null;


// $users=array(
//   array
//     (
//       "name"=>"ahmed",
//       "username"=>"ahmad",
//       "password"=>"h123",
//       "role"=>"Admin",
//     ),
//     array
//     (
//       "name"=>"mohammed",
//       "username"=>"mohammed",
//       "password"=>"h1234",
//       "role"=>"user",
//     ),
//   array
//     (
//       "name"=>"mahmmod",
//       "username"=>"mahmmod",
//       "password"=>"h1235",
//       "role"=>"user",
//     ),
//     array
//     (
//       "name"=>"farah",
//       "username"=>"farah",
//       "password"=>"h1236",
//       "role"=>"user",
//     ),
//   array
//     (
//       "name"=>"saja",
//       "username"=>"saja",
//       "password"=>"h1237",
//       "role"=>"user",
//     )
// );

?>

<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" class="form-control" id="name" placeholder="User Name" name="username">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name ="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
<?php 



$username=$_GET['username'];
$email= $_GET['email'];
$password=$_GET['password'];

// foreach($users as $key => $user){
// if($username == $user['username'] && $password == $user['password'])

// { if ( $user['role'] == 'Admin'){

//     header("Location: index.php");
// }
// elseif($user['role'] == 'user'){
//     header("Location: about.php");
// }
// }
?>
<?php
  include 'footer.php';
  ?>

</body>
</html>

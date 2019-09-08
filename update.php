<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "Haya3010!!";
$datab = 'Users';

// Create connection
try{
 $conn = new PDO("mysql:host=$servername;dbname=$datab", $username, $password);
} 
catch (PDOExceotion $e){

}
$id =$_GET['id'];
$sql='SELECT * FROM user WHERE id=:user_id';
$stmt=$conn->prepare($sql);
$stmt->execute([':user_id'=> $id]);
$user =$stmt->fetch(PDO::FETCH_OBJ);
if(isset($_POST['user_name'])&& isset($_POST['email'])&& isset($_POST['password'])){
$name=$_POST['user_name'];
$email=$_POST['email'];

$sql='INSERT INTO user(user_name,email,password)VALUES(:name,:email,:password)';
$stmt=$conn->prepare($sql);
if($stmt->execute([':user_name'=> $name, ':email'=>$email])){

    $message='data inserted successfully';

}

}

?>
<form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input value=" <?= $user->user_name; ?> "type="text" class="form-control" id="name" placeholder="User Name" name="username">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input value=" <?= $user->email; ?> "type="email" class="form-control" name ="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input value=" <?= $user->password; ?> "type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button  type="submit" class="btn btn-primary" name="submit">Submit</button>
</form> 
</body>
</html>

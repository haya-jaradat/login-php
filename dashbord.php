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
   
$sql = 'SELECT * FROM user';
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->FetchALL(PDO::FETCH_OBJ);

?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All Users</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
        <?php foreach($user as $users): ?>
          <tr>
            <td><?= $user->user_id; ?></td>
            <td><?= $user->user_name; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->password ?></td>
            <td>
              <a href="update.php?id=<?= $user->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $user->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

</body>
</html>

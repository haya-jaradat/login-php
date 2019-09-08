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
     <div style="text-align:center " >

     <?php
session_start();
if(isset($_SESSION["user_name"]))
{
    echo '<h1> Welcome '.$_SESSION["user_name"].'</h1>';
    echo '<br /><br /><a href="logout.php" type="submit" class="btn btn-primary" >Logout</a>';
}
?>
   </div >
<?php
  include 'footer.php';
  ?>
</body>
</html>
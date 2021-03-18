<?php
require_once "connection.php";

$lokasi = $_POST['lokasi'];
$luas = $_POST['luas'];
$jenis = $_POST['jenis'];
$status = $_POST['status'];

$query = mysqli_query($conn, "INSERT INTO `perikanan` (`id`, `lokasi`,`luas`,`jenis`, `status`) VALUES (NULL, '$lokasi', $luas, '$jenis', '$status');");

if ($query) {
    echo " <div class='alert alert-success'>
      <strong>Success!</strong> Redirecting you back in 1 seconds.
    </div>
  <meta http-equiv='refresh' content='1; url= perikanan.php'/>  ";
} else {
    echo "<div class='alert alert-warning'>
      <strong>Failed!</strong> Redirecting you back in 1 seconds.
    </div>
   <meta http-equiv='refresh' content='1; url= perikanan.php'/> ";
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "potensi";


$conn = mysqli_connect($hostname, $username, $password, $database);


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

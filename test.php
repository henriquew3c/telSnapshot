<?php

session_start();
include 'connection.php';
$_SESSION["fotografia"] = date('YmdHis');

//$name = date('YmdHis');
//$newname = "images/" . $name . ".jpg";

$newname = "images/tmp/" . $_SESSION["fotografia"] . ".jpg";
$file = file_put_contents($newname, file_get_contents('php://input'));

if (!$file) {
    print "ERROR: Failed to write data to $filename, check permissions\n";
    exit();
} else {
    print "Arquivo gravado com sucesso!\n";
    
//    $sql = "Insert into entry(images) values('$newname')";
//    $result = mysqli_query($con, $sql)
//            or die("Error in query");
//    $value = mysqli_insert_id($con);
//    $_SESSION["myvalue"] = $value;
}

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $newname;
print "$url\n";
?>

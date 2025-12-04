<?php

$conn= new mysqli('localhost','root','','excelfile');
if($conn)
{
    echo 'connected';
}
else{
    die(mysqli_error($conn));
}
?>
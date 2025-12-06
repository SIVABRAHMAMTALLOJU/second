<?php

$conn= new mysqli('localhost','root','','excelfile');
if($conn)
{
    echo 'connected';
    echo' sucess';
}
else{
    die(mysqli_error($conn));
}
?>
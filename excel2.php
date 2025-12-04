<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <label>Select CSV File:</label>
    <input type="file" name="file" accept=".csv" required>
    <button type="submit">Import</button>
</form>

</body>
</html>


<?php
include 'conn.php';

if (isset($_FILES['file']['tmp_name'])) {

    $file = $_FILES['file']['tmp_name'];
    $handle = fopen($file, "r");
    fgetcsv($handle);
    while (($row = fgetcsv($handle)) !== false) {

        $roll_no  = $row[0];
        $name = $row[1];
        $branch   = $row[2];
        $phone=$row[3];
        $sql="INSERT INTO exceltable (RollNo,Name,Branch,Phonenumber) VALUES ('$roll_no','$name', '$branch', '$phone')";
        $res=mysqli_query($conn,$sql);
        if($res){
            echo"inserted";
        }
        else{
            die(mysqli_error($conn));
        }

        
    }

    fclose($handle);

    echo "CSV imported successfully!";
}
?>

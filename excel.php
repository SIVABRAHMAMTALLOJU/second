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

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If file is uploaded
if (isset($_FILES['file']['tmp_name'])) {

    $file = $_FILES['file']['tmp_name'];

    // Read CSV file
    $handle = fopen($file, "r");

    // Skip header row
    fgetcsv($handle);

    // Loop through rows
    while (($row = fgetcsv($handle)) !== false) {

        // CSV columns (example: name,email,age)
        $roll_no  = $row[0];
        $name = $row[1];
        $branch   = $row[2];
        $phone=$row[3];

        // Insert into DB
        $conn->query("INSERT INTO exceltable (RollNo,Name,Branch,Phonenumber) VALUES ('$roll_no','$name', '$branch', '$phone')");
    }

    fclose($handle);

    echo "CSV imported successfully!";
}
?>

<?php
    if(isset($_POST['submit'])) {
        include_once 'dbconnect.inc.php';
        
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
        
        //creating prepared statement
        $sql = "INSERT INTO leads (name, email, phone, address, zipcode) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "ssisi", $name, $email, $phone, $address, $zipcode);
        //run parameters inside database
        mysqli_stmt_execute($stmt);
        header("Location: ../?success");
        // echo "test";
    }
    else{
        // echo "fail";
    }
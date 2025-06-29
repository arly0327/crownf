<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost','root','','registration');
    if ( $conn->connect_error ) {
        die ('Connection Failed : '. $conn->connect_error );
    }
    else
    {
        $stmt = $conn->prepare("insert into accounts(name, email, pass) values (?,?,?)");
        $stmt->bind_param("sss", $name, $email, $pass);
        $stmt->execute();
        echo "Your account has been created successfully!";
        $stmt   ->close();
        $conn   ->close();
    }
?>
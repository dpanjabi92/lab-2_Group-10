<?php

    session_start();

    $dbServername = "localhost";
    $dbUser = "root";
    $dbPassword ="";
    $dbName = "lab2group10";
    // To check whether connection was success or not
    $con = mysqli_connect($dbServername, $dbUser, $dbPassword, $dbName);
    if(mysqli_connect_errno())
    {
        echo "Failed to Connect!";
        exit();
    }

    if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        $con->query("DELETE FROM Fixture WHERE ID=$id") or die($mysqli->error());
        // echo "<script>alert('Team Deleted! Go Back and Refresh the Page!')</script>";
        $_SESSION['message']="Selected Team has been Deleted!";
        $_SESSION['msg_type'] = "danger";
        header("location: ../index.php");
    }

    ?>
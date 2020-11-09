<?php
    $dbServername = "localhost";
    $dbUser = "root";
    $dbPassword ="";
    $dbName = "lab2group10";
    // To check whether connection was success or not
    
    $con = mysqli_connect($dbServername, $dbUser, $dbPassword, $dbName);
    $result = $con->query("SELECT * FROM Fixture") or die($con->error());
    $result-> fetch_assoc();
    if(mysqli_connect_errno())
    {
        echo "Failed to Connect!";
        exit();
    }


    $id='';
    $teamId='';
    $teamName='';
    $teamResult='';
    $update= false;
   
if(isset($_GET['edit'])){
    echo "<script> alert('Scroll Down to forms to edit your team!)</script>";
    $id=$_GET['edit'];
    $update= true;
    
    $result=$con->query("SELECT * FROM Fixture WHERE ID=$id") or die($con->error());
    if(count($result)==1){
        $row = $result->fetch_array();
        $id= $row['ID'];
        $teamId = $row['Team_id'];
        $teamName = $row['Team_name'];
        $teamResult = $row['Result'];
       
 
    }
}

if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $teamId = $_POST['teamid'];
    $teamName = $_POST['teamname'];

    $con->query("UPDATE Fixture SET Team_id='$teamId', Team_name='$teamName' WHERE ID=$id")
    or die($con->error);
    $_SESSION['message']= "Team Info has been Updated!";
    $_SESSION['msg_type']="warning";

    header('location: ../index.php');
}

?>

<html>
<head>
    <title>Lab-2 Group 10 [Database Integration]</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    
</head>
</html>
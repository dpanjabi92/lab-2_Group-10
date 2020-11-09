<!DOCTYPE html>
<html>
<head>
    <title>Lab-2 Group 10 [Database Integration]</title>
    <link rel="stylesheet" href="../style.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    
</head>
<body>

<div id="content">
  <?php
 
  
$msg="";
$dbServername = "localhost";
$dbUser = "root";
$dbPassword ="";
$dbName = "lab2group10";
// To check whether connection was success or not
$con = mysqli_connect($dbServername, $dbUser, $dbPassword, $dbName);
$id=isset($_GET['id']) ? $_GET['id'] : '';
$image_query = "SELECT * FROM teams where ID='$id'";
$select = mysqli_query($con,$image_query);
$row = mysqli_fetch_assoc($select);


    if(isset($_POST['update'])){
        $old_image=$_POST['old_image'];
        $id= $_POST['id'];
        $teamid = $_POST['teamid'];
        $tname = $_POST['name'];
         $size=$_FILES['image']['size'];
            $temp=$_FILES['image']['tmp_name'];
            $type=$_FILES['image']['type'];
            $image_name=$_FILES['image']['name'];
        
        if(isset($_FILES['image']['name']) && ($_FILES['image']['name']!="")){
            
           
     // $image_name = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            

           // unlink('data:image/'.$old_image);
            $target = "../images/".$image_name;

            //file type
            $imagefiletype = strtolower(pathinfo($target,PATHINFO_EXTENSION));
            //$image_name = 'data:image/base64,'.$imagefiletype.';base64,'.$image_base64;

            //valid file extension
            $extension_arr = array("jpg","jpeg","png","gif");

            if(in_array($imagefiletype,$extension_arr)){

            // if(file_exists("../images/".$image_name))
            // {
            //     $store= $image_name;
            //     $_SESSION['message'] = "Image already exists. '.$store.'";
            //     $_SESSION['msg_type'] = "warning";
            // }
            // else
            // {
            $con = mysqli_connect($dbServername, $dbUser, $dbPassword, $dbName);
            $sql = "UPDATE `teams` SET Team_id=NULL, Team_name='$tname', Team_img='$image_name' WHERE ID='$id'";
            $sql_query_run = mysqli_query($con,$sql);
            //to check whether image added or not!
            if($sql_query_run)
            {
            move_uploaded_file($temp, $target);
            $_SESSION['message'] = "Team Image Updated!";
            $_SESSION['msg_type']="success";
            
            //echo "<script> alert('Image Uploaded to Secure Folder! ') </script>";

            }
            else{
                $_SESSION['message'] = "Team Image did Not Update!";
                $_SESSION['msg_type']="warning";

                 //echo "<script> alert('Image Uploading Failed! Try Again! ') </script>";
            }
        }
        
    }

}

  ?>
  
  <?php

if (isset($_SESSION['message'])): ?>

<div class="alert alert-<?=$_SESSION['msg_type']?>">

<?php
  echo $_SESSION['message'];
  unset($_SESSION['message']);

?>
</div>
<?php endif ?>



  <br>
  <form class="content_form" method="POST" action="" enctype="multipart/form-data">
    
  <div>
  	<label> ID: &nbsp </label>
    <input type="text" name="id" value="<?=$row['ID'];?>" />
    </div>
    <br>

    <div>
  	<label> Team ID: &nbsp </label>
    <input type="text" name="teamid" value="<?=$row['Team_id'];?>" />
    </div>
    <br>





    <div>
  	<label>Team Name: &nbsp </label>
    <input type="text" name="name" value="<?=$row['Team_name'];?>" />
    </div>
    <br>



    <div>
    <input type="hidden" name="old_image" >
    </div>

  	<div>
      <label>Team Image Upload:&nbsp </label>
      <!--  img src-->
     
      <img src="data:image;charset=utf8;base64,<?php echo base64_encode($row['Team_img']); ?>" 
      alt="Image" style="width: 80px;
                       height: 80px;"/>
       
      
  	  <input type="file" name="image" id="image" required/>
      <input type="hidden" name="old_image" value="<?php echo base64_encode($row['Team_img']); ?>" >
      
  	</div>
    <br>
    <br>


  	<div>
  	<center><button type="submit" name="update">Update</button><center>
      <br>
      <br>
      <center><a href="../index.php?page=teams" class="back_button">Back</a><center>
  	</div>
  </form>
</div>
</body>
</html>
<?php
    $dbServername = "localhost";
    $dbUser = "root";
    $dbPassword ="";
    $dbName = "lab2group10";
    // To check whether connection was success or not
    $con = mysqli_connect($dbServername, $dbUser, $dbPassword, $dbName);
    $result = $con->query("SELECT * FROM Fixture") or die($con->error());
    
    if(mysqli_connect_errno())
    {
        echo "Failed to Connect!";
        exit();
    }
    // else{
    //     echo "<html><h1>Database Connection Successful!</h1></html>";
    // }
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lab-2 Group 10 [Database Integration]</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    
</head>
<body>
<div class="title">
  DataBase Integration
    </div><br>
    <div class="sub_title">
      Group-10[Dhruti Panjabi & Vishakh Kompella]
    </div>
    <br>






      <!---------------Creating Session to display alert for delete--------------->
    <?php require_once 'form_action/delete_entry.php';?>
    
      <?php

      

      if (isset($_SESSION['message'])): ?>

      <div class="alert alert-<?=$_SESSION['msg_type']?>">
      
      <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);

      ?>
      </div>
      <?php endif ?>





    <!---------------------TABLES---------------------------------------->


<div class="container">
<!------------------- Milestone B part B   ------->
<?php if(isset($_REQUEST["page"])&& $_REQUEST["page"]=="teams"){ ?> 
    <div class="table_team">   
    
            <table class="team_info">
              <thead>
              <h3> <i>CRICKET TEAM INFORMATION</i> </h3>
             <center> <h6><i>The Result from the Database Table "Teams":</i></h6> <center>
                <tr>
              
                  
                  <th>Team ID</th>
                  <th>Team Image</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th> Overwrite Team Image</th>
                </tr>
              </thead>
              
            
              <tbody>
                     <?php
                    $sql="SELECT * FROM  teams;";
                    $result = mysqli_query($con, $sql);
                    
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck>0){
                     while ($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                        <!-- <td><?=$row['Team_id']?></td>
                        <td><img src="<?=$row['Image_path']?>" alt="Image" style="width: 60px;
                         height: 60px;"></td>
                         <td><?=$row['Team_name']?></td>
                         <td><?=$row['Description']?></td> -->

                        <?php echo "<td>".$row['Team_id']." &nbsp </td>"  .'<td><img src="'.base64_encode($row['Team_img']).'" alt="Image" style="width: 60px;
                         height: 60px;" ></td> <td>' 
                        .$row['Team_name']."&nbsp</td>" ."<td>".$row['Description']."</td><br>"; ?>
                        </td>

                        <td><a href="form_action/update_image.php?id=<?php echo $row['ID']; ?>">Edit</a></td>
                        
                        </tr>
                        <?php
                     }
                    }
                     ?>  
                     </tbody>
                     </table>
                         
        <center> <a href="index.php" class="back_button">Back</a></center>
        <br>
        <br>
        <!---------------Form for teams---->
        
       

 



</div>

<?php } else { ?>





<!--------------- Milestone B part A---------------------------->
<div> 
        <table class="table-A">
        <h3> <i>CRICKET TOURNAMENT LEAGUE</i> </h3>
        <center>  <h6> <i>The Result from the Database Table "Fixture"(TABLE A):</i> </h6></center>
              <thead>
                <tr>
                  <th >#</th>
                  <th >Team Name</th>
                  <th colspan=1>  Action </th>
                </tr>
              </thead>   
               
              <tbody>
                
              <?php
              $sql="SELECT * FROM  Fixture;";
              $result = mysqli_query($con, $sql);

              $resultCheck = mysqli_num_rows($result);

              if ($resultCheck>0){
                  while ($row = mysqli_fetch_assoc($result)){ 
                    //while ($row = $result->fetch_assoc()){?>
                    <tr class="active-row">
                      <td><?php echo $row['Team_id']; ?> </td> 
                      <td><a href="index.php?page=teams"><?php echo $row['Team_name']; ?></a></td>
                      <td><a href="index.php?edit=<?php echo $row['ID']; ?>"
                        class="edit_button">Edit</a>

                        <a href="form_action/delete_entry.php?delete=<?php echo $row['ID']; ?>"
                        class="delete_button">Delete</a>
                      
                      </td>
                  </tr>
                  <?php
                  }
              }
              ?>
              </tbody>
</table>

</div>
<br>


<!-------------------------------------Milestone C & D ----------------------------------------------------->


<?php include 'form_action/update_entry.php';?>


<center><div>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<h5> &nbsp&nbspAdd More Teams & their Result! </h5>
<form action="form_action/addentry.php" method="POST"> 
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="number" name="id" 
value="<?php echo $id;?>" placeholder="ID" required>
<br>
<input type="number" name="teamid" 
value= "<?php echo $teamId;?>" placeholder="Team Number" required>
<br>
<input type="text" name="teamname" 
value="<?php echo $teamName;?>"    placeholder="Team Name" required>
<br>
<input type="text" name="result" 
value="<?php echo $teamResult;?>" placeholder="Match Result(Won/Lost)" required>
<br>
<br>

<?php 
  if($update ==true):
?>
<button type="submit" name="update">Update Entry</button>
<?php else: ?>
<button type="submit" name="submit">Add Entry</button> &nbsp 
<?php endif; ?>
<button type="reset" name="reset">Clear Form</button>

</form>
</div></center>
<br>
<br>

<!------------------------------------Part C & D Finish--------------------->

<?php } ?>



</div>
<br>
<!-------------------------------M B part A Finish---------------------------------------------------->



</body>
</html>
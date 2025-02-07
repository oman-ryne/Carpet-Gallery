<?php
include_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display image</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="display-image">
    <h2>here upload photo display</h2>
    <?php
$sql="SELECT * FROM test";
$result=mysqli_query($db_conn,$sql);
if(mysqli_num_rows($result)>0)
{
    $row=mysqli_fetch_assoc($result);
    while($row=mysqli_fetch_assoc($result)){

 ?>
            <div><h1><?php  echo $row['title'];  ?></h1></div>
        
        <img src="images/<?php echo $row['image'];?>">
    
        <?php
           }
         }
        ?>
    </div>
</form>
</body>
</html>

<?php

include("admin/config.php");

if(isset($_POST['submit'])){
    $name = $_POST['fed_name'];
    $address = $_POST['fed_address'];
    $massage = $_POST['fed_massage'];


    $sql = "INSERT INTO feedback(name,address,massage) VALUES ('$name','$address','$massage')";
   if($sql){
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location : feedback.php?sucess= Your feedback was successfully submitted.");
    }
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
  .container{
    display:flex;
  }
</style>
  </head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
<div class="container">
<?php
// Get the search query from the GET request
$query = $_GET['query'];

// Connect to the database
include ("admin/config.php");

// Search the database for the query
$sql = "SELECT * FROM product WHERE title LIKE '%$query%' OR dis LIKE '%$query%'";
$result = mysqli_query($conn, $sql);


// Display the search results
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    // Display the card with the search result
    ?>
    <div class="col-md-4" id="card">
      <div class="card" style="width: 22rem;">
        <img src="admin/images/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">
            <?php echo $row['title'];?>
          </h5>
          <p class="card-text">
            <?php echo substr($row['dis'], 0, 150);?><a href="#single.php">See more</a>
          </p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Price:
            <?php echo $row['price'];?>
          </li>
          <li class="list-group-item">Color:
            <?php echo $row['color'];?>
          </li>
        </ul>
        <div class="card-body">
          <input type="hidden" id="name<?php echo $row['id'];?>" value="<?php echo $row['title'];?>">
          <input type="hidden" id="price<?php echo $row['id'];?>" value="<?php echo $row['price'];?>">
          <?php 
            // Check if the user is logged in
            if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
              echo '<button class="btn btn-success add" data-id="' . $row['id'] . '" id="add-to-cart-btn">Add to Cart</button>';
            } else {
              echo '<button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Add to Cart
            </button>';
            }
          ?>

        </div>
      </div>
    </div>
    <?php 
  }
} else {
  echo 'No results found.';
}

?>
</div>
</body>
</html>

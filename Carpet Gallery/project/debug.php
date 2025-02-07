<?php
session_start();
include_once('admin/config.php');
include_once('test.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    
<div class="row justify-content-evenly mt-5" id="card-container">
  <?php
  $sql = "SELECT * FROM product";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
      <div class="col-md-3 me-1 mb-2" id="card">
        <div class="card" style="width: 18rem;" id="card">
          <img src="admin/images/<?php echo $row['image']; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title']; ?></h5>
            <p class="card-text"><?php echo $row['dis']; ?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Price: <?php echo $row['price']; ?></li>
            <li class="list-group-item">Color: <?php echo $row['color']; ?></li>
          </ul>
          <div class="card-body">
            <input type="hidden" id="name<?php echo $row['id']; ?>" value='<?php echo $row['title']; ?>'>
            <input type="hidden" id="price<?php echo $row['id']; ?>" value='<?php echo $row['price']; ?>'>
            <button class="btn btn-primary addpro" data-id="<?php echo $row['id']; ?>" name="submit">ADD CART</button>
            <a href="addcard.php" class="card-link btn btn-primary">Payment</a>
          </div>
        </div>
  <?php
    }
  }
  ?>
</div>

    <div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
</body>
</html>
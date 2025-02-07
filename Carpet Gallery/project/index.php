<?php
session_start();
include('admin/config.php');
include_once('test.php');
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo $title."-CarpetGallery";?>
  </title>
  <link rel="stylesheet" href="css/style.css?v=100">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <style>
    /* Inline styles for quick view, move to your custom.css */
    #carouselExampleIndicators {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .carousel-indicators button {
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.7);
      border: none;
      transition: background-color 0.3s ease;
    }

    .carousel-indicators .active {
      background-color:rgba(0, 123, 255, 0.93);
    }

    .carousel-item img {
      filter: brightness(0.9);
      transition: filter 0.3s ease;
    }

    .carousel-item img:hover {
      filter: brightness(1);
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 50%;
      width: 45px;
      height: 45px;
    }

    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
      background-color: rgba(0, 0, 0, 0.7);
    }

    .carousel-control-prev,
    .carousel-control-next {
      width: 5%;
    }

    .carousel-control-prev span,
    .carousel-control-next span {
      font-size: 18px;
      color: #fff;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-primary" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" alt="logo" id="logo" style="width: 100px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About us</a>
          </li>
        </ul>
        <form class="search-form me-1" role="search" action="function.php" method="GET">
          <div class="input-group">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="query">
            <button class="btn btn-outline-success" type="submit" name="submit_search"><i class="fa-solid fa-search"></i></button>
          </div>
        </form>
        <?php
         include ("signin-signup.php");
         ?>
      </div>
    </div>
  </nav>

  <!-- Features -->
  <div class="Features">
    <h1>Our Features</h1>
  </div>
  <!-- slideImage -->
   
  <!-- Carousel Section -->
<div class="row container-fluid justify-content-evenly mt-5">
  <div class="col-10">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      
      <!-- Carousel Indicators -->
      <div class="carousel-indicators">
        <?php
        include ("admin/config.php");
        $feature_sql = "SELECT * FROM features LIMIT 3";
        $feature_result = mysqli_query($conn, $feature_sql);
        if (mysqli_num_rows($feature_result) > 0) {
          $slideIndex = 0;
          while ($row = mysqli_fetch_assoc($feature_result)) {
            $activeClass = $slideIndex == 0 ? 'active' : '';
            echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $slideIndex . '" class="' . $activeClass . '" aria-current="true" aria-label="Slide ' . ($slideIndex + 1) . '"></button>';
            $slideIndex++;
          }
        }
        ?>
      </div>

      <!-- Carousel Inner with Images -->
      <div class="carousel-inner" id="slideImage">
        <?php
        if (mysqli_num_rows($feature_result) > 0) {
          mysqli_data_seek($feature_result, 0); // Reset pointer to start
          $slideIndex = 0;
          while ($row = mysqli_fetch_assoc($feature_result)) {
            $activeClass = $slideIndex == 0 ? 'active' : '';
            
            // Image path with cache busting
            $imagePath = 'admin/feature_image/' . $row['feature_image'] . '?v=' . time();
            
            echo '<div class="carousel-item ' . $activeClass . '">
                    <img src="' . $imagePath . '" class="d-block w-100" alt="...">
                  </div>';
            $slideIndex++;
          }
        }
        ?>
      </div>

      <!-- Carousel Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>


  <!--main contain-->
  <div class="product">
    <p>Our Product</p>
  </div> 
  <div class="container">
    <div class="row justify-content-evenly mt-5" id="card-container">
      <?php
      $sql = "SELECT * FROM product";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
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
      }
      ?>
    </div>

    <div class="container-fluid">
      <div class="row justify-content-evenly mt-7">
        <div class="col-md-10 mt-7" id="massage">
          <h1>
            <p class="text-align-centre mt-5">"Welcome to CarpetGallery, where convenience meets quality! Dive into a
              world of endless possibilities, where shopping is not just a task, but an experience. Discover handpicked
              treasures tailored to your taste, from fashion to gadgets, all at your fingertips.

              With CarpetGallery, say goodbye to long queues and hello to doorstep delivery. Experience seamless
              browsing through our user-friendly interface, where every click brings you closer to your desires.<br><br>

              Why settle for ordinary when you can have extraordinary? Enjoy exclusive deals and discounts, curated just
              for you. Whether you're a trendsetter or a tech enthusiast, we've got something for everyone.<br><br>

              Join our community of satisfied shoppers today and elevate your shopping experience with CarpetGallery.
              Your journey to effortless shopping starts here."
            </p>
          </h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-danger justify-content-evenly" id="footer">
    <div class="row bg-danger justify-content-evenly">
      <div class="col-sm-3 mt-5">
        <img src="images/logo.jpg" alt="logo" style="width: 300px;">
        <p class="text-danger">The CarpetGallery Of A New Generation.</p>
      </div>
      <div class="col-sm-3 mt-5">
        <h2>Connect with us</h2>
        <ul class="social-icons">
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>
        <form class="mt-4">
          <div class="mb-3">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Enter email">
          </div>
          <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
      </div>
      <div class="col-sm-3 mt-5">
        <h2>Contact us</h2>
        <p>Email: Omanryne60@gmail.com</p>
        <p>Phone: +977 9824778648 <br></p>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.41883841602!2d85.30483066506201!3d27.70435163279316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18f8b5a16d43%3A0xb4f02f94e307d660!2sBasantapur%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1663908008513!5m2!1sen!2snp"
          width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="Last_footer">
    <div class="row justify-content-evenly">
      <div class="col-12" id="last-footer-contain">
        <p class="text-center pt-2">© 2025 CarpetGallery.com</p>
      </div>
    </div>
  </div>
  <script src="JS/payment.js?v=31"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
</body>
</html>

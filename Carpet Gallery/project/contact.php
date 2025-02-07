<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CarpetGallery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css?v=2">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/contact.css">
</head>
<style>
  .social-links {
    position: fixed;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    background-color: #fff;
    padding: 10px;
    border-radius: 10px 0 0 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    z-index: 9999;
  }

  .social-links a {
    color: #000;
    font-size: 20px;
    text-decoration: none;
    margin-bottom: 10px;
    display: block;
  }
</style>

<body>
  <!-- Social media links -->
  <div class="social-links">
    <a href="#"><i class="bi bi-facebook"></i></a>
    <a href="#"><i class="bi bi-twitter"></i></a>
    <a href="#"><i class="bi bi-instagram"></i></a>
  </div>
  <!-- End of the social meida link -->

  <!-- Main contain -->
  <nav class="navbar navbar-expand-lg bg-primiary" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="images/logo.jpg" alt="logo" id="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About us</a>
          </li>
        </ul>
        <form class="search-form me-1" role="search">
          <div class="input-group">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-search"></i></button>
          </div>
        </form>
        <?php
         include ("signin-signup.php");

         ?>
      </div>
    </div>
    
  </nav>
  <?php if(isset($_GET['sucess'])) {?>
  <p style="color:green;"><?php echo $_GET['sucess'];?></p>
  <?php  }?>
<!-- Main content -->
<div class="container">
  <div class="row">
    <!-- Form content -->
    <div class="col-md-6">
    <h4>Leave A Message</h4>
    <p>Our staff will call back later and answer your questions.</p>
      <form class="ml-5" method="POST" action="function.php">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name ="fed_name">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Address</label>
          <input type="text" class="form-control" id="exampleInputPassword1" name="fed_address">
        </div>
        <div class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="fed_massage"></textarea>
          <label for="floatingTextarea2">Feedback</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3 w-100" name="submit">Submit</button>
      </form>
    </div>
    <!-- Contact details -->
    <div class="col-md-6 ">
      <div class="contact-details">
        <h3>Contact Details</h3>
        <p><i class="bi bi-telephone-fill"></i> Phone: +1 234 567 890</p>
        <p><i class="bi bi-envelope-fill"></i> Email: info@example.com</p>
        <p><i class="bi bi-geo-alt-fill"></i> Address: 123 Main St, City, Country</p>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<div class="container-fluid bg-denger justify-content-evenly" id="footer">
    <div class="row bg-denger justify-content-evenly">
      <div class="col-sm-3 mt-5">
        <img src="images/logo.jpg" alt="" style="width: 300px;">
        <p class="text-denger">The CarpetGallery Of A New Generation.</p>
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
        <p>Phone: +977 9824778648 <br> </p>
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
  <script src="JS/payment.js?v=20"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
</body>

</html>
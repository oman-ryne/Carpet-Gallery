<?php
include_once('test.php');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $title."-CarpetGallery";?></title>
  <link rel="stylesheet" href="css/about.css?v=<?php=$version;?>">
  <link rel="stylesheet" href="css/style.css?v=<?php=$version;?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-primiary" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html"><img src="images/logo.jpg" alt="logo" id="logo"></a>
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
            <a class="nav-link" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="about.php">About us</a>
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


 <!--main contain-->
<div class="container-fluid">
  <div class="row bg-success mt-5 mb-3" style="height: 50px;">
    <div class="col-10 text-white">
      <h5 class="text-center pt-2" style="font-size: 28px;font-style:italic">OUR MART</h5>
    </div>
  </div>
  <div class="row justify-content-center">
    <!-- Image column -->
    <div class="col-md-6 office">
      <img src="images/officea.jpg" alt="office" class="img-fluid ">
    </div>
    <!-- Text column -->
    <div class="col-md-6">
      <div class="row justify-content-center">
        <div class="col-10">
          <p class="mt-3 mb-3">
            CarpetGallery is pioneering the e-commerce landscape in Nepal, offering a comprehensive range of online shopping services with a primary focus on home delivery. With a decade-long commitment to providing accessible and affordable products, our platform aims to democratize access to quality goods while mitigating inflated price margins in the market.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!--QUery-->
<div class="container-fluid ">
  <div class="row bg-success text-white mt-5 mb-3"style="height: 50px;">
    <h5 class="text-center mt-2 mb-3" style="font-size: 28px;font-style:italic">QUERY OF CUSTUMER</h5>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        HOW TO BUY THE PRODUCT ?
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">      
      To purchase a product, begin by browsing our selection to find the item you desire. Once you've found the product, simply add it to your cart. After adding all your desired items, proceed to checkout and complete the payment process. Upon successful payment, your order will be processed, and our team will ensure delivery of the product within 48 hours to your specified address. If you encounter 
     any issues or have questions during the process, our customer support team is available to assist you.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        HOW TO PAYMENT ?
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      To make a payment, CarpetGallery offers two convenient options: e-sewa and cash on delivery. With e-sewa, you can securely transfer funds electronically, providing a seamless and efficient payment experience. Alternatively, you can opt for cash on delivery, allowing you to pay for your purchase upon receipt of the product. These flexible payment methods ensure a hassle-free shopping experience tailored to your preferences. If you have any questions
      or need assistance with the payment process, our dedicated support team is readily available to assist you.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        DELIVARY TIME AND CHARGE ?
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
     For deliveries within Kathmandu, CarpetGallery ensures prompt service, with products reaching your doorstep within 48 hours of purchase. Our pricing structure is designed to be transparent and competitive, with each piece priced at 500 NPR and an additional charge of 300 NPR per piece for delivery. This approach allows us to maintain affordability while covering the costs associated with timely and efficient delivery services. If you have any further inquiries regarding delivery
    times or charges, please feel free to reach out to our customer service team for assistance
      </div>
    </div>
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
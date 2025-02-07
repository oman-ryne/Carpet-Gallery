<?php
include_once('admin/db_conn.php');
?>
<?php



?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/860036b92c.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CarpetGallery</title>
  </head>
  <body>
      
        <!-- Button trigger modal -->
        <?php
// Check if the user is logged in
if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
  $username = $_SESSION['username'];
  $sql = "SELECT * FROM user WHERE email = '$username'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
    // Display profile and logout dropdown for logged-in users
    echo '<div class="dropdown me-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                ' . $row['username'] . '
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="user-profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="user-logout.php">Logout</a></li>
            </ul>
          </div>';
} else {
    // Display login modal button for guests
    echo '<button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-user"></i>
          </button>';
}
?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LOGIN </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="action_signup_signin.php" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                  </div> 
                  <div class="signuplink">
                  <h3>You have't a account <a href="#" id="showSignupForm">Click Here</a></h3>
                  </div> 
                  <style>
                 .signuplink h3  a{
                      color : black;
                      text-decoration : none;
                    }
                  </style>
                 <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Log in</button>
              </div>
              </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn  btn-primary p-2" data-bs-toggle="modal" data-bs-target="#exampleModal1" >
          <i class="fa-solid fa-cart-shopping"></i><span class="addcart" id = "cart-count">0</span></button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" >
            <div class="modal-content" >
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Cart </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body" id="Displaydata">
              <?php 
                   if(!empty($_SESSION['cart'])){
                       $outputTable = '';
                       $total = 0;
                       $outputTable .= "<table class='table table-bordered'><thead><tr><td>Name</td><td>Price</td><td>Quantity</td><td>Action</td> </tr></thead>";
                       foreach($_SESSION['cart'] as $key => $value){
                           $outputTable .= "<tr><td>".$value['p_name']."</td><td>".($value['p_price'] *1) ."</td><td>"."1"."</td><td><button id=".$value['p_id']." class='btn btn-danger delete'>Delete</button></td></tr>";  
                           $total = $total + ($value['p_price'] * 1);
                       }
                       $outputTable .= "</table>";
                       $outputTable .= "<div class='text-center'><b>Total: ".$total."</b></div>";
                       echo $outputTable;
                      }
                 ?>
                 <button class="btn btn-primary text-center"><a href="payment.php">pay</a></button>
              </div>
            </div>
          </div>
        </div>
        <style>
          a{
            color:black;
            text-decoration: none;
          }
        </style>
        <!-- Modal -->
        <!-- signup page -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" 
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SIGN UP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- <form action="test.php" method="post" enctype="multipart/form-data"> -->
                <form action="action_signup_signin.php" method="post" id="signupForm" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="fullname">
                  </div>
                  <div class="mb-3">
                    <label for="username" class="form-label">UserName</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="number">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                  </div>
                  <div class="mb-3">
                    <label for="add" class="form-label">Local Address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword">
                  </div>
                  <div class="mb-3">
                    <label for="profileimage" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="profileImage">
                  </div>
                  <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">terms and condition</label>
                    <p>Terms of service are the legal agreements between a service provider and a person who wants to
                      use that service. The person must agree to abide by the terms of service in order to use the
                      offered service. Terms of service can also be merely a disclaimer, especially regarding the use of
                      websites. </p>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit1" >SIGN UP</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle with Popper.js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
// JavaScript to toggle between login and signup forms
document.getElementById("showSignupForm").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("exampleModal").classList.remove("show");
    document.getElementById("exampleModal").style.display = "none";
    document.getElementById("exampleModal2").classList.add("show");
    document.getElementById("exampleModal2").style.display = "block";
});
</script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="./css/style.css?v=5">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg">
  <img src="img/background.jpeg" alt="" srcset="">
</div>

<form action ="login.php" method="post">
<?php if(isset($_GET['error'])) {?>
  <p style="color:red;"><?php echo $_GET['error'];?></p>
  <?php  }?>
  <div class="form-field">
    <!-- <img src="img/user.png" alt=""> -->
    <input img src="img/user.png" type="text" placeholder="Email / Username" required name="username"/>
  </div> 
  
  <div class="form-field">
    <input type="password" placeholder="Password" name="password"  required/>
  </div>
  
  <div class="form-field">
    <button class="btn" type="submit" name="login">Log in</button>
  </div>
</form>
<!-- partial -->
  
</body>
</html>

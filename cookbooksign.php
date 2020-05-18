<?php 

// Start the session
$errorlogin="";

if(isset($_POST['submit_login'])) {
session_start();

include 'connection_check.php'; 
$username = $password = $id =  "";
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$sql = "SELECT * FROM users WHERE username='$username' and password = '$password'";
$result = mysqli_query($conn, $sql);
if ($result) {
} else {
  echo "1st step error".mysqli_error($conn);
}
$row = mysqli_fetch_array($result);
if ($row!=NULL && $row['username']==$username && $row['password']==$password) {
  $id = $row['id'];
  $_SESSION["id"] = $id;
  $_SESSION["name"] = $row['name'];
  $_SESSION["email"] = $row['email'];
  //$uniq = uniqid();
  //header("Location: ideas/myindex.php?id=$uniq?id=$uniq?my=$uniq?id=$id?$uniq?$uniq");
  header("Location: myindex.php");
} else {
  $errorlogin = 234;
}
}
?>


<?php
include 'connection_check.php';
$errorsignup = "";

$email = $your = $username = $password = '';
$errors = array('your'=>'','email' =>'', 'username' => '', 'password' => '');

if(isset($_POST['submit'])) {

  if(empty($_POST['your'])) {
    $errors['your'] = 'Your Name is needed <br />';
  }  else {
    $your = $_POST['your'];     
  }

  if(empty($_POST['email'])) {
   $errors['email'] = 'An email is needed <br />';
   } else {
   $email = $_POST['email'];
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $errors['email'] = 'email must be valid';
    }
   }

  if(empty($_POST['username'])) {
    $errors['username'] = 'Your Username is needed <br />';
  }  else {
    $username = $_POST['username'];     
  }


  if(empty($_POST['password'])) {
    $errors['password'] = 'Your Password is needed <br />';
  }  else {
    $password = $_POST['password'];     
  }



  $sqlsame = "SELECT * FROM users WHERE username='$username'";
  $resultsqlsame = mysqli_query($conn, $sqlsame);
  $samearray = mysqli_fetch_array($resultsqlsame);

  if ($samearray != NULL) {
     $errorsignup = 500;
    
  }  elseif (array_filter($errors)){
    //header("Location: testreeshov.php");
    $errorsignup = 100;



  } else {
    $your = mysqli_real_escape_string($conn, $_POST['your']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "INSERT INTO users(username, email, password, name) VALUES('$username', '$email', '$password', '$your')";

    if(mysqli_query($conn, $sql)) {
    header("Location: cookbooksign.php");
    } else {
    echo "error".mysqli_error($conn);
    // header("Location: newsigninup.html");
   }


  }

  
  }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <!-- <title>CodePen - Sliding Login Form</title> -->
  <title>Log In/Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="signlog/style.css">



<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="back">
  <div class="backRight"></div>
  <div class="backLeft"></div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="left">
      <div class="content">
        <h2>Sign Up</h2>
        <h3><i class="material-icons"><a href="index.php">home</a></i></h3>
        <!-- <form method="post" >
          <div class="form-group">
            <input type="text" placeholder="Full Name" />
            <input type="text" placeholder="Email Address" />
            <input type="text" placeholder="Username" />
            <input type="password" placeholder="Password" />
          </div>
          <div class="form-group"></div>
          <div class="form-group"></div>
          <div class="form-group"></div>
        </form>
        <button id="goLeft" class="off" onsubmit="return false;">Login</button>
        <button>Sign up</button> -->
          <!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->


        <form action="cookbooksign.php" method="POST">
          <div class="form-group">

            <div class="row">

          <p class="col s6 m6 l6">
          <!-- <label>Name: </label> -->
          <input type="text" name="your" id="your" placeholder="Full Name">
          <div class="red-text"><?php echo $errors['your']; ?></div>
          </p>
          
          <p class="col s6 m6 l6">
          <!-- <label>email: </label> -->
          <input type="text" name="email" id="email" placeholder="Email Address">
          <div class="red-text"><?php echo $errors['email']; ?></div>
          </p>

          <p class="col s6 m6 l6">
          <!-- <label>Username: </label> -->
          <input type="text" name="username" id="username" placeholder="Username">
          <div class="red-text"><?php echo $errors['username']; ?></div>
          </p>

          <p class="col s6 m6 l6">
          <!-- <label>Password: </label> -->
          <input type="password" name="password" id="password" placeholder="Password">
          <div class="red-text"><?php echo $errors['password']; ?></div>
          </p>
        </div>
        </div>
        <div class="form-group"></div>
          <div class="form-group"></div>
          <div class="form-group"></div>

          <p>
          <input type="submit" name="submit" value="Submit"> 
          </p>


        </form>
           
           
        
          <form  onsubmit="return false;" method="POST">
          <button id="goLeft" class="off" >Log in</button>
          </form>














          <!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->

      </div>
    </div>
    <div class="right">
      <div class="content">
        <h2>Log In
            <h3><i class="material-icons"><a href="index.php">home</a></i></h3>


        </h2>
        <form  action="cookbooksign.php" method="POST">
          <div class="form-group">
            <label for="Username" class="form-label">Username</label>
            <input type="text" name="username" id="username">
            <label for="Password" class="form-label">Password</label>           
            <input type="password" name="password" id="password">
          </div>
          <div>
            <?php if ($errorlogin == 234) { ?>
              <p> <?php echo "Sorry! Cannot log in. Please try again!"?>;</p>
            <?php } ?>
            <p> </p>

            
            <?php if ($errorsignup == 100) { ?>
              <p> <?php echo "Sorry! Cannot SIGN UP. Please try again!"?>;</p>
            <?php } ?>

            

            <?php if ($errorsignup == 500) { ?>
              <p> <?php echo"You cannot use this username. Please try with a different username."?>;</p>
            <?php } ?>
            
          </div>
           
          <button id="login" type="submit" name="submit_login">Login</button>
        </form>
        <form  onsubmit="return false;" method="POST">
          <button id="goRight" class="off" >Sign Up</button>
         
       </form>
      </div>
    </div>
  </div>
</div>

<!--Inspiration from: http://ertekinn.com/loginsignup/-->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="signlog/script.js"></script>

</body>
</html>

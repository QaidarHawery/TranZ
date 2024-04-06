<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style1.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <?php

  require_once('database.php');

  if (isset($_POST['signup'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "insert into user(ID,NAME,EMAIL,PASSWORD) values('','$name','$email','$password')";
    mysqli_query($conn, $sql);
  }

  if (isset($_POST['login'])) {
    $namelogin = $_POST['namelogin'];
    $passwordlogin = $_POST['passwordlogin'];
    $sqlquery = "select * from user where NAME='$namelogin' and PASSWORD='$passwordlogin' ";
    $anjam = mysqli_query($conn, $sqlquery);
    if (mysqli_num_rows($anjam) > 0) {
      while ($user = mysqli_fetch_assoc($anjam)) {
        $id = $user['ID'];
        $namee = $user['NAME'];
        $emaill = $user['Email'];
      }

      session_start();
      $_SESSION['id'] = $id;
      $_SESSION['email'] = $emaill;
      $_SESSION['name'] = $namee;
      echo "<script>location.href='project/page.php'</script>  ";
    }
  }



  ?>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" class="sign-in-form" method="POST">
          <h2 class="title">Sign in</h2>


          <div class="input-field">
            <i class="fas fa-user"></i>


            <input type="text" placeholder="Username" name="namelogin" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="passwordlogin" required />
          </div>
          <input type="submit" value="Login" class="btn solid" name="login" />
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="#" class="sign-up-form" method="POST">
          <h2 class="title">Sign up</h2>

          <div class="input-field">
            <i class="fas fa-user"></i>


            <input type="text" placeholder="Username" name="username" required />
          </div>

          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required />
          </div>
          <input type="submit" class="btn" value="Sign up" name="signup" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>
</body>

</html>
<?php
session_start();
if(  isset($_SESSION['username']) )
{
  header("location:home.php");
  die();
}
//connect to database
$db=mysqli_connect("localhost","root","","calvox");
if($db)
{
  if(isset($_POST['login_btn']))
  {
      $username=mysqli_real_escape_string($db,$_POST['username']);
      $password=mysqli_real_escape_string($db,$_POST['password']);
      $password=md5($password); //Remember we hashed password before storing last time
      $sql="SELECT * FROM users WHERE  username='$username' AND password='$password'";
      $result=mysqli_query($db,$sql);
      
      if($result)
      {
     
        if( mysqli_num_rows($result)>=1)
        {
            $_SESSION['message']="You are now Loggged In";
            $_SESSION['username']=$username;
            header("location:home.php");
        }
       else
       {
              $_SESSION['message']="Username and Password combiation incorrect";
       }
      }
  }
}
?>
  <!-- interfaz -->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>LOGIN</title>
  <!--Estilos-->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css'>
  <link rel="stylesheet" href="../estilo/style.css">

</head>
<body>


<!--particulas-->
<div>
  <div class="starsec"></div>
  <div class="starthird"></div>
  <div class="starfourth"></div>
  <div class="starfifth"></div>
</div>
<!--div contenedor--->

<div class="container text-center text-dark mt-5">
  <div class="row">
    <div class="col-lg-4 d-block mx-auto mt-5">
      <div class="row">
        <div class="col-xl-12 col-md-12 col-md-12">
          <div class="card">
          <form method="post" action="login.php">
          <table>
            <div class="card-body wow-bg" id="formBg">
              <h3 class="colorboard">Login</h3>
              <p class="text-muted">Sign In to your account</p>
              <?php
              if(isset($_SESSION['message']))
              {
                echo "<div id='error_msg'>".$_SESSION['message']."</div>";
                unset($_SESSION['message']);
              }
              ?>
              <!--password y username--->
              <div class="input-group mb-3"> <input type="text" class="form-control textbox-dg" placeholder="Username" name="username"> </div>
              <div class="input-group mb-4"> <input type="password" class="form-control textbox-dg" placeholder="Password" name="password"> </div>

              <div class="row">
                <div class="col-12"> <button type="submit" class="btn btn-primary btn-block logn-btn" name="login_btn">Login</button> </div>
                <div class="col-12"> <a href="../sesion/register.php" class="btn btn-link box-shadow-0 px-0">New in Calvox?</a> </div>
              </div>

              <div class="mt-6 btn-list">
                <button type="button" class="socila-btn btn btn-icon btn-facebook fb-color"><i class="fab fa-facebook-f faa-ring animated"></i></button> <button type="button" class="socila-btn btn btn-icon btn-google incolor"><i class="fab fa-linkedin-in faa-flash animated"></i></button> <button type="button" class="socila-btn btn btn-icon btn-twitter tweetcolor"><i class="fab fa-twitter faa-shake animated"></i></button> <button type="button" class="socila-btn btn btn-icon btn-dribbble driblecolor"><i class="fab fa-dribbble faa-pulse animated"></i></button>
              </div>
              </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="../estilo/script.js"></script>

</body>
</html>

<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","calvox");
if(isset($_POST['register_btn']))
{
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password2=mysqli_real_escape_string($db,$_POST['password2']);  
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result=mysqli_query($db,$query);
      if($result)
      {
     
        if( mysqli_num_rows($result) > 0)
        {
                
                echo '<script language="javascript">';
                echo 'alert("Username already exists")';
                echo '</script>';
        }
        
          else
          {
            
            if($password==$password2)
            {           //Create User
                $password=md5($password); //hash password before storing for security purposes
                $sql="INSERT INTO users(username, email, password ) VALUES('$username','$email','$password')"; 
                mysqli_query($db,$sql);  
                $_SESSION['message']="You are now logged in"; 
                $_SESSION['username']=$username;
                header("location:home.php");  //redirect home page
            }
            else
            {
                $_SESSION['message']="The two password do not match";   
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
<div class="centreadoR">
  <div class="container text-center text-dark  ">
    <div class="row">
      <div class="col-lg-4 d-block mx-auto mt-5">
        <div class="row">
          <div class="col-xl-12 col-md-12 col-md-12">
            <div class="card">
            <form method="post" action="register.php">
            <table>
              <div class="card-body wow-bg" id="formBg">
                <h3 class="colorboard">Register</h3>
                <p class="text-muted">Register your account</p>
                <?php
                if(isset($_SESSION['message']))
                {
                  echo "<div id='error_msg'>".$_SESSION['message']."</div>";
                  unset($_SESSION['message']);
                }
                ?>
                <!--username--->
                <div class="input-group mb-3"> <input type="text" class="form-control textbox-dg" placeholder="Username" name="username"> </div>
                <!--email--->
                <div class="input-group mb-3"> <input type="email" class="form-control textbox-dg" placeholder="Email" name="email"> </div>
                <!--password--->
                <div class="input-group mb-4"> <input type="password" class="form-control textbox-dg" placeholder="Password" name="password"> </div>
              <!--password again--->
                <div class="input-group mb-4"> <input type="password" class="form-control textbox-dg" placeholder="Password Again" name="password2"> </div>
                <div class="row">
                <div class="col-12"> <button type="submit" class="btn btn-primary btn-block logn-btn" name="register_btn">Register</button> </div>
                <div class="col-12"> <a href="login.php" class="btn btn-link box-shadow-0 px-0">Login</a> </div>
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

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="../estilo/script.js"></script>

</body>
</html>
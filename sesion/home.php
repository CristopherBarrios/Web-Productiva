<?php
session_start();

//connect to database
$db=mysqli_connect("localhost","root","","calvox");


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <title>CALVOX</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css'>
  <link rel="stylesheet" href="../estilo/style.css">

<!--  Menu colorido -->
      <link rel="stylesheet" href="../estilo/efectos.css">
      <link rel="stylesheet" href="../estilo/letras1.css">


</head>
<body >

  <!-- barra superior-->
<div id="mainCoantiner">
  <div class="main-header">
        <div class="col-2">
          <a href="logout.php" class=" btn-link box-shadow-0 px-0 colorboard">Log Out</a> | <a href=""  class=" btn-link box-shadow-0 px-0 colorboard">Contactanos</a>
  </div>
  <!-- boton superior -->
        <div class="folio-btn">
            <a class="folio-btn-item ajax" href="" target="_blank">
            <span class="folio-btn-dot"></span>
            <span class="folio-btn-dot"></span>
            <span class="folio-btn-dot"></span>
            <span class="folio-btn-dot"></span>
            <span class="folio-btn-dot"></span>
            <span class="folio-btn-dot"></span>
            <span class="folio-btn-dot"></span>
            <span class="folio-btn-dot"></span>
            <span class="folio-btn-dot"></span>
            </a>
        </div>
    </div>
</div>
<!--particulas-->
<div>
  <div class="starsec"></div>
  <div class="starthird"></div>
  <div class="starfourth"></div>
  <div class="starfifth"></div>
</div>

<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<!-- Cuerpo -->
<div class="centreado2">
    <div class="container text-center text-dark ">
        <div class="">
            <div class="">
                <div class="row">
                    <div class="">
                        <div class="card">
                            <div class="card-body wow-bg a" id="formBg">
                            <h3 class="colorboard">Home</h3>
                              <div>
                              <p class="text-muted">Welcome <?php echo $_SESSION['username']; ?></p>
                              </div>
                              <div class="contenedor" id="uno"><a href="../images/calendar.png"></a>
                                <a href="../calendario"><img class="icon" id="pachon" src="../images/calendar.png" alt="Enviar"></a>
                                <p class="texto">Calendario</p>
                              </div>
                              <div class="contenedor" id="dos">
                                <a href="../chat"><img class="icon" src="../images/chat.png" alt="Enviar"></a>	
                                <p class="texto">Chat</p>
                              </div>
                              <div class="contenedor" id="tres">
                                <a href="../todo"><img class="icon" src="../images/todo.png" alt="Enviar"></a>
                                <p class="texto">To-Do</p>
                              </div>
                              <div class="contenedor" id="cuatro">
                                <a href="../pomodoro"><img class="icon" src="../images/pomodoro.png" alt="Enviar"></a>
                                <p class="texto">Pomodoro</p>
                              </div>
                          
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>
</div>
</body>
</html>

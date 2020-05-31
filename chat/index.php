<!--Cristopher Jose Rodolfo Barrios Solis  18207-->
<?php
session_start();

//connect to database
$db=mysqli_connect("localhost","root","","calvox");


?>
<html>
  <head>
    <link rel="stylesheet" href="../estilo/style.css">
  </head>
  <body>
<!-- Particulas -->
    <div>
        <div class="starsec"></div>
        <div class="starthird"></div>
        <div class="starfourth"></div>
        <div class="starfifth"></div>
      </div>
      <style>
						.boton{
							position: absolute;
							top:0px;
							left:0px;
						}
						
					</style>
					<div class="boton">
					<a href="../sesion/home.php">
				<img src="../images/atras.png" alt="">
				</a>
				</div>

    <script type="application/javascript">

      let titulaso = document.createElement('h1');
      let scroll = document.createElement('article');
      let newElement = document.createElement('input');
      let boton = document.createElement('button');
 
      var divi = document.createElement('div');


      document.body.appendChild(titulaso);
      document.body.appendChild(divi);
      document.body.appendChild(scroll);
      document.body.appendChild(newElement);
      document.body.appendChild(boton);
   
      //el mero titulo
      let txt = document.createTextNode("El Chat de: Por eso esperaba con la carita empapada a que llegaras con rosas");
      titulaso.appendChild(txt);
      titulaso.appendChild(txt);
      titulaso.style.textAlign = "center";
      titulaso.style.color = "white";

      //scroll
      scroll.style.fontSize = "  x-large";
      scroll.style.height = "450px";
      scroll.style.top ="-500px";
      scroll.style.overflowY = "scroll";
      scroll.style.left= "-400px";
      scroll.style.width = "1200px";
      scroll.style.marginLeft = "450px"
      scroll.style.borderRadius = "50px 50px 50px 50px";
      scroll.style.backgroundColor = "rgb(233,147,26)";
      scroll.style.position ="relative";
      

      //div
      divi.style.width = "1290px"
      divi.style.height ="525px";
      divi.style.background = "rgb(208,101,3) ";
      divi.style.position ="relative";
      divi.style.borderRadius = "50px 50px 50px 50px";


      //la onda esa donde se esviben los mensajes xdxd osea input
      newElement.style.width ="1190px";
      newElement.style.height ="50px";
      newElement.style.position ="relative";
      newElement.style.top ="-430px";
      newElement.style.right= "0px";
      newElement.maxLength = 140;   //definiendo el numero de caracteres
      newElement.style.background = "rgb(22,145,190)";
      newElement.style.color = "black";
      newElement.style.fontSize = "20px";
      newElement.style.borderRadius = "50px 0px 0px 50px";

      //Boton
      boton.style.width="100px";
      boton.style.height="50px";
      boton.style.position ="relative";
      boton.style.top ="-432px";
      boton.style.left= "0px";
      boton.style.background = "rgb(22,145,190) ";
      boton.style.color = "black";
      boton.style.text ="hola";
      boton.innerHTML = "Enviar";
      boton.style.borderRadius = "0px 50px 50px 0px";
      boton.onclick = enviar;

      //cuerpo
   
      //mensajes
      obtener();
      function obtener() {
    fetch("http://quetzaluno.space:3000/messages").then(
        response => response.json()).then(
            response => {
                response.map(ent => {
                  let caja = document.createElement("p");
                    let espacio = document.createElement("br");
                    caja.style.paddingLeft = "30px";
                    caja.style.marginLeft = "50px";
                    caja.style.marginRight = "50px";
                    caja.style.paddingRight = "40px";
                    caja.style.wordWrap = "break-word";
                    caja.style.paddingBottom = "20px";
                    caja.style.backgroundColor = "#C5C9A4";
                    caja.style.borderRadius = "25px";
                    if (ent.username == "<?php echo $_SESSION['username']; ?>") {
                        caja.style.textAlign = "right";
                    }
                    caja.append(ent.username);
                    caja.append(espacio);
                    if (ent.message.includes(".jpg") || ent.message.includes(".png")) {
                        let imagen = document.createElement("img");
                        imagen.src = ent.message;
                        imagen.style.width = "300px";
                        imagen.style.height = "300px";
                        caja.append(imagen);
                    }
                    else {
                        caja.append(ent.message);
                    }
                    scroll.appendChild(caja);
                    scroll.scrollTop = scroll.scrollHeight; //chat visto desde abajo
                }
                )
            })
        ;
}
async function enviar() {
    var entrada = newElement.value;
    if (entrada != "") {
        var Mensajito = {
            username: "<?php echo $_SESSION['username']; ?>",
            message: entrada
        }
        let respo = await fetch('http://quetzaluno.space:3000/messages', {
            method: 'POST',
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(Mensajito)
        });
        newElement.value = "";
    }
    scroll.innerHTML = "";
    obtener();
}
//Enviar con enter
newElement.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        enviar();
    }
})
    </script>
  </body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso FullStack</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />
    <!-- Font Awesome CSS (se necesita conexión a internet) -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-z2rh6j5BY2XjyJFkOxk5A+8GMtAGewc+6j7m1ks9qZClgHU8VCcoPvjcjiHQG2+Cb97K5+7+5k0MzGZ7bQ9c3g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="../assets/css/footer.css" />
    <!--<link rel="stylesheet" href="assets/css/images.css" />-->
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link rel="stylesheet" href="../assets\css\contactos.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- Navbar Brand -->
        <a class="navbar-brand" href="../index.html">
          <img
            class="icono"
            src="https://static.vecteezy.com/system/resources/previews/001/331/958/original/colourful-dia-de-los-muertos-floral-illustration-free-vector.jpg"
            alt="Calaveritas"
          />
        </a>
        <!-- Navbar Toggler -->
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="../index.html"
                >Pagina principal <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Informacion dia de muertos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Eventos por el dia de muertos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Calaveritas literarias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contactanos</a>
              </li>
          </ul>
        </div>
      </nav>


<!--Main-->
<!--el methodo get envia los datos al destino, pero muestra los datos en la url-->
<!--el methodo post envia los datos al destino, pero no muestra los datos en la url-->
<!--el action es el destino-->

<main>
    <div class="container" >
    <form action="../controlador/clientesController.php" method="get">
      <div class="form-group">
        <label for="txtNombre">Nombre completo</label>
        <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre">
      </div>
      <div class="form-group">
        <label for="txtEmail">Email</label>
        <input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="txtTelefono">Telefono</label>
        <input type="number" class="form-control" name="txtTelefono" id="txtTelefono" placeholder="Telefono">
      </div>
      <div class="form-group">
        <label for="txtComentario">Comentario</label>
        <textarea class="form-control" id="txtComentario" name="txtComentario" placeholder="Comentario" cols="16" rows="8"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Enviar comentarios</button>
      <button type="button" class="btn btn-danger">Regresar</button>


      <div>
        <h3>Comentarios previos</h3>




        <table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Comentario</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once("../modelos/conexion.php");
        require_once("../modelos/ClientesModel.php");
        $clientes = new ClientesModel();
        $getComments = $clientes->SELECT();
        if($getComments){
          while ($fila = $getComments->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$fila["nombre"]."</td>";
            echo "<td>".$fila["email"]."</td>";
            echo "<td>".$fila["telefono"]."</td>";
            echo "<td>".$fila["comentario"]."</td>";
            echo "<td>";
            echo "<button type='button' class='btn btn-primary' onclick=\"actualizar('".$fila["nombre"]."')\">Editar comentario</button>";
            echo "<button type='button' class='btn btn-danger' onclick=\"eliminar()\">Eliminar comentario</button>";
            echo "</td>";
            echo "</tr>";
        }
        
        
        }
        ?>
    </tbody>
</table>


      </div>
    </form>
    </div>
</main>


<!--FOOTER-->
<footer>
    <div class="footer center-content">
      <div class="row">
        <ul>
          <li>
            <a href="#"><i class="fa fa-facebook"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-instagram"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-youtube"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-twitter"></i></a>
          </li>
        </ul>
      </div>

      <div class="row">
        <ul>
          <li><a href="#">Contact us</a></li>
          <li><a href="#">Our Services</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Terms & Conditions</a></li>
          <li><a href="#">Career</a></li>
        </ul>
      </div>

      <div class="row">
        <ul>
          INFERNO Copyright © 2021 Inferno - All rights reserved || Designed
          By: Mahesh
        </ul>
      </div>
    </div>
  </footer>
  <script>
   //  document.getElementById("txtNombre").value="poooorr fiiiiiiiiiiinnn";

   function actualizar(nombre){
    alert(nombre)
   }

   function eliminar(){

   }

    </script>
      <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>
</body>
</html>
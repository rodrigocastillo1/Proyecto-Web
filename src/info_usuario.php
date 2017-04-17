<!--Proyecto de Tienda Información de usuario-->
<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo_tienda.css">
    <title>Music Store</title>
  </head>
  <body>
    
    <nav class="navbar navbar-default" role="navigation">
      <div class="navbar-header nav.navbar">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
        data-target=".navbar-ex1-collapse">
        <span class="sr-only">Navegar</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Music Store</a>
      </div>
      
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Inicio</a></li>
          <li><a href="#">Artículos</a></li>
        </ul>
        
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              Usuario <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="logout.php">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <?php
      require("conexion.php");
      $consulta_usuario = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$_SESSION['email']'")
      echo "<table border = '1' style='text-align:center;'> \n";
        echo "<br><br><hr>";
          echo "<tr><td>Email</td><td>Nombre</td><td>Apellido Paterno</td><td>Apellido Materno</td><td>Edad</td</tr>\n";
          while ($fila = mysqli_fetch_fila($consulta_usuario)){
            echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td></tr> \n";
          }
      echo "</table> \n";
    ?>

    <script src="../js/jquery-3.2.0.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
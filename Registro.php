<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Aqui se pueden observar los links de archivos css y librearias que usamos de páginas exteriores -->

    <link rel="stylesheet" href="css/registro.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Registro</title>

    <!-- Aqui se pueden obervar los estilos locales -->

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Bebas Neue', sans-serif;
            font-family: 'Exo 2', sans-serif;
            font-family: 'Nosifer', sans-serif;
            font-family: 'Roboto', sans-serif;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
        } 
        a{
            text-decoration: none;
            list-style: none;
        }  
        table{
            background-color: rgba(100, 100, 100, 0.4);
        }
        td{
            color:white;
        }
       

        p{
            font-family: 'Montserrat', sans-serif;
        }
        .col,td,input{
            font-weight: bold;
            font-family: 'Josefin Sans', sans-serif;
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <title>Registro</title>
</head>
<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $bd = "registroislandia";
    $conexion = mysqli_connect($servidor,$usuario,$clave,$bd);
    ?>

<body>
<div class="container">

    <!-- En esta sección abarca el header y menu principal de la página -->

<header class="header">
        <div class="menu contenedor">
                    <a href="Index.html"><img src="./images/logo.png" class="logo" /></a>
                    <input type="checkbox" id="menu" />
                    <label for="menu">
                        <img src="./images/menu.png" class="menu-icono" alt="">
                    </label>
                    <nav class="navbar">
                        <ul>
                            <li><a href="Historia.html">Historia</a></li>
                            <li><a href="Turistico.html">Lugares Turisticos</a></li>
                            <li><a href="Platillos.html">Platillos Tipicos</a></li>
                            <li><a href="Contacto.html">Contacto</a></li>
                            <li><a href="Registro.php">Registro</a></li>
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Admin</a></li>
                        </ul>
                    </nav>
        </div>
        <?php
if(isset($_POST['registrarse']))
{

    if($_POST['camisa'] == "NO")
    {
        $talla = "Ninguna";
    }
    else
    {
        $talla=$_POST['talla'];
    }
    $insertar="INSERT INTO datos (nombre,apellido,edad,genero,telefono,ciudad,transporte,camisa,talla,comentarios) 
    values ('$_POST[nombre]','$_POST[apellido]','$_POST[edad]','$_POST[genero]','$_POST[telefono]','$_POST[ciudad]','$_POST[transporte]','$_POST[camisa]','$talla','$_POST[comentarios]')";
      $query = mysqli_query($conexion,$insertar);
      if($query)
      {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registro exitoso!</strong> Gracias por registrarte en nuestra página
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
      }
      else
      {
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error en el registro!</strong> Intente registrarse nuevamente
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
      }
}

if(isset($_POST['iniciarsesion']))
{

   $user = $_POST['user'];
   $pass = $_POST['password'];
   if($user=="admin" && $pass=="admin147")
   {
    header('Location: Admin.php');
   }
   else
   {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error en inicio de sesión</strong> Verifique sus datos
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
   }
}
?>
</header>

    <!-- En esta sección abarca el contenido principal de la página -->

    <div class="row">
        <div class="col">
            <form action="Registro.php" method="post" name="registrarse">
            <table class="table table-striped">
                <tr>
                    <td colspan="3" style="text-align:center">DATOS PERSONALES</td>
                </tr>
                <tr>
                    <td>Nombre(s)</td>
                    <td>Apellidos(s)</td>
                    <td>Edad</td>
                </tr>
                <tr>
                    <td><input type="text" pattern="[a-zA-Z\s]*" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre(s)" required onkeyup="mayus(this);"></td>
                    <td><input type="text" pattern="[a-zA-Z\s]*" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido(s)" required onkeyup="mayus(this);"></td>
                    <td><input type="number" class="form-control" min="18" max="60" name="edad" id="edad" placeholder="Ingrese su edad" required onkeyup="mayus(this);"></td>
                </tr>
                <tr>
                    <td>Género</td>
                    <td>Ciudad</td>
                    <td>Celular</td>
                </tr>
                <tr>
                    <td><select name="genero" id="genero"  class="form-control" required>
                        <option value="HOMBRE">HOMBRE</option>
                        <option value="MUJER">MUJER</option>
                        <option value="NOBINARIO">NO BINARIO</option>
                        <option value="OTRO">OTRO</option>
                    </select></td>
                    <td><select name="ciudad" id="ciudad"  class="form-control" required>
                        <option value="TIJUANA">TIJUANA</option>
                        <option value="ROSARITO">ROSARITO</option>
                        <option value="TECATE">TECATE</option>
                        <option value="ENSENADA">ENSENADA</option>
                        <option value="MEXICALI">MEXICALI</option>
                    </select></td>
                    <td><input type="text" class="form-control" maxlength="10" name="telefono" id="telefono" placeholder="Ingrese su celular (10 dígitos)" required></td>
                </tr>
                <tr>
                    <td>Transporte</td>
                    <td>Camisa</td>
                    <td>Talla</td>
                </tr>
                <tr>
                <td><select name="transporte" id="transporte"  class="form-control" required> 
                        <option value="NO">NO</option>
                        <option value="SI">SI</option>
                    </select></td>
                    <td><select name="camisa" id="camisa"  class="form-control" required onchange="mostrartalla(this.value);">
                        <option value="NO">NO</option>
                        <option value="SI">SI</option>
                    </select></td>
                    <td><select name="talla" id="talla"  class="form-control" style="display: none;" required>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center">¿Desea agregar comentarios?</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center"><textarea name="comentarios" class="form-control" id="comentarios" cols="100" rows="3" required onkeyup="mayus(this);"></textarea></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center"><input type="submit" class="btn btn-light" name="registrarse" value="REGISTRARSE"></td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
</body>

<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesión Administrador</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="Registro.php" method="post" name="iniciarsesion">
      <div class="modal-body">    
        <div class="container-fluid">
            <div class="row">
            <div class="col"><img src="images/user.png" class="img-fluid"></div>
            <div class="col">Usuario: <input type="text" name="user" style="text-transform:lowercase;" id="user" class="form-control"> <br>
            Contraseña: <input type="password" style="text-transform:lowercase;" name="password" id="password" class="form-control"> 
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-success" name="iniciarsesion" value="Iniciar Sesión">
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function mostrartalla(camisa){
        if(camisa == "SI")
        {
            document.getElementById("talla").style.display="block";
        }
       
        if(camisa=="NO")
        {
            document.getElementById("talla").style.display="none";
        }

       
    }
    function mayus(e) {
        e.value = e.value.toUpperCase();
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
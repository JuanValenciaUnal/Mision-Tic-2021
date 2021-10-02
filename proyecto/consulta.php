<!DOCTYPE html>
<html>
    <head>
        <meta name= "author" content="MinTicDevs">
        <!--De qué se trata esta página-->
        <meta name="description" content="Página de inicio">
        <meta name="keywords" content="Primeros pasos para creación de sistema">
        <meta http-equiv="Refresh" content="30">
        <link rel="stylesheet" type="text/css" href="../proyecto/estilosheader.css">
        <title> 
            MinTicDevs 
        </title>
    </head> 
        
    <body>
        <header>
            <div id="logo">
                <img src="domain (2).png" alt="MinTicDevs">
                <h1>
                    Proyecto MinTicDevs
                </h1> 
            </header>
        
        <nav class="menu">
            <ul>
                <li><a href="index.html">Inicio</a> </li>
                <li><a href="registrarventas.html">Registrar ventas</a> </li>
                <li><a href="consulta.php">Consultar ventas</a> </li>
                <li><a href="index.php">Salir</a> </li>
            </ul>
        </nav>
    </div>
    
    </body>
    
</html>
<br>
        <h3>Consultar</h3>
        <br>
<?php
    $conexion=mysqli_connect('localhost','root','','clientes');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>mostrar datos</title>
</head>
<body>

<br>

<center>
<table border=5>
    <tr>
        <td>Nombre del cliente</td>
        <td>Documento de identidad</td>
        <td>Correo electronico</td>
        <td>Codigo del producto</td>
        <td>Mensaje</td>
</tr>
<?php
$sql="SELECT *from usuario";
$result=mysqli_query($conexion,$sql);

while($mostrar=mysqli_fetch_array($result)){
?>
<tr>
    <td><?php echo $mostrar ['user_name'] ?></td>
    <td><?php echo $mostrar ['user_id'] ?></td>
    <td><?php echo $mostrar ['user_mail'] ?></td>
    <td><?php echo $mostrar ['product_id'] ?></td>
    <td><?php echo $mostrar ['user_message'] ?></td>
</tr>
<?php
}
?>
</table>
</center>
</body>
</html>



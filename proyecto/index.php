<!DOCTYPE html>
<html>
    <head>
        <meta name= "author" content="MinTicDevs">
        <!--De qué se trata esta página-->
        <meta name="description" content="Página de inicio">
        <meta name="keywords" content="Primeros pasos para creación de sistema">
        <meta http-equiv="Refresh" content="30">
        <link rel="stylesheet" type="text/css" href="../proyecto/estilos login.css">
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
    </div>
    
    </body>
    
</html>
        
        <h3>INGRESO</h3>
        
<html>
	<head>
		<title>Login de usuario</title>
		
	</head>
    <br>
    <br>
    <br>
    <br>
	<body>
		<center>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			Usuario:<br>
			<input type="text" name="usuario"><br>
			Clave:<br>
			<input type="password" name="clave"><br><br>
			<input type="submit" name="login" value="Ingresar">
		</form>
		</center>
	</body>
</html>

<?php
	
// 1. Conexion con el servidor y la base de datos
$conexion = new mysqli('localhost', 'root', '', 'loginsencillo');
if ($conexion->connect_errno) {
    echo "ERROR al conectar con la DB.";
    exit;
}

// 2. isset() del boton login
if(isset($_POST['login'])){

    // 3. Variables $_POST[]
    $usunombre = $_POST['usuario'];
    $usuclave = MD5($_POST['clave']); // La función MD5() estará encriptando lo ingresado para comparar con lo guardado
    

    if($usunombre == "" || $_POST['clave'] == null){ // Validamos que ningún campo quede vacío
        echo "<script>alert('Error: usuario y/o clave vacios!!');</script>"; // Se utiliza Javascript dentro de PHP
    }else{
        // 4. Cadena de SQL
        $sql = "SELECT * FROM usuarios WHERE usunombre = '$usunombre' AND usuclave = '$usuclave'";
        
        // 5. Ejecuto cadena query()
        if(!$consulta = $conexion->query($sql)){
            echo "<script>('ERROR: no se pudo ejecutar la consulta!');</script>";
        }else{
            // 6. Cuento registros obtenidos del select. 
            // Como el nombre de usuario en la clave primaria no debería de haber mas de un registro con el mismo nombre.
            $filas = mysqli_num_rows($consulta);           
            
            // 7. Comparo cantidad de registros encontrados
            if($fila == 0){
                header('location:index.html'); // Si está todo correcto redirigimos a otra página
            }else{
                echo "<script>alert('Error: usuario y/o clave incorrectos!!');</script>";
            }

        }
    }
}

?>








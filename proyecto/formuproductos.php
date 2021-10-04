<?php
$user_name = $_POST['product_name'];
$user_id = $_POST['product_id'];
$user_mail = $_POST['product_ventas'];
$product_name = $_POST['product_characteristics'];
$product_id = $_POST['product_cliente'];
$user_message = $_POST['product_message'];

if(!empty($product_name)||!empty($product_id)||!empty($product_ventas)||!empty($product_characteristics)||!empty($product_message)){
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="productos";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT product_id from productos where product_id = ? limit 1";
        $INSERT = "INSERT INTO usuario (product_name, product_id, product_ventas, product_characteristics, product_message)
        values(?,?,?,?,?)";

        $stmt=$conn->prepare($SELECT);
        $stmt -> bind_param("i",$product_id);
        $stmt ->execute();
        $stmt ->bind_result($product_id);
        $stmt ->store_result();
        $rnum = $stmt ->num_rows;
        if($rnum ==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param("siiss",$product_name,$product_id,$product_ventas,$product_characteristics,$product_message);
            $stmt ->execute();
            echo "REGISTRO COMPLETADO.";

        }
        else{
            echo "Alguien ha registrado ese código de producto.";

        }
        $stmt->close();
        
    }
}
else{
    echo "Todos los datos son obligatorios";
    die();
}

?>
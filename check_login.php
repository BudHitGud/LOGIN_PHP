<!DOCTYPE html>
<html>
<head>
    <title>Resultado de Login</title>
    <link rel="stylesheet" href="formatoLogin.css"> 
</head>

<body>

<?php



    try {
        $base = new PDO("mysql:host=localhost; dbname=sesionprivada", "root", "");
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected to database successfully!";

        
        // Obtener valores del POST
        $mail = $_POST["InputMail"];
        $pass = $_POST["InputPass"];
        
        echo $mail . "|" . $pass;
        
        //CREAR LA CONSULTA MODELO CON PLACEHOLDERS
        $sql = "SELECT * FROM registrousuarios WHERE Email = :M_Mail AND Password = :M_Pass";
        $resultado = $base->prepare($sql);
        

        // Asignar los valores del POST  a los placeholders
        $resultado->bindValue(":M_Mail", $mail);
        $resultado->bindValue(":M_Pass", $pass);
        
        //CONSULTAR COINCIDENCIAS
        $resultado->execute();

        //SI EXISTE 1..
        $numregistro = $resultado->rowCount();

        if ($numregistro != 0) {
            
            session_start();
            $_SESSION["usuario"] = $_POST["InputMail"];
            
            
            // Redirigir a la página de éxito (ejemplo)
            header("Location: bienvenida.php"); 
            exit(); // Importante: Detener la ejecución del script después de la redirección
        } else {
            header("Location: login.php");
            exit(); // Detener la ejecución del script después de la redirección
        }

    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }

?>

</body>
</html>
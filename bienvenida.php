






<?php 

    session_start();
    if(!isset($_SESSION["usuario"])){
        
        header("Location: login.php");
    }
    
    
    
    
    echo"<h1>PAGINA PRIVADA<h1>";
    echo"<p>Bienvenido</p>";

    
   echo "<p><a href='cerrar_sesion.php'>Cerrar Sesion</a></p>";

	echo"<p> Colaborando BudHitGud y XRJAm </p>";


?>
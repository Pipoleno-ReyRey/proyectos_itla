<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inicio de sesion</h1>
    <h3>ingresa tu correo y tu clave</h3>
    <form action="login.php" method="post">
        <input type="text" name="correo" placeholder="correo">
        <input type="password" name="clave" placeholder="clave">
        <button type="submit" name="enviar">enviar</button>
    </form>
</body>
</html>

<?php
class Usuario{
    function __construct($correo, $clave){
        $this->correo = $correo;
        $this->clave = $clave;
    }

    function Registrarse(){
        $_SESSION["correoRegistrado"] = $_POST["correo"];
        $_SESSION["claveRegistrada"] = $_POST["clave"];
        $this->correo = $_SESSION["correoRegistrado"];
        $this->clave = $_SESSION["claveRegistrada"];
        
        echo "te registraste correctamente";
    }

    function InicioSesion(){
        if($_SESSION["correoRegistrado"] == $_POST["correo"] && $_SESSION["claveRegistrada"] == $_POST["clave"]){
            echo "te logueaste exitosamente";
        } else{
            echo "correo o clave erroneo";
        }
    }
}

session_start();
$usuario = new Usuario("", "");
if(isset($_POST["enviar"])){
    if(isset($_SESSION["correoRegistrado"]) && isset($_SESSION["claveRegistrada"])){
        $usuario->InicioSesion();
    } else{
        $usuario->Registrarse();
    }
}

?>
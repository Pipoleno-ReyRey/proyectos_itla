<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>gestion empleados</h1>
    <form action="agregarEmpleado.php" method="post">
        <button type="submit" name="agregarEmpleado">agregar empleado</button>
    </form>
    <form action="gestion_empleados.php" method="post">
        <button type="submit" name="calcularSalarios">calcular salarios</button>
    </form>
</body>
</html>

<?php

class Empleado{
    public $nombre = "";
    public $salario = 0.00;
    public $puesto = "";
    public function __construct($nombre, $salario, $puesto) {
        $this->nombre = $nombre;
        $this->salario = $salario;
        $this->puesto = $puesto;
    }
}

session_start();
if(isset($_SESSION["empleados"]) == false){
    $_SESSION["empleados"] = [];
}

if(isset($_POST["enviar"])){
if(isset($_POST["nombre"]) && isset($_POST["salario"]) && isset($_POST["cargo"])){
    $empleado = new Empleado($_POST["nombre"], $_POST["salario"], $_POST["cargo"]); 
    $empleados = $_SESSION["empleados"];
    $empleados[] = $empleado;
    $_SESSION["empleados"] = $empleados;
    foreach($_SESSION["empleados"] as $empleado){
        echo "<li> nombre: ".$empleado->nombre." -- salario: ".$empleado->salario." -- cargo: ".$empleado->puesto."</li>";
    }
}
}else{
foreach($_SESSION["empleados"] as $empleado){
    echo "<li> nombre: ".$empleado->nombre." -- salario: ".$empleado->salario." -- cargo: ".$empleado->puesto."</li>";
}
}

if(isset($_POST["calcularSalarios"])){
    $salariosTotal = 0.00;
    foreach($_SESSION["empleados"] as $empleado){
        $salariosTotal += $empleado->salario;
    }
    $_SESSION["salarios"] = "la empresa paga ".$salariosTotal." en salarios";
    echo $_SESSION["salarios"];
}
?>
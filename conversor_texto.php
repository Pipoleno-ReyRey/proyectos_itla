<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Conversor de texto</h1>
    <form action="conversor_texto.php" method="post">
        <input type="text" name="texto" placeholder="texto">
        <button type="submit" name="enviar">enviar</button>
    </form>
</body>
</html>

<?php
    class ConversorTexto{
        public $texto = "";

        public function __construct($texto){
            $this->texto = $texto;
        }

        public function CantidadLetras(){
            $cantidadLetras = strlen($this->texto);
            echo "<p>el texto tiene $cantidadLetras letras </p>";
        }

        public function Mayusculas(){
            $mayusculas = strtoupper($this->texto);
            echo "<p>$mayusculas</p>";
        }

        public function Minusculas(){
            $minusculas = strtolower($this->texto);
            echo "<p>$minusculas</p>";
        }

        public function palindromo(){
            $textoInverso = "";
            for($i = strlen($this->texto)-1; $i >= 0; $i--){
                $textoInverso .= $this->texto[$i];
            }


            if(preg_replace('/\s/', '', $this->texto) == preg_replace('/\s/', '', $textoInverso)){
                echo "<p>es un palindromo</p>";
            } else {
                echo "<p>no es un palindromo</p>";
            }
        }
    }

    if(isset($_POST["enviar"])){
        if(isset($_POST["texto"]) && empty($_POST["texto"]) != true ){
            $texto = new ConversorTexto($_POST["texto"]);
            $texto->CantidadLetras();
            $texto->Mayusculas();
            $texto->Minusculas();
            $texto->palindromo();
        }
    }
    
?>
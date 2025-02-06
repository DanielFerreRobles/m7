<?php
class Calculadora{
function suma($num1, $num2){
    return $num1 + $num2;


}

function resta($num1, $num2){
    return $num1 - $num2;
}
}

$calc = new Calculadora();
echo $calc->suma(5, 3);
echo $calc->resta(5, 3);


?>



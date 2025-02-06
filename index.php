<?php
class Cotxe {
public string $marca;
public string $model;

function __construct($marca, $model) {
$this->marca = $marca;
$this->model = $model;
}

 function descripcio(){
return "Aquest cotxe és un " . $this->marca . " " . $this->model . ".";
}
}

$cotxe = new Cotxe("BMW", "X5");
echo $cotxe->descripcio();


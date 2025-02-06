<?php
session_start();

class JocAdivinacio{
    public $numeroSecret;

    public $intents;


    function __construct($numeroSecret, $intents){
        $this->numeroSecret = $_SESSION['numeroSecret']= rand(1, 20);
        $this->intents = $_SESSION['intents'];
    }

   public function comprovar($num){
        $_SESSION['numeroSecret'] = $this->numeroSecret;
        $_SESSION['intents'] = $this->intents;

        $this->intents++;
        if($num == $this->numeroSecret){
            echo "Has encertat el número secret en " . $this->intents . "intents";
        }else if($num < $this->numeroSecret){
            echo "El número secret es més gran";
        }else{
            echo "El número secret es més petit";
        }
    }
}
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Numero</title>
    </head>
    <body>
        <h1> número entre 1 - 20</h1>
        <form method="POST" action="joc1.php">
            <input type="number" name="num" min="1" max="20" required>
            <input type="submit" value="Comprovar">
        </form>
        <?php
        if(isset($_POST['num'])){
            $num = $_POST['num'];
            $joc = new JocAdivinacio($num);
        }
        ?>
        
    </body>
    </html>    
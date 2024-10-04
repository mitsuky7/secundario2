<?php 
$imagem = $_FILES["imagem"]; 
$host = "localhost"; 
$username = "root"; 
$password = "1234"; 
$db = "teste"; 

$acesso = 'mysql:host=' . $host . ';dbname=' . $db; 

// Recebeu a imagem
if($imagem != NULL):
    $nomeFinal = time().'.jpg'; 

    // Tenta gravar o arquivo no servidor
    if (move_uploaded_file($imagem['tmp_name'], './uploads/'.$nomeFinal)): 

        // Pega a imagem
        //$tamanhoImg = filesize($nomeFinal); 
        //$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 

        // Conecta-se ao BD e tenta gravar
        try{
            $pdoConecta = new PDO( $acesso, $username, password: $password ) ;
            $pdoConecta->query("INSERT INTO UPLOADS (PES_IMG) VALUES ('$nomeFinal')");
        } catch( PDOException $e ) {
            echo $e->getMessage();
        }

    
    endif;

else:
    echo"Você não realizou o upload de forma satisfatória."; 
endif;

?>

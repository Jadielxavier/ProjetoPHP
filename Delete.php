<!-- Parametro para exclusão de registro da Tabela: -->
<?php

if (!empty($_GET['id_Agenda']))
{
    include_once('config.php');
    
    $id = $_GET['id_Agenda'];
    

    $sqlDelete = "DELETE FROM Agenda WHERE id_Agenda = " . $id;

    //Check connection

    if($conexao->connect_error){
        die("Connection failed: ".$conexao-> connect_error);
    }

    if ($conexao-> query($sqlDelete)=== true){
        echo "<script>alert('Registro Deletado!')
        javascript:window.location='tabela.php';
        </script>";
    } else{
        echo "Error deleting record: ".$conexao->error;

    }

    $conexao->close();
    // verificar se a registro maior que 0
    // if($result->num_rows > 0 )   
    // {
    //    $sqlDelete ="DELETE FROM Agenda WHERE id_Agenda = " . $id;
    //    $resultDelete = $conexao->query($sqlSelect);
        // var_dump( $resultDelete);
    // }

    
   
}
// header('Location:tabela.php');






?>
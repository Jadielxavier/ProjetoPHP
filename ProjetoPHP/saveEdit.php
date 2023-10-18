<!-- Parametro para Editar informação do formulario  -->
<?php

include_once('config.php');

if(isset($_POST['update'])) 
{

$id = $_POST['id_Agenda'];
$Nome = $_POST['Nome'];
$Cpf = $_POST['Cpf'];
$Email = $_POST['E_mail'];
$Telefone = $_POST['Telefone'];
$Tipo_Servico = $_POST['Tipo_Servico'];
$Data_Horario = $_POST['Data_Horario'];


$sqlUpdate = "UPDATE Agenda SET Nome = '$Nome', Cpf = '$Cpf',E_mail = '$Email',Telefone = '$Telefone',Tipo_Servico = '$Tipo_Servico',
Data_Horario = '$Data_Horario'  WHERE id_Agenda ='$id'";


 
    
        //Check connection;

        if($conexao->connect_error){
            die("Connection failed: ".$conexao-> connect_error);
        }
        if ($conexao-> query($sqlUpdate)=== true){
        echo "<script>alert('Registro atualizado!')
        javascript:window.location='tabela.php';
        </script>";    
         

        } else{
            echo "Error UPDATE record: ".$conexao->error;
    
        }

        $conexao->close();
}

    // header('Location:tabela.php');




?>
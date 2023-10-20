<?php
include_once('config.php');

if(isset($_POST['submit']))
{
    // print_r('Nome:'.$_POST['Nome']);
    // print_r('<br>');
    // print_r('CPF:'.$_POST['Cpf']);
    // print_r('<br>');
    // print_r('Email:'.$_POST['E_mail']);
    // print_r('<br>');
    // print_r('Telefone'.$_POST['Telefone']);
    // print_r('<br>');
    // print_r('Tipo de Servico'.$_POST['Tipo_Servico']);
    // print_r('<br>');
    // print_r('Data e Horario:'.$_POST['Data_Horario']);

  $Nome = $_POST['Nome'];
  $Cpf = $_POST['Cpf'];
  $Email = $_POST['E_mail'];
  $Telefone = $_POST['Telefone'];
  $Tipo_Servico = $_POST['Tipo_Servico'];
  $Data_Horario = $_POST['Data_Horario'];

 //verificar se existe Cpf cadastrado no banco
  $sql = $conexao->query("SELECT * FROM Agenda WHERE Cpf = '$Cpf'");
  
  if (mysqli_num_rows ($sql) > 0) {

    echo "<script>alert('CPF já consta Cadastrado!')
    javascript:window.location='FormAgenda.php';
    </script>"; 

  } else 
    
  //verificar se existe Data e mesmo horario cadastrado no banco
   
  $sql = $conexao->query("SELECT * FROM Agenda WHERE Data_Horario = '$Data_Horario'");
   if(mysqli_num_rows($sql)> 0) {
   echo "<script>alert('Data e Horario já consta reservado!')
   javascript:window.location='FormAgenda.php';
   </script>"; 

   }else{
   
    $sqlINSERT = ("INSERT INTO Agenda (Nome,Cpf,E_mail,Telefone,Tipo_Servico,Data_Horario) 
    VALUES ('$Nome','$Cpf','$Email','$Telefone','$Tipo_Servico','$Data_Horario')");

   //Check connection;
   if($conexao->connect_error)
        die("Connection failed: ".$conexao-> connect_error);
    }
    if ($conexao-> query($sqlINSERT)=== true){

    echo "<script>alert('Agendado com sucesso!')
    javascript:window.location='FormAgenda.php';
    </script>";    
     
    } else{
        echo "Error INSERT record: ".$conexao->error;

    }

    $conexao->close();
  }


?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Formulario Agenda</title>
</head>

<body>
    <div class="box">
        <form action="FormAgenda.php" method="POST">
            <fieldset>
                <legend><b></b>Formulario de agenda<b></b></legend>
                <br>
                <div class="inputBox">
                    <label for="Nome" class="labelInput">Nome</label>
                    <input type="text" name="Nome" id="Nome" class="inputUser" required>
                    <br><br>
                    <div class="inputBox">
                        <label for="Cpf" class="labelInput">CPF</label>
                        <input type="text" name="Cpf" id="Cpf" class="inputUser">

                        <br><br>
                        <div class="inputBox">
                            <label for="E_mail" class="labelInput">E-mail</label>
                            <input type="text" name="E_mail" id="E_mail"  class="inputUser">
                            <br><br>
                            <div class="inputBox">
                                <label for="Telefone" class="labelInput">telefone</label>
                                <input type="text" name="Telefone" id="Telefone" class="inputUser">
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <label for="Tipo_Servico" class="labelInput">Tipo de Serviço</label>
                                <input type="text" name="Tipo_Servico" id="Tipo_Servico"  class="inputUser">
                            </div>
                            <br><br>
                            <div class="DataHorario">
                                <label for="Data_Horario">Data - Horario</label>
                                <input type="datetime-local" name="Data_Horario" id="Horario">
                            </div>
                                <br><br>
                            <input type="submit" name="submit" id="submit" id="update">
                            <!-- <button nome="submit"type="submit"id="submit">Enviar</button> -->
            </fieldset>
        </form>
    </div>
</body>

</html>
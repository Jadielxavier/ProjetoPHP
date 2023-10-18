<!-- Parametro para trazer os dados da tabela para o formulario: -->
<?php

if (!empty($_GET['id_Agenda']));
   {
    
    include ('config.php');

    $id = intval ($_GET['id_Agenda']);
    

    $sqlSelect = "SELECT * FROM Agenda WHERE id_Agenda = $id";
    
    $result=$conexao->query($sqlSelect);    

    if($result -> num_rows > 0 )
    {
        while($dado = mysqli_fetch_assoc($result))
        {  
            $Nome = $dado['Nome'];
            $Cpf = $dado['Cpf'];
            $E_mail = $dado['E_mail'];
            $Telefone= $dado['Telefone'];
            $Tipo_Servico = $dado['Tipo_Servico'];
            $Data_Horario = $dado['Data_Horario'];
    
        }  
        


        
    }
    else
    {
      header('Location: sistema.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b></b>Formulario de agenda<b></b></legend>
                <br>
                <div class="inputBox">
                    <label for="Nome" class="labelInput">Nome</label>
                    <input type="text" name="Nome"id="Nome"value="<?= $Nome;?>" class="inputUser"required>
                    
                <br><br>
                <div class="inputBox">
                    <label for="Cpf" class="labelInput">CPF</label>
                    <input type="text" name="Cpf"id="Cpf"  value="<?= $Cpf;?>" class="inputUser"required>
                    
                <br><br>
                <div class="inputBox">
                    <label for="E_mail" class="labelInput">E-mail</label>
                    <input type="text"  name="E_mail"id="E_mail" value="<?= $E_mail;?>"class="inputUser"required >
                <br><br>
                    <div class="inputBox">
                        <label for="Telefone" class="labelInput">telefone</label>
                        <input type="text" name="Telefone"id="Telefone" value="<?= $Telefone;?>"class="inputUser"required >
                </div>
                <!-- <p>Sexo:</p>
                <input type="radio"id="feminino"nome="genero" value="feminino" <?= ($sexo =='F') ? 'checked' : ''?>required>
                 <label for="feminino">Feminino</label>
                 <input type="radio"id="masculino"nome="genero" value="masculino" <?= ($sexo =='M') ? 'checked' : ''?> required>
                 <label for="masculino">Masculino</label> -->
                 <br><br>
                 <div class="inputBox">
                    <label for="Tipo_Servico" class="labelInput">Tipo de Serviço</label>
                    <input type="text" name="Tipo_Servico" id="Tipo_Servico" value="<?= $Tipo_Servico;?>"class="inputUser"required>
                 </div>
                <br><br>
                 <div class="DataHorario">
                 <label for="Data_Horario">Data - Horario</label>
                 <input type="datetime-local" name="Data_Horario" id="Horario" value="<?= $Data_Horario;?>"required>
                 <br><br>
                 <!-- Campo oculto input type hidden -->
                 <input type="hidden" name="id_Agenda" value="<?= $id; ?>">
                 <input type="submit"name="update" id="submit"  id="update">
                 <!-- <button nome="update"type="update"id="submit">Salvar</button> -->
                </fieldset>
        </form>
    </div>
</body>
</html>
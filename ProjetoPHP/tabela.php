<?php
include_once('config.php');
// $cx = mysqli_connect ("localhost","root","root");
// $db = mysqli_select_db($db,"DPOS");
// $sql = mysqli_query($cx,"SELECT * FROM CLIENTE") or die(
//   mysqli_error($cx)
// )

// verificar o paramtero search se esta vazio
if(!empty($_GET['search'])){
 
  // variavel $data para pegar o valor search
  $data = ($_GET['search']);
  $sql = "SELECT * FROM Agenda WHERE id_Agenda LIKE '%$data%' or Nome LIKE '%$data%' or Cpf LIKE '%$data%'
   or Data_Horario LIKE '%$data%'
  ORDER BY id_Agenda DESC";
  


}
else{
  $sql = "SELECT * FROM Agenda WHERE id_Agenda ";

}

$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Agenda</title>
</head>
<body>

  
     <div class="BoxBuscar">
         <input type="search"class="form-control w-25" placeholder="Pesquisar"id="pesquisar">
            <button onclick="searchData()" class="btn btn-primary">
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
             </svg>
           </button>
          </div>
          
    <div class="m-5">
 <table class="table text-white">
         <div class="tables">
           <thead>
             <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Tipo De Servico</th>
                <th scope="col">Data e Horario</th>
                <th scope="col">...</th>
                <tr>
           </thead>
        </div>
        <tbody>
            <?php
              while($dado = mysqli_fetch_assoc($result))
              {
                echo "<tr>";
                echo "<td>".$dado['id_Agenda']."</td>";
                echo "<td>".$dado['Nome']."</td>";
                echo "<td>".$dado['Cpf']."</td>";
                echo "<td>".$dado['E_mail']."</td>";
                echo "<td>".$dado['Telefone']."</td>";
                echo "<td>".$dado['Tipo_Servico']."</td>";
                echo "<td>".$dado['Data_Horario']."</td>";
                echo "<td> 

                <a class='btn btn-sm btn-primary'href='Agenda.php?id_Agenda=$dado[id_Agenda]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'class='bi bi-pencil' viewBox='0 0 16 16'>
                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg>
                <a/>
                <a class='btn btn-sm btn-danger'href='Delete.php?id_Agenda=$dado[id_Agenda]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
                </svg>
                </a>
                </td>";
                echo "</td>";
                
              }
                ?>

        </tbody>   
     </table>
    </div>
</body>
<script>

  //Criado uma variavel search para chamar id pesquisar
    let search = document.getElementById('pesquisar');
 
  ///Verificar se teclar Enter se foi clicada
  search.addEventListener("keydown",function(event){
    if (event.key === "Enter") {
      searchData();
    }
  });
  
  function searchData()
  {
    window.location = 'tabela.php?search='+search.value;
  }

</script>     
</html>
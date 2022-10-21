<?php
#variaveis que vamos utilizar na query
$data    = filter_input(INPUT_GET, "data");
$data2   = filter_input(INPUT_GET, "data2");
$produto = filter_input(INPUT_GET,"produto");
$loja    = filter_input(INPUT_GET, "loja");
#conexões do banco de dados
define('DB_HOST'        , "");
define('DB_USER'        , "");
define('DB_PASSWORD'    , "");
define('DB_NAME'        , "");
define('DB_DRIVER'      , "sqlsrv");
#require dos arquivos php
require_once "php\Conexao.php";
require_once "php\query.php";
#execute
try{

    $Conexao    = Conexao::getConnection();
    #query no arquivo php/query.php
    $query      = $Conexao->query($consulta);
    $produtos   = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;
 }
?>

<!DOCTYPE html>
<html>
<title>Relatórios</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="CSS\index.css">
<body class="w3-container w3-white">
<!-- Navbar -->
<div class="w3-top">
</div>
<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-grey" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">&#9776;</button>
  <a href="#" class="w3-bar-item w3-button">Relatório 1</a>
  <a href="#" class="w3-bar-item w3-button">Relatório 2</a>
  <a href="#" class="w3-bar-item w3-button">Relatório 3</a>
</div>
<div id="main">
<div class="w3-black w3-margin">
<div id="festval">
    <h1>  <button id="openNav" onclick="w3_open()">&#9776;
  </button> FESTVAL</h1>
  </div>
</div>
<div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-teal">Filtros</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>">
        <p>Data Inicio</p>
        <input type="date" name="data"/>
        <p>Data Fim</p>
        <input type="date" name="data2"/>
        <p>Produto</p>
        <input type="text" name="produto" placeholder="digite o produto"/>
        <p>Loja</p>
        <input type="text" name="loja">
        <input type="submit" value="Processar"/>     
  </form>
    </div>
  </div>
  <div class="w3-row w3-padding-64">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-teal">Resultado</h1>
      <button id = "btn1">EXPORTAR EXCEL</button>
      <!-- Result da Query -->
      <div id="divTabela">
        <form>
              <table border=10>
                  <tr class="w3-grey">
                     <td>CPF</td>
                     <td>RECENCIA</td>
                     <td>MONETÁRIO</td>             
                     <td>QUANTIDADE</td>
                     <td>CODIGO_COMPLETO</td>
                     <td>DESCRICAO_COMPLETA</td>
                     <td>SEÇÃO</td>
                     <td>DESCRIÇÃO DA SEÇÃO</td>
                     <td>GRUPO</td>
                     <td>GRP_DESC</td>
                     <td>SUBGRUPO</td>
                     <td>SUBGR_DESC</td>
                  </tr>
                  <?php
                     foreach($produtos as $produto) {
                  ?>
                  <tr>
                      <td bgcolor=white><?php echo $produto['CPF']; ?></td>
                      <td bgcolor=white><?php echo $produto['RECENCIA']; ?></td>
                      <td bgcolor=white><?php echo $produto['MONETARIO']; ?></td>
                      <td bgcolor=white><?php echo $produto['QUANTIDADE']; ?></td>
                      <td bgcolor=white><?php echo $produto['CODIGO_COMPLETO']; ?></td>
                      <td bgcolor=white><?php echo $produto['DESCRICAO_COMPLETA']; ?></td>
                      <td bgcolor=white><?php echo $produto['SECAO']; ?></td>
                      <td bgcolor=white><?php echo $produto['SECAO_DESCRICAO']; ?></td>
                      <td bgcolor=white><?php echo $produto['GRUPO']; ?></td>
                      <td bgcolor=white><?php echo $produto['GRUPO_DESCRICAO']; ?></td>
                      <td bgcolor=white><?php echo $produto['SUBGRUPO']; ?></td>
                      <td bgcolor=white><?php echo $produto['SUBGRUPO_DESCRICAO']; ?></td>
                                             
                  </tr>
                  <?php
                     }
                  ?>
              </table>
          </form>
    </div>
    </div>   
  </div>
<script src= "JS\sidebar.js"> </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="JS\download.js"></script>
</body>
</html>

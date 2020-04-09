<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "aluno#2017";
    $banco = "teste";
    //Criar a conexao
    $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);

    if (mysqli_connect_errno()  ){
        die("Conexão Falhou: ". mysqli_connect_errno());
    }
    
  //OBSERVAR FORM
  // CRIAR PHP FILTRO
?>
<!doctype html>
<html>
    <head>
	<style>
	li { list-style:none;
			 margin-left:30px;
			 border:0
		    }
	    #header {
				width:800px;
				height:47px;
				margin:0 auto;
			}
		#rodape p {
			font-family: sans-serif;
			font-size: 11px;
			text-align: center
		}
		
#janelaPesquisa form input[type="text"] {
    width:380px;
    padding:9px;
    border:1px solid #CDC99B;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    float:left;
    cursor: pointer;
        }
	</style>
    </head>
<body> 
 <?php include_once("topo.php"); ?>
 <main>
             <div id="janelaPesquisa">
            <form method="GET" action="index_pesquisado.php">
            <input type="text" name="pesquisar" placeholder="PESQUISAR">
            <input type="image" name="pesquisar" src="botao_search.png">
            </form>
            </div>
 </main> 
	<?php
	$sql = mysqli_query($conecta, "SELECT * FROM produtos") or die(mysqli_error($conn) );
	
   while ($linha = mysqli_fetch_assoc($sql)){
	   ?>
	   
	   <li><?php echo $linha["nomeproduto"]?></li>
	   <li>Tempo de entrega : <?php echo $linha["tempoentrega"]?> dias</li>
	   <li>Preço unitário : R$<?php echo $linha["precovenda"]?></li>
	   <a href="detalhe.php?codigo=<?php echo $linha['produtoID'] ?>">
		<img src="<?php echo $linha["imagempequena"]?>">
       </a>		   
	  
   <?php
   }
   ?>
      <?php include_once("rodape.php"); ?>
    </body>

</html>
<?php 
include('../../conexao.php');
 ?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<style>

 @page {
            margin: 0px;

        }

 body{
 	font-family:Times, "Times New Roman", Georgia, serif;
 }

.footer {
    position:absolute;
    bottom:0;
    width:100%;
    background-color: #ebebeb;
    padding:10px;
}

.cabecalho {    
    background-color: #ebebeb;
    padding-top:15px;
    margin-bottom:30px;
}

.titulo{
	margin:0;
}

.areaTotais{
	border : 0.5px solid #bcbcbc;
	padding: 15px;
	border-radius: 5px;
	margin-right:25px;
}

.areaTotal{
	border : 0.5px solid #bcbcbc;
	padding: 15px;
	border-radius: 5px;
	margin-right:25px;
	background-color: #f9f9f9;
	margin-top:2px;
}

.pgto{
	margin:1px;
}



</style>


<div class="cabecalho">
	
	<div class="row">
			<div class="col-sm-4" style="margin-left:8px">	
			  <img src="<?php echo $url_sistema ?>img/logo-rel.jpg" width="250px">
			</div>
			<div class="col-sm-6" align="right">	
			 <span class="titulo"><b><big><?php echo mb_strtoupper($nome_empresa) ?></big></b></span><br>
			 <span class="titulo"><small><?php echo $endereco_empresa ?></small></span>
			</div>
		</div>

</div>
<div class="container">

		
			<div class="row">
				<div class="col-sm-12" align="center">	
				   <img src="<?php echo $url_sistema ?>img/rel-remedios.jpg" width="600px">
				</div>
				
				
			</div>

			
		
		<hr>

			

						
		<br><br>

		<?php

			$res = $pdo->query("SELECT * from remedios order by nome asc");
			$dados = $res->fetchAll(PDO::FETCH_ASSOC);



         ?>


		<table class="table">
			<tr bgcolor="#f9f9f9">
				<td style="font-size:12px"> <b>Remédio</b> </td>
				<td style="font-size:12px"> <b>Descrição</b> </td>
				<td style="font-size:12px"> <b> Quantidade</b> </td>
				
				
			</tr>
			

				 <?php 
		  for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$nome = $dados[$i]['nome'];
			$descricao = $dados[$i]['descricao'];
			$estoque = $dados[$i]['estoque']; 
                         
                 ?>

                <tr>
				<td style="font-size:12px"> <?php echo $nome; ?> </td>
				<td style="font-size:12px"> <?php echo $descricao; ?> </td>
				<td style="font-size:12px"> <?php echo $estoque; ?> </td>
				
				
				</tr>

			<?php }  ?>
		</table>

	


		<hr>
		

		<hr>

					
			

	
</div>


<div class="footer">
 <p style="font-size:12px" align="center"><?php echo $texto_rodape ?></p> 
</div>



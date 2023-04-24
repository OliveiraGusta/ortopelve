<?php 
$id = $_GET['id'];

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

.imagem {
width: 100%;
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


.nome-paciente {
position: absolute;
margin-top: 210px;
color:#5b5b5b;
font-size:15px;
margin-left: 160px;

}


.idade {
position: absolute;
margin-top: 206px;
color:#5b5b5b;
font-size:18px;
margin-left: 680px;

}

.endereco {
position: absolute;
margin-top: 233px;
color:#5b5b5b;
font-size:15px;
margin-left: 170px;

}


.itens {
position: absolute;
margin-top: 320px;
color:#5b5b5b;
font-size:16px;
margin-left: 50px;
width:100%;

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





<!--
<body>	

<?php



$res = $pdo->query("SELECT * from consultas where id = '$id'");



$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					//$dado = mysqli_fetch_array($result);
$row = count($dados);

for ($i=0; $i < count($dados); $i++) { 
	foreach ($dados[$i] as $key => $value) {
	}


	$paciente = $dados[$i]['paciente'];
	$medico = $dados[$i]['medico'];
	$data = $dados[$i]['data'];
	$atestado = $dados[$i]['atestado'];
	$hora = $dados[$i]['hora'];

	$data2 = implode('/', array_reverse(explode('-', $data)));



			//BUSCAR O NOME DO MEDICO
	$res_medico = $pdo->query("select * from medicos where id = '$medico'");
	$dados_medico = $res_medico->fetchAll(PDO::FETCH_ASSOC);
	$nome_medico = $dados_medico[0]['nome'];
	$crm = $dados_medico[0]['crm'];

			//BUSCAR O NOME DO PACIENTE
	$res_paciente = $pdo->query("select * from pacientes where id = '$paciente'");
	$dados_paciente = $res_paciente->fetchAll(PDO::FETCH_ASSOC);
	$nome_paciente = $dados_paciente[0]['nome'];
	$cpf_paciente = $dados_paciente[0]['cpf'];
	$idade = $dados_paciente[0]['idade'];
	$endereco = $dados_paciente[0]['endereco'];


} ?>


		


<div class="nome-paciente"> <?php echo $nome_paciente; ?></div>
<div class="endereco"> <?php echo $endereco; ?></div>
<div class="idade"> <?php echo $idade; ?></div>

<div class="itens">

		
		<?php 

		$res_presc = $pdo->query("SELECT * from receitas where id_consulta = '$id'");
		$dados_presc = $res_presc->fetchAll(PDO::FETCH_ASSOC);
					//$dado = mysqli_fetch_array($result);
		$row_presc = count($dados_presc);

		for ($i=0; $i < count($dados_presc); $i++) { 
			foreach ($dados_presc[$i] as $key => $value) {
			}

			
			$item = $dados_presc[$i]['item'];
			$remedio = $dados_presc[$i]['remedio'];
			?>
			

			
				 <?php echo $item; ?> ------------------------ <?php echo $remedio; ?> 



			<br>

		<?php }  ?>


</div>

<img class="imagem" src="<?php echo $url_sistema ?>img/receita-fundo.jpg">


</body> -->

<div class="container">

				
	<div class="col-md-12" align="center">
		
		<big><big> RECEITA  </big> </big> 
   

</div>


<hr>


</div>



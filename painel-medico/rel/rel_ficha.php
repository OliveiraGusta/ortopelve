<?php 


include('../../conexao.php');

$id = $_GET['id'];

?>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<style>
@page {
    margin: 0px;

}

body {
    font-family: Times, "Times New Roman", Georgia, serif;
}

.footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    background-color: #ebebeb;
    padding: 10px;
}

.cabecalho {
    background-color: #ebebeb;
    padding-top: 15px;
    margin-bottom: 30px;
}

.titulo {
    margin: 0;
}

.areaTotais {
    border: 0.5px solid #bcbcbc;
    padding: 15px;
    border-radius: 5px;
    margin-right: 25px;
}

.areaTotal {
    border: 0.5px solid #bcbcbc;
    padding: 15px;
    border-radius: 5px;
    margin-right: 25px;
    background-color: #f9f9f9;
    margin-top: 2px;
}

.pgto {
    margin: 1px;
}
</style>


<div class="cabecalho">

    <div class="row">
        <div class="col-sm-4" style="margin-left:8px">
            <img src="<?php echo $url_sistema ?>img/logo-rel.jpg" width="250px">
        </div>
        <div class="col-sm-6" align="right">
            <span class="titulo"><b><big><?php echo mb_strtoupper($nome_empresa) ?></big></b></span><br>
            <?php

			$res = $pdo->query("SELECT * from pacientes where id = '$id' order by nome asc");
			$dados = $res->fetchAll(PDO::FETCH_ASSOC);

			for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
				$medico_resp =  $dados[$i]['medico_resp'];
			}

		}

			$res = $pdo->query("SELECT * from medicos where nome = '$medico_resp' order by nome asc");
			$dados = $res->fetchAll(PDO::FETCH_ASSOC);

			for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
				$endereco_empresa =  $dados[$i]['endereco_medico'];
			}

		}

		?>

            <span class="titulo"><b><big>Profissional <?php echo $medico_resp ?></big></b></span><br>
            <span class="titulo"><small><?php echo $endereco_empresa?></small></span>
        </div>
    </div>

</div>

<div class="container">

    <?php

			$res = $pdo->query("SELECT * from pacientes where id = '$id' order by nome asc");
			$dados = $res->fetchAll(PDO::FETCH_ASSOC);

			for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}


			$nome =  $dados[$i]['nome'];
			$cpf =  $dados[$i]['cpf'];
			$telefone = $dados[$i]['telefone'];
			$rg =  $dados[$i]['rg'];
			$idade = $dados[$i]['idade'];
			$email =  $dados[$i]['email'];
			$data_nascimento = $dados[$i]['data_nasc'];
			$civil =  $dados[$i]['civil'];
			$sexo_nascimento =  $dados[$i]['sexo_nascimento'];

			$sexo_identifica =  $dados[$i]['sexo_identifica'];
			$identidade_genero =  $dados[$i]['identidade_genero'];
			$pronome_paciente =  $dados[$i]['pronome_paciente'];

			$endereco =  $dados[$i]['endereco'];
			$obs =  $dados[$i]['obs'];
			$peso = $dados[$i]['peso'];
			$altura =  $dados[$i]['altura'];
			$imc =  $dados[$i]['imc'];
			$tipo_cirurgia =  $dados[$i]['tipo_cirurgia'];
			$medico_old =  $dados[$i]['medico_old'];
			$medico_resp =  $dados[$i]['medico_resp'];

			//Historia Clinica
			$queixa_prin =  $dados[$i]['queixa_prin'];
			$antecedentes_pessoais = $dados[$i]['antecedentes_pessoais'];
			$antecedentes_cirurgicos = $dados[$i]['antecedentes_cirurgicos'];
			$antecedentes_familiares = $dados[$i]['antecedentes_familiares'];
			$medicacoes =  $dados[$i]['medicacoes'];
			$antecedentes_urologicos =  $dados[$i]['antecedentes_urologicos'];
			$queixas_urinarias =  $dados[$i]['queixas_urinarias'];
			$perdas_aos_esforcos = $dados[$i]['perdas_aos_esforcos'];
			$tipos_queixa_urina = $dados[$i]['tipos_queixa_urina'];

			$perdas_esforcos =  $dados[$i]['perdas_esforcos'];//*

			$circunstancias_das_perdas = $dados[$i]['circunstancias_das_perdas']; 
			$funcao_sexual =  $dados[$i]['funcao_sexual'];
			$SHIM =  $dados[$i]['SHIM'];

			$antecedentes_neurologicos = $dados[$i]['antecedentes_neurologicos'];
			$habitos_vida =  $dados[$i]['habitos_vida'];
			$uso_frequente =  $dados[$i]['uso_frequente'];
			$consumo_liquidos =  $dados[$i]['consumo_liquidos'];

			//Exame Físico
			$cicatrizes = $dados[$i]['cicatrizes'];
			$trofismo_genital = $dados[$i]['trofismo_genital'];
			$contracao_voluntaria =  $dados[$i]['contracao_voluntaria'];
			$musculos_acessorios = $dados[$i]['musculos_acessorios'];
			$tonus_do_corpo_perinea =  $dados[$i]['tonus_do_corpo_perinea'];
			$tonus_do_eae =  $dados[$i]['tonus_do_eae'];
			$tonus_de_mmii = $dados[$i]['tonus_de_mmii'];
			$forca_muscular =  $dados[$i]['forca_muscular'];
			$pontos_dolorosos =  $dados[$i]['pontos_dolorosos'];


			//INDICE INTERNACIONAL DE FUNÇÃO ERÉTIL
			$pergunta1_urologia = $dados[$i]['pergunta1_urologia'];
			$pergunta2_urologia =  $dados[$i]['pergunta2_urologia'];
			$pergunta3_urologia =  $dados[$i]['pergunta3_urologia'];
			$pergunta4_urologia =  $dados[$i]['pergunta4_urologia']; 
			$pergunta5_urologia =  $dados[$i]['pergunta5_urologia'];

		
            }             
                


         	?>


    <div class="row">
        <div class="col-sm-3">
            <?php 
						if($identidade_genero == 'Masculino'){
							echo '<img src="'.$url_sistema.'img/homem.jpg" width="150px">';
						}else{
							echo '<img src="'.$url_sistema.'img/mulher.jpg" width="150px">';
						}
					 ?>

        </div>


        <div class="col-sm-9">
            <big><big><?php echo strtoupper($nome) ?></big></big><br>
            <span class="dados">Telefone: <?php echo $telefone ?> &nbsp; &nbsp; Email: <?php echo $email ?> </span><br>
            <span class="dados">Endereço: <?php echo $endereco ?> </span><br>
            <span class="dados">CPF: <?php echo $cpf ?> &nbsp; &nbsp; RG: <?php echo $rg ?> </span><br>
            <span class="dados">Idade: <?php echo $idade ?> &nbsp; &nbsp; Sexo Nascimento:
                <?php echo $identidade_genero ?> &nbsp; &nbsp; Estado Cívil: <?php echo $civil ?> </span><br>
        </div>


    </div>


    <hr>


    <br><br>



   


    <hr>


    <hr>





</div>


<div class="footer">
    <p style="font-size:12px" align="center"><?php echo $texto_rodape ?></p>
</div>
<?php 
@session_start();
include('../../conexao.php');

date_default_timezone_set('America/Sao_Paulo');


//CARREGAR DOMPDF
require_once '../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$pdf = new DOMPDF($options);


$dataInicial = $_POST['dataInicialPost'];
$dataFinal = $_POST['dataFinalPost'];
$cpf_medico = $_POST['cpf_medicoPost'];
//$cpf_paciente_pdf = $_POST['cpf_paciente_pdfPost'];
$tipo = $_POST['tipo'];
$cpf_paciente = $_POST['cb-paciente-pdf'];



if ($dataInicial == ''){
	$agora = date('Y-m-d');
	//SUBTRAIR MENOS UM MES A DATA DO INICIO DA BUSCA
	$agora_format = explode('-', $agora);

	$dataInicial = $agora_format[0]."-".$mes_inicio_busca = str_pad($mes_inicio_busca = $agora_format[1] - 1 , 2 , '0' , STR_PAD_LEFT)."-".$agora_format[2]; 

}

if ($dataFinal == ''){
	$dataFinal = Date('Y-m-d');
	
}

if ($tipo == ''){
	$tipo = 'Todas';
}

if ($cpf_medico == ''){
		
	$email_usuario = $_SESSION['email_usuario'];
	//BUSCAR O CPF DO USUÁRIO LOGADO (NESSE CASO UM TESOUREIRO)
	$res_excluir = $pdo->query("select * from funcionarios where email = '$email_usuario'");
	$dados_excluir = $res_excluir->fetchAll(PDO::FETCH_ASSOC);
	$cpf_medico = $dados_excluir[0]['cpf'];

}

if($cpf_paciente == ""){
	$cpf_paciente = "todos";
}


//ALIMENTAR OS DADOS NO RELATÓRIO
$html = utf8_encode(file_get_contents($url_sistema."/painel-medico/rel/rel_mov.php?dataInicial=".$dataInicial."&dataFinal=".$dataFinal."&tipo=".$tipo."&cpf_medico=".$cpf_medico."&cpf_paciente=".$cpf_paciente));


//Definir o tamanho do papel e orientação da página
$pdf->set_paper('A4', 'portrait');

//CARREGAR O CONTEÚDO HTML
$pdf->load_html(utf8_decode($html));

//RENDERIZAR O PDF
$pdf->render();

//NOMEAR O PDF GERADO
$pdf->stream(
'relatorioMov.pdf',
array("Attachment" => false)
);



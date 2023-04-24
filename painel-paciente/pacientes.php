<?php
if (@$pag == 'externa') {
    $pagina_ajax = '../painel-atend/pacientes';
} else {
    $pagina_ajax = 'pacientes';
}

$pagina = 'pacientes';


$nome_paciente = $_SESSION['nome_usuario'];
$id_medico= $_SESSION['id_medico'];
$nome_medico = $_SESSION['medico_resp'];
 
?>

<h3>Seja Bem-vindo(a) <?php echo   $nome_paciente ?></h3>
</span>
<span class="text-muted">Aqui você encontra sua ficha com informações preenchidas por <?php echo  $nome_medico ?>.</span><br>

<br>
<div class="row botao-novo">
    <div class="col-md-2">
        <a id="btn-novo" data-toggle="modal" data-target="#modal"></a> 
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 col-sm-12">
        <div class="float-left">
            <form method="post">
                <select onChange="submit();" class="form-control-sm" id="exampleFormControlSelect1" name="itens-pagina">

                    <?php

                    if (isset($_POST['itens-pagina'])) {
                        $item_paginado = $_POST['itens-pagina'];
                    } elseif (isset($_GET['itens'])) {
                        $item_paginado = $_GET['itens'];
                    }

                    ?>

                    <option value="<?php echo @$item_paginado ?>"><?php echo @$item_paginado ?> Registros</option>

                    <?php if (@$item_paginado != $opcao1) { ?>
                        <option value="<?php echo $opcao1 ?>"><?php echo $opcao1 ?> Registros</option>
                    <?php } ?>

                    <?php if (@$item_paginado != $opcao2) { ?>
                        <option value="<?php echo $opcao2 ?>"><?php echo $opcao2 ?> Registros</option>
                    <?php } ?>

                    <?php if (@$item_paginado != $opcao3) { ?>
                        <option value="<?php echo $opcao3 ?>"><?php echo $opcao3 ?> Registros</option>
                    <?php } ?>

                </select>
            </form>
        </div>

    </div>


    <?php

    //DEFINIR O NUMERO DE ITENS POR PÁGINA
    if (isset($_POST['itens-pagina'])) {
        $itens_por_pagina = $_POST['itens-pagina'];
        @$_GET['pagina'] = 0;
    } elseif (isset($_GET['itens'])) {
        $itens_por_pagina = $_GET['itens'];
    } else {
        $itens_por_pagina = $opcao1;

    }

    ?>


    <div class="col-md-6 col-sm-12">

        <div class="float-right mr-4">
            <form id="frm" class="form-inline my-2 my-lg-0" method="post">

                <input type="hidden" id="pag" name="pag" value="<?php echo @$_GET['pagina'] ?>">

                <input type="hidden" id="itens" name="itens" value="<?php echo @$itens_por_pagina; ?>">

                <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome ou CPF"
                    aria-label="Search" name="txtbuscar" id="txtbuscar">
                <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i
                        class="fas fa-search"></i></button>
            </form>
        </div>

    </div>


</div>
<div id="listar">
</div>


<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <?php if (@$_GET['funcao'] == 'editar') {

                        $nome_botao = 'Editar';
                        $id_reg = $_GET['id'];
                        $res = $pdo->query("select * from pacientes where id = '$id_reg'");
                        $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                        $nome = $dados[0]['nome'];
                        $cpf = $dados[0]['cpf'];
                        $rg = $dados[0]['rg'];
                        $telefone = $dados[0]['telefone'];
                        $email = $dados[0]['email'];
                        $data = $dados[0]['data_nasc'];
                        $idade = $dados[0]['idade'];
                        $civil = $dados[0]['civil'];

                        $sexo_identifica = $dados[0]['sexo_identifica'];
                        $identidade_genero = $dados[0]['identidade_genero'];
                        $pronome_paciente = $dados[0]['pronome_paciente'];

                        $endereco = $dados[0]['endereco'];
                        $peso = $dados[0]['peso'];
                        $altura = $dados[0]['altura'];
                        $tipo_cirurgia = $dados[0]['tipo_cirurgia'];
                        $medico_old = $dados[0]['medico_old'];
                        $obs = $dados[0]['obs'];


                        echo 'Minha Ficha';
                    } else {
                        $nome_botao = 'Salvar';
                        echo 'Anamnese';
                    } ?>
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="modal-header">

                    <h5> Identificação do Paciente</h5>
                    <div>. </div>
                </div>
                <br>
                <form method="post">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" id="id" name="id" value="<?php echo @$id_reg ?>" readonly="true"  required>
                                <input type="hidden" id="campo_antigo" name="campo_antigo" value="<?php echo @$cpf ?>"
                                    readonly="true"  required>
                                <input type="hidden" id="medico_resp" name="medico_resp"
                                    value="<?php echo $medico_resp ?>" readonly="true"  required>


                                <label for="exampleFormControlInput1">Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Insira o Nome "
                                    name="nome" value="<?php echo @$nome ?>"  readonly="true"  required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">CPF</label>
                                <input type="text" class="form-control" id="cpf" placeholder="Insira o CPF " name="cpf"
                                    value="<?php echo @$cpf ?>" readonly="true"  required>
                            </div>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">RG</label>
                                <input type="text" class="form-control" id="rg" placeholder="Insira o RG " name="rg"
                                    value="<?php echo @$rg ?>" readonly="true"  required>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Telefone</label>
                                <input type="text" class="form-control" id="telefone" placeholder="Insira o Telefone "
                                    name="telefone" value="<?php echo @$telefone ?>" readonly="true"  required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" class="form-control" id="telefone" placeholder="Insira o Email "
                                    name="email" value="<?php echo @$email ?>" readonly="true"  required>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Estado Civil</label>
                            <select class="form-control" id="" name="civil">

                                <?php
                                if (@$_GET['funcao'] == 'editar') {
                                    echo '<option value="' . $civil . '">' . $civil . '</option>';
                                }
                                ?>


                            </select>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Data Nascimento</label>
                                <input type="date" class="form-control" id="data" name="data"
                                    value="<?php echo @$data ?>" readonly="true"  required>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Qual sexo foi designado ao nascimento?</label>
                            <select class="form-control" id="" name="sexo_nascimento">

                                <?php
                                if (@$_GET['funcao'] == 'editar') {
                                    echo '<option  value="' . $sexo_nascimento . '">' . $sexo_nascimento . '</option>';
                                }
                                ?>
                                

                            </select>

                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Você se identifica como?</label>
                            <input type="text" class="form-control" id="sexo_identifica"
                                placeholder="Hetero, Gay, Bissexual etc..." name="sexo_identifica"
                                value="<?php echo @$sexo_identifica ?>" readonly="true"  required>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Qual sua identidade de Genero atual?</label>
                            <input type="text" class="form-control" id="identidade_genero"
                                placeholder="Masculino, feminino. homem trans etc..." name="identidade_genero"
                                value="<?php echo @$identidade_genero ?>" readonly="true"  required>
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Qual pronome você prefere?</label>
                            <input type="text" class="form-control" id="pronome_paciente"
                                placeholder="Ele/dele, Ela/ela, Elu/delu etc..." name="pronome_paciente"
                                value="<?php echo @$pronome_paciente ?>" readonly="true"  required>
                        </div>


                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlInput1">Endereço</label>
                        <input type="text" class="form-control" id="endereco" placeholder="Insira o Endereço "
                            name="endereco" value="<?php echo @$endereco ?>" readonly="true"  required>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Peso (KG)</label>
                                <input type="text" class="form-control" id="peso" placeholder="Insira o Peso"
                                    name="peso" value="<?php echo @$peso ?>" readonly="true"  required>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Altura (cm)</label>
                                <input type="text" class="form-control" id="telefone" placeholder="Insira a Altura"
                                    name="altura" value="<?php echo @$altura ?>" readonly="true"  required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">IMC</label>
                                <select class="form-control" id="" name="imc">

                                    <?php
                                    if (@$_GET['funcao'] == 'editar') {
                                        echo '<option value="' . $imc . '">' . $imc . '</option>';
                                    }
                                    ?>
                                   
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Diagnostico de Origem</label>
                        <textarea class="form-control" id="obs" name="obs"
                            maxlength="350" readonly="true" ><?php echo @$obs ?></textarea>
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tipo de cirurgia </label>
                                <input type="text" class="form-control" id="tipo_cirurgia"
                                    placeholder="Tipo de cirurgia" name="tipo_cirurgia"
                                    value="<?php echo @$tipo_cirurgia ?>" readonly="true"  required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Encaminhado </label>
                                <input type="text" class="form-control" id="medico_old" placeholder="Encaminhado por"
                                    name="medico_old" value="<?php echo @$medico_old ?>" readonly="true"  required>
                            </div>
                        </div>


                    </div>
                    <!--BOTOES PARA ESCOLHER ESPECIALIDADE -->
                    <div class="modal-header">
                        <h5>Especialidade</h5>

                        <p>
                            <button class="btn btn-secondary" type="button" data-toggle="collapse"
                                data-target="#collapseUROLOGIA" aria-expanded="false" aria-controls="collapseExample">
                                UROLOGIA
                            </button>
                            <button class="btn btn-secondary" type="button" data-toggle="collapse"
                                data-target="#collapsePROCTOLOGIA" aria-expanded="false"
                                aria-controls="collapseExample">
                                PROCTOLOGIA
                            </button>
                            <button class="btn btn-secondary" type="button" data-toggle="collapse"
                                data-target="#collapseUROGINECOLOGIA" aria-expanded="false"
                                aria-controls="collapseExample">
                                UROGINECOLOGIA
                            </button>
                           <!-- <button class="btn btn-secondary" type="button" data-toggle="collapse"
                                data-target="#collapseORTOPEDIA" aria-expanded="false" aria-controls="collapseExample">
                                ORTOPEDIA
                            </button>-->
                        </p>
                    </div>

                    <!-- UROLOGIA -->
                    <?php if (@$_GET['funcao'] == 'editar') {

                        //BUSCAR DADOS DO REGISTRO A SER EDITADO
                        $res = $pdo->query("select * from pacientes where id = '$id_reg'");
                        $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                        $queixa_prin = $dados[0]['queixa_prin'];
                        $antecedentes_pessoais = $dados[0]['antecedentes_pessoais'];
                        $antecedentes_cirurgicos = $dados[0]['antecedentes_cirurgicos'];
                        $antecedentes_familiares = $dados[0]['antecedentes_familiares'];
                        $medicacoes = $dados[0]['medicacoes'];
                        $antecedentes_urologicos = $dados[0]['antecedentes_urologicos'];
                        $queixas_urinarias = $dados[0]['queixas_urinarias'];
                        $perdas_aos_esforcos = $dados[0]['perdas_aos_esforcos'];
                        $tipos_queixa_urina = $dados[0]['tipos_queixa_urina'];

                        $perdas_esforcos = $dados[0]['perdas_esforcos'];

                        $circunstancias_das_perdas = $dados[0]['circunstancias_das_perdas'];
                        $uso_de_protecao = $dados[0]['uso_de_protecao'];

                        $funcao_sexual = $dados[0]['funcao_sexual'];
                        $SHIM = $dados[0]['SHIM'];

                        $antecedentes_neurologicos = $dados[0]['antecedentes_neurologicos'];
                        $habitos_vida = $dados[0]['habitos_vida'];
                        $uso_frequente = $dados[0]['uso_frequente'];
                        $consumo_liquidos = $dados[0]['consumo_liquidos'];

                        $cicatrizes = $dados[0]['cicatrizes'];
                        $trofismo_genital = $dados[0]['trofismo_genital'];
                        $trofismo_mmii = $dados[0]['trofismo_mmii'];
                        $contracao_voluntaria = $dados[0]['contracao_voluntaria'];
                        $musculos_acessorios = $dados[0]['musculos_acessorios'];
                        $tonus_do_corpo_perinea = $dados[0]['tonus_do_corpo_perinea'];
                        $tonus_do_eae = $dados[0]['tonus_do_eae'];
                        $tonus_de_mmii = $dados[0]['tonus_de_mmii'];
                        $forca_muscular = $dados[0]['forca_muscular'];
                        $sensibilidade = $dados[0]['sensibilidade'];
                    
                        $corpo_perineal_urologia = $dados[0]['corpo_perineal_urologia'];
                        $tonus_do_eae_urologia = $dados[0]['tonus_do_eae_urologia'];
                        $puborretal_urologia = $dados[0]['puborretal_urologia'];
                        $mmii_urologia = $dados[0]['mmii_urologia'];
                        $fibrose_urologia = $dados[0]['fibrose_urologia'];
                        $afa_urologia = $dados[0]['afa_urologia'];
                        $perfect_urologia = $dados[0]['perfect_urologia'];
                        $elasticidade_urologia = $dados[0]['elasticidade_urologia'];
                        $coordenacao_urologia = $dados[0]['coordenacao_urologia'];
                        $relaxamento_do_pr_a_manobra_de_evacuacao_urologia = $dados[0]['relaxamento_do_pr_a_manobra_de_evacuacao_urologia'];
                        $pontos_dolorosos = $dados[0]['pontos_dolorosos'];


                        $pergunta1_urologia = $dados[0]['pergunta1_urologia'];
                        $pergunta2_urologia = $dados[0]['pergunta2_urologia'];
                        $pergunta3_urologia = $dados[0]['pergunta3_urologia'];
                        $pergunta4_urologia = $dados[0]['pergunta4_urologia'];
                        $pergunta5_urologia = $dados[0]['pergunta5_urologia'];

                    } ?>



                    <div class="collapse" id="collapseUROLOGIA">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5>Urologia</h5>
                                <h3>História Clínica</h3>
                            </div>
                            <br>


                            <div class="form-group">
                                <label for="exampleFormControlInput1">Queixa principal/duração</label>
                                <input type="text" class="form-control" id="queixa_prin"
                                    placeholder="Queixa principal/duração" name="queixa_prin"
                                    value="<?php echo @$queixa_prin ?>" readonly="true"  required>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlInput1">Antecedentes Patológicos</label>
                                <input type="text" class="form-control" id="antecedentes_pessoais"
                                    placeholder="Antecedentes Pessoais patológicos " name="antecedentes_pessoais"
                                    value="<?php echo @$antecedentes_pessoais ?>" readonly="true"  required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Antecedentes cirúrgicos</label>
                                        <input type="text" class="form-control" id="antecedentes_cirurgicos"
                                            placeholder="Antecedentes cirúrgicos" name="antecedentes_cirurgicos"
                                            value="<?php echo @$antecedentes_cirurgicos ?>" readonly="true"  required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Antecedentes familiares</label>
                                        <input type="text" class="form-control" id="antecedentes_familiares"
                                            placeholder="Antecedentes familiares" name="antecedentes_familiares"
                                            value="<?php echo @$antecedentes_familiares ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Medicações em uso</label>
                                <textarea class="form-control" id="medicacoes" name="medicacoes"
                                    maxlength="350"><?php echo @$medicacoes ?></textarea>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Antecedentes Urológicos:</label>
                                <input type="text" class="form-control" id="antecedentes_urologicos"
                                    placeholder="antecedentes Urológicos" name="antecedentes_urologicos"
                                    value="<?php echo @$antecedentes_urologicos ?>" readonly="true"  required>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Queixas urinárias atuais:
                                        </label>
                                        <select class="form-control" id="" name="queixas_urinarias">

                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $queixas_urinarias . '">' . $queixas_urinarias . '</option>';
                                            }
                                            ?>
                                           </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Perdas aos esforços:
                                        </label>
                                        <select class="form-control" id="" name="perdas_aos_esforcos">

                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $perdas_aos_esforcos . '">' . $perdas_aos_esforcos . '</option>';
                                            }
                                            ?>  
                                          
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tipo:</label>
                                        <select class="form-control" id="" name="tipos_queixa_urina">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tipos_queixa_urina . '">' . $tipos_queixa_urina . '</option>';
                                            }
                                            ?>
                                             </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Característica das perdas aos
                                            esforços:</label>
                                        <select class="form-control" id="" name="perdas_esforcos">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $perdas_esforcos . '">' . $perdas_esforcos . '</option>';
                                            }
                                            ?>
                                            </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlInput1">Circunstâncias das perdas:
                                </label>
                                <textarea  readonly="true" class="form-control" id="circunstancias_das_perdas"
                                    name="circunstancias_das_perdas"
                                    maxlength="350"><?php echo @$circunstancias_das_perdas; ?></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Uso de proteções: </label>
                                        <select class="form-control" id="" name="uso_de_protecao">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $uso_de_protecao . '">' . $uso_de_protecao . '</option>';
                                            }
                                            ?>
                                             </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Função sexual:</label>
                                        <input type="text" class="form-control" id="Funcao_sexual"
                                            placeholder="Função sexual" name="funcao_sexual"
                                            value="<?php echo @$funcao_sexual ?>" readonly="true"  required>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sexual Health Inventory for Men – SHIM
                                        </label>
                                        <select class="form-control" id="" name="SHIM">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $SHIM . '">' . $SHIM . '</option>';
                                            }
                                            ?>
                                           </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Restrição do consumo de líquidos?
                                        </label>
                                        <select class="form-control" id="" name="consumo_liquidos">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $consumo_liquidos . '">' . $consumo_liquidos . '</option>';
                                            }
                                            ?>
                                          </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Hábitos de vida</label>
                                        <input type="text" class="form-control" id="habitos_vida"
                                            placeholder="Ex: Tabagismo, registrição dietética ..." name="habitos_vida"
                                            value="<?php echo @$habitos_vida ?>" readonly="true"  required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Uso frequente de</label>
                                        <input type="text" class="form-control" id="uso_frequente"
                                            placeholder="Ex: Café, Chá preto, chocolate ..." name="uso_frequente"
                                            value="<?php echo @$uso_frequente ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-header">
                                <h5> Exame Físico</h5>
                                <br>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Cicatrizes</label>
                                        <input type="text" class="form-control" id="cicatrizes" placeholder="Cicatrizes"
                                            name="cicatrizes" value="<?php echo @$cicatrizes ?>" readonly="true"  required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Trofismo Genital</label>
                                        <input type="text" class="form-control" id="trofismo_genital"
                                            placeholder="Trofismo Genital" name="trofismo_genital"
                                            value="<?php echo @$trofismo_genital ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Trofismo MMII</label>
                                        <input type="text" class="form-control" id="trofismo_mmii"
                                            placeholder="Trofismo MMII" name="trofismo_mmii"
                                            value="<?php echo @$trofismo_mmii ?>" readonly="true"  required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Contração voluntaria de dos MAP</label>
                                        <select class="form-control" id="contracao_voluntaria"
                                            name="contracao_voluntaria">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $contracao_voluntaria . '">' . $contracao_voluntaria . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Uso de músculos acessórios</label>
                                        <select class="form-control" id="musculos_acessorios"
                                            name="musculos_acessorios">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $musculos_acessorios . '">' . $musculos_acessorios . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tônus do corpo perinea</label>
                                        <select class="form-control" id="tonus_do_corpo_perinea"
                                            name="tonus_do_corpo_perinea">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tonus_do_corpo_perinea . '">' . $tonus_do_corpo_perinea . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tônus do EAE</label>
                                        <select class="form-control" id="tonus_do_eae" name="tonus_do_eae">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tonus_do_eae . '">' . $tonus_do_eae . '</option>';
                                            }
                                            ?>
                                         
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tônus de MMII</label>
                                        <select class="form-control" id="tonus_de_mmii" name="tonus_de_mmii">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tonus_de_mmii . '">' . $tonus_de_mmii . '</option>';
                                            }
                                            ?>
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Força muscular (Oxford)</label>
                                        <input type="text" class="form-control" id="forca_muscular"
                                            placeholder="Força muscular (Oxford)" name="forca_muscular"
                                            value="<?php echo @$forca_muscular ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sensibilidade</label>
                                        <input type="text" class="form-control" id="sensibilidade"
                                            placeholder="Sensibilidade" name="sensibilidade"
                                            value="<?php echo @$sensibilidade ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-header">
                                <h5> Palpação</h5>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Corpo perineal</label>
                                        <select class="form-control" id="corpo_perineal_urologia"
                                            name="corpo_perineal_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $corpo_perineal_urologia . '">' . $corpo_perineal_urologia . '</option>';
                                            }
                                            ?>
                                  
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tônus do EAE</label>
                                        <select class="form-control" id="tonus_do_eae_urologia" name="tonus_do_eae_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tonus_do_eae_urologia . '">' . $tonus_do_eae_urologia . '</option>';
                                            }
                                            ?>
                                            

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Puborretal</label>
                                        <select class="form-control" id="puborretal_urologia" name="puborretal_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $puborretal_urologia . '">' . $puborretal_urologia . '</option>';
                                            }
                                            ?>
                                        

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">MMII</label>
                                        <select class="form-control" id="mmii_urologia " name="mmii_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $mmii_urologia . '">' . $mmii_urologia . '</option>';
                                            }
                                            ?>
                                           
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Fibrose</label>
                                        <input type="text" class="form-control" id="fibrose_urologia" placeholder="Fibrose"
                                            name="fibrose_urologia" value="<?php echo @$fibrose_urologia ?>" readonly="true" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Força muscular (AFA)</label>
                                        <input type="text" class="form-control" id="afa_urologia"
                                            placeholder="Força muscular (AFA)" name="afa_urologia"
                                            value="<?php echo @$afa_urologia ?>" readonly="true" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"><i>P E R F E C T</i></label>
                                        <input type="text" class="form-control" id="perfect_urologia" placeholder="P.E.R.F.E.C.T"
                                            name="perfect_urologia" value="<?php echo @$perfect_urologia ?>" readonly="true" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Elasticidade</label>
                                        <input type="text" class="form-control" id="elasticidade_urologia"
                                            placeholder="Elasticidade" name="elasticidade_urologia"
                                            value="<?php echo @$elasticidade_urologia ?>" readonly="true" required>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Coordenação</label>
                                        <select class="form-control" id="coordenacao_urologia" name="coordenacao_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $coordenacao_urologia . '">' . $coordenacao_urologia . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Relaxamento do PR à manobra de evacuação</label>
                                        <select class="form-control" id="relaxamento_do_pr_a_manobra_de_evacuacao_urologia "
                                            name="relaxamento_do_pr_a_manobra_de_evacuacao_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $relaxamento_do_pr_a_manobra_de_evacuacao_urologia . '">' . $relaxamento_do_pr_a_manobra_de_evacuacao_urologia . '</option>';
                                            }
                                            ?>
                                       
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pontos dolorosos</label>
                                <input type="text" class="form-control" id="pontos_dolorosos"
                                    placeholder="Pontos dolorosos" name="pontos_dolorosos"
                                    value="<?php echo @$pontos_dolorosos ?>" readonly="true" required>
                            </div>
                      


                                            

                            <div class="modal-header">
                                <h5>INDICE INTERNACIONAL DE FUNÇÃO ERÉTIL -5</h5>
                                <br>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">1. Como você classifica sua confiança em
                                            manter uma ereção?</label>
                                        <select class="form-control" id="pergunta1_urologia" name="pergunta1_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $pergunta1_urologia . '">' . $pergunta1_urologia . '</option>';
                                            }
                                            ?>
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">2. Quando você tem ereções com estímulo
                                            sexual, com que freqüência suasereções atingem a rigidez para penetração
                                            (penetrar sua parceira)?</label>
                                        <select class="form-control" id="pergunta2_urologia" name="pergunta2_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $pergunta2_urologia . '">' . $pergunta2_urologia . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">3. Durante a relação sexual, com que
                                            freqüência você conseguiu manter sua ereção após ter penetrado sua parceira?
                                        </label>
                                        <select class="form-control" id="pergunta3_urologia" name="pergunta3_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $pergunta3_urologia . '">' . $pergunta3_urologia . '</option>';
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">4. Durante a relação sexual, qual o nível
                                            de dificuldade para manter sua ereção até o final da relação sexual?
                                        </label>
                                        <select class="form-control" id="pergunta4_urologia" name="pergunta4_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $pergunta4_urologia . '">' . $pergunta4_urologia . '</option>';
                                            }
                                            ?>
                                        
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">5. Quando você teve a relação sexual, com
                                            que freqüência ela foi satisfatória para você?
                                        </label>
                                        <select class="form-control" id="pergunta5_urologia" name="pergunta5_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $pergunta5_urologia . '">' . $pergunta5_urologia . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIM UROLOGIA -->


                    <!--PROCTOLOGIA -->
                    <div class="collapse" id="collapsePROCTOLOGIA">

                        <div class="modal-body">
                            <div class="form-group">
                                <div class="modal-header">
                                    <h5>Proctologia</h5>
                                    <h3>História Clínica</h3>
                                </div>
                                <br>
                                <?php if (@$_GET['funcao'] == 'editar') {


                                    $res = $pdo->query("select * from ficha_proctologia where fkcpf = '$cpf'");
                                    $dados_proc = $res->fetchAll(PDO::FETCH_ASSOC);

                                    $queixa_prin_proc = $dados_proc[0]['queixa_prin_proc'];
                                    $antecedentes_pessoais_proc = $dados_proc[0]['antecedentes_pessoais_proc'];
                                    $antecedentes_cirurgicos_proc = $dados_proc[0]['antecedentes_cirurgicos_proc'];
                                    $antecedentes_familiares_proc = $dados_proc[0]['antecedentes_familiares_proc'];
                                    $historia_proctologica = $dados_proc[0]['historia_proctologica'];
                                    $tempo_sintomas = $dados_proc[0]['tempo_sintomas'];
                                    $tempo_ajuda = $dados_proc[0]['tempo_ajuda'];
                                    $sintomas_estado = $dados_proc[0]['sintomas_estado'];
                                    $perdas_proc = $dados_proc[0]['perdas_proc'];
                                    $frequencia_dos_acidentes = $dados_proc[0]['frequencia_dos_acidentes'];
                                    $quantidade_da_perda = $dados_proc[0]['quantidade_da_perda'];
                                    $protecoes_proc = $dados_proc[0]['protecoes_proc'];
                                    $frequencia_evacuatoria = $dados_proc[0]['frequencia_evacuatoria'];
                                    $manobra_evacuar = $dados_proc[0]['manobra_evacuar'];
                                    $medicacoes_em_uso_proc = $dados_proc[0]['medicacoes_em_uso_proc'];
                                    $partos_proc = $dados_proc[0]['partos_proc'];

                                    $complicacoes_puerperais_proc = $dados_proc[0]['complicacoes_puerperais_proc'];
                                    $cirurgias_ginecologicas_proc = $dados_proc[0]['cirurgias_ginecologicas_proc'];
                                    $antecedentes_urologicos_proc = $dados_proc[0]['antecedentes_urologicos_proc'];
                                    $habitos_vida_proc = $dados_proc[0]['habitos_vida_proc'];
                                    $uso_frequente_proc = $dados_proc[0]['uso_frequente_proc'];
                                    $restricao_do_consumo_de_liquidos_proc = $dados_proc[0]['restricao_do_consumo_de_liquidos_proc'];
                                    $renda_familiar = $dados_proc[0]['renda_familiar'];

                                    $cicatrizes_proc = $dados_proc[0]['cicatrizes_proc'];
                                    $trofismo_perianal = $dados_proc[0]['trofismo_perianal'];
                                    $trofismo_mmii_proc = $dados_proc[0]['trofismo_mmii_proc'];
                                    $contracao_voluntaria_proc = $dados_proc[0]['contracao_voluntaria_proc'];
                                    $abertura_vulvo_vaginal_proc = $dados_proc[0]['abertura_vulvo_vaginal_proc'];
                                    $abertura_anal_proc = $dados_proc[0]['abertura_anal_proc'];
                                    $apneia_proc = $dados_proc[0]['apneia_proc'];
                                    $contracao_do_eae = $dados_proc[0]['contracao_do_eae'];
                                    $corpo_perineal_proc = $dados_proc[0]['corpo_perineal_proc'];
                                    $tonus_do_eae_proc = $dados_proc[0]['tonus_do_eae_proc'];
                                    $puborretal_proc = $dados_proc[0]['puborretal_proc'];
                                    $mmii_proc = $dados_proc[0]['mmii_proc'];
                                    $fibrose_proc = $dados_proc[0]['fibrose_proc'];
                                    $afa_proc = $dados_proc[0]['afa_proc'];
                                    $perfect_proc = $dados_proc[0]['perfect_proc'];
                                    $elasticidade_proc = $dados_proc[0]['elasticidade_proc'];
                                    $coordenacao_proc = $dados_proc[0]['coordenacao_proc'];
                                    $relaxamento_do_pr_a_manobra_de_evacuacao_proc = $dados_proc[0]['relaxamento_do_pr_a_manobra_de_evacuacao_proc'];
                                    $pontos_dolorosos_proc = $dados_proc[0]['pontos_dolorosos_proc'];

                                    $teste_de_esforco_proc = $dados_proc[0]['teste_de_esforco_proc'];
                                    $reflexo_clitoriano_bulbocavernoso_proc = $dados_proc[0]['reflexo_clitoriano_bulbocavernoso_proc'];
                                    $reflexo_ceigel_cremasterico = $dados_proc[0]['reflexo_ceigel_cremasterico'];
                                    $marcha_proc = $dados_proc[0]['marcha_proc'];
                                    $outros_dados_proc = $dados_proc[0]['outros_dados_proc'];


                                }

                                ?>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Queixa principal/duração</label>
                                    <input type="text" class="form-control" id="queixa_prin_proc"
                                        placeholder="Queixa principal/duração" name="queixa_prin_proc"
                                        value="<?php echo @$queixa_prin_proc ?>" readonly="true"  required>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Antecedentes Patológicos</label>
                                    <input type="text" class="form-control" id="antecedentes_pessoais_proc"
                                        placeholder="Antecedentes Pessoais patológicos "
                                        name="antecedentes_pessoais_proc"
                                        value="<?php echo @$antecedentes_pessoais_proc ?>" readonly="true"  required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Antecedentes cirúrgicos</label>
                                            <input type="text" class="form-control" id="antecedentes_cirurgicos_proc"
                                                placeholder="Antecedentes cirúrgicos"
                                                name="antecedentes_cirurgicos_proc"
                                                value="<?php echo @$antecedentes_cirurgicos_proc ?>" readonly="true"  required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Antecedentes familiares</label>
                                            <input type="text" class="form-control" id="antecedentes_familiares_proc"
                                                placeholder="Antecedentes familiares"
                                                name="antecedentes_familiares_proc"
                                                value="<?php echo @$antecedentes_familiares_proc ?>" readonly="true"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">História proctológica</label>
                                <input type="text" class="form-control" id="historia_proctologica"
                                    placeholder="História proctológica" name="historia_proctologica"
                                    value="<?php echo @$historia_proctologica ?>" readonly="true"  required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quanto tempo iniciou os sintomas?</label>
                                <input type="text" class="form-control" id="tempo_sintomas"
                                    placeholder="Quanto tempo iniciou os sintomas?" name="tempo_sintomas"
                                    value="<?php echo @$tempo_sintomas ?>" readonly="true"  required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quanto tempo demorou para procurar ajuda
                                    médica?</label>
                                <input type="text" class="form-control" id="tempo_ajuda_medica"
                                    placeholder="Quanto tempo demorou para procurar ajuda médica?"
                                    name="tempo_ajuda_medica" value="<?php echo @$tempo_ajuda ?>" readonly="true"  required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Desde que começaram os sintomas o seu
                                            estado
                                        </label>
                                        <select class="form-control" id="" name="sintomas_estado">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $sintomas_estado . '">' . $sintomas_estado . '</option>';
                                            }
                                            ?>
                                           
                                        </select>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Perdas </label>
                                            <input type="text" class="form-control" id="perdas_proc"
                                                placeholder="Perdas: tosse, agachar , espirro e etc.."
                                                name="perdas_proc" value="<?php echo @$perdas_proc ?>" readonly="true"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Freqüência dos acidentes </label>
                                    <input type="text" class="form-control" id="frequencia_dos_acidentes"
                                        placeholder="Freqüência dos acidentes" name="frequencia_dos_acidentes"
                                        value="<?php echo @$frequencia_dos_acidentes ?>" readonly="true"  required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Quantidade da perda </label>
                                    <input type="text" class="form-control" id="quantidade_da_perda"
                                        placeholder="Quantidade da perda" name="quantidade_da_perda"
                                        value="<?php echo @$quantidade_da_perda ?>" readonly="true"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Proteções </label>
                                    <input type="text" class="form-control" id="protecoes_proc" placeholder="Proteções"
                                        name="protecoes_proc" value="<?php echo @$protecoes_proc ?>" readonly="true"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Freqüência evacuatória </label>
                                    <input type="text" class="form-control" id="frequencia_evacuatoria"
                                        placeholder="Freqüência evacuatória" name="frequencia_evacuatoria"
                                        value="<?php echo @$frequencia_evacuatoria ?>" readonly="true"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Necessita de alguma manobra especial para
                                        evacuar? </label>
                                    <input type="text" class="form-control" id="manobra_evacuar"
                                        placeholder="Necessita de alguma manobra especial para evacuar? "
                                        name="manobra_evacuar" value="<?php echo @$manobra_evacuar ?>" readonly="true"  required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Medicações em uso</label>
                                    <input type="text" class="form-control" id="medicacoes_em_uso_proc"
                                        placeholder="Medicações em uso" name="medicacoes_em_uso_proc"
                                        value="<?php echo @$medicacoes_em_uso_proc ?>" readonly="true"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Partos</label>
                                    <input type="text" class="form-control" id="partos_proc"
                                        placeholder="Qauntos vaginais,cesareana e outros..." name="partos_proc"
                                        value="<?php echo @$partos_proc ?>" readonly="true"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Complicações puerperais</label>
                                    <input type="text" class="form-control" id="complicacoes_puerperais_proc"
                                        placeholder="iInfecção, incontinência,DIP,deiscência"
                                        name="complicacoes_puerperais_proc"
                                        value="<?php echo @$complicacoes_puerperais_proc ?>" readonly="true"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Cirurgias ginecológicas</label>
                                    <input type="text" class="form-control" id="cirurgias_ginecologicas_proc"
                                        placeholder="Sim? Quantas? Não?" name="cirurgias_ginecologicas_proc"
                                        value="<?php echo @$cirurgias_ginecologicas_proc ?>" readonly="true"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Antecedentes Urológicos</label>
                                    <input type="text" class="form-control" id="antecedentes_urologicos_proc"
                                        placeholder="ITU, HPB, CA, próstata,LUTS, Incontinência, outros (especificar)"
                                        name="antecedentes_urologicos_proc"
                                        value="<?php echo @$antecedentes_urologicos_proc ?>" readonly="true"  required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Hábitos de vida</label>
                                        <input type="text" class="form-control" id="habitos_vida_proc"
                                            placeholder="Ex: Tabagismo, registrição dietética ..."
                                            name="habitos_vida_proc" value="<?php echo @$habitos_vida_proc ?>" readonly="true"  required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Uso frequente de</label>
                                        <input type="text" class="form-control" id="uso_frequente_proc"
                                            placeholder="Ex: Café, Chá preto, chocolate ..." name="uso_frequente_proc"
                                            value="<?php echo @$uso_frequente_proc ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Restrição do consumo de líquidos?</label>

                                        <select class="form-control" id="" name="restricao_do_consumo_de_liquidos_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $restricao_do_consumo_de_liquidos_proc . '">' . $restricao_do_consumo_de_liquidos_proc . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Renda familiar</label>
                                        <input type="text" class="form-control" id="renda_familiar"
                                            placeholder="X salários mínimos" name="renda_familiar"
                                            value="<?php echo @$renda_familiar ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-header">
                                <h5> Exame Físico</h5>
                                <br>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Cicatrizes</label>
                                        <input type="text" class="form-control" id="cicatrizes_proc"
                                            placeholder="Cicatrizes " name="cicatrizes_proc"
                                            value="<?php echo @$cicatrizes_proc ?>" readonly="true"  required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Trofismo perianal</label>
                                        <input type="text" class="form-control" id="trofismo_perianal"
                                            placeholder="Trofismo perianal" name="trofismo_perianal"
                                            value="<?php echo @$trofismo_perianal ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Trofismo MMII</label>
                                        <input type="text" class="form-control" id="trofismo_mmii_proc"
                                            placeholder="Trofismo MMII" name="trofismo_mmii_proc"
                                            value="<?php echo @$trofismo_mmii_proc ?>" readonly="true"  required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Contração voluntaria de dos MAP</label>
                                        <select class="form-control" id="contracao_voluntaria_proc"
                                            name="contracao_voluntaria_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $contracao_voluntaria_proc . '">' . $contracao_voluntaria_proc . '</option>';
                                            }
                                            ?>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Abertura vulvo-vaginal </label>
                                        <select class="form-control" id="abertura_vulvo_vaginal_proc"
                                            name="abertura_vulvo_vaginal_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $abertura_vulvo_vaginal_proc . '">' . $abertura_vulvo_vaginal_proc . '</option>';
                                            }
                                            ?>
                                           </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Abertura anal</label>
                                        <select class="form-control" id="abertura_anal_proc" name="abertura_anal_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $abertura_anal_proc . '">' . $abertura_anal_proc . '</option>';
                                            }
                                            ?>
                                           </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Apnéia</label>
                                        <select class="form-control" id="apneia_proc" name="apneia_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $apneia_proc . '">' . $apneia_proc . '</option>';
                                            }
                                            ?>
                                           
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Contração do EAE</label>
                                        <select class="form-control" id="contracao_do_eae" name="contracao_do_eae">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $contracao_do_eae . '">' . $contracao_do_eae . '</option>';
                                            }
                                            ?>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-header">
                                <h5> Palpação</h5>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Corpo perineal</label>
                                        <select class="form-control" id="corpo_perineal_proc"
                                            name="corpo_perineal_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $corpo_perineal_proc . '">' . $corpo_perineal_proc . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tônus do EAE</label>
                                        <select class="form-control" id="tonus_do_eae_proc " name="tonus_do_eae_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tonus_do_eae_proc . '">' . $tonus_do_eae_proc . '</option>';
                                            }
                                            ?>
                                           
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Puborretal</label>
                                        <select class="form-control" id="puborretal_proc" name="puborretal_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $puborretal_proc . '">' . $puborretal_proc . '</option>';
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">MMII</label>
                                        <select class="form-control" id="mmii_proc " name="mmii_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $mmii_proc . '">' . $mmii_proc . '</option>';
                                            }
                                            ?>
                                           
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Fibrose</label>
                                        <input type="text" class="form-control" id="fibrose_proc" placeholder="Fibrose"
                                            name="fibrose_proc" value="<?php echo @$fibrose_proc ?>" readonly="true"  required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Força muscular (AFA)</label>
                                        <input type="text" class="form-control" id="afa_proc"
                                            placeholder="Força muscular (AFA)" name="afa_proc"
                                            value="<?php echo @$afa_proc ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"><i>P E R F E C T</i></label>
                                        <input type="text" class="form-control" id="perfect_proc" placeholder="P.E.R.F.E.C.T"
                                            name="perfect_proc" value="<?php echo @$perfect_proc ?>" readonly="true" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Elasticidade</label>
                                        <input type="text" class="form-control" id="elasticidade_proc"
                                            placeholder="Elasticidade" name="elasticidade_proc"
                                            value="<?php echo @$elasticidade_proc ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Coordenação</label>
                                        <select class="form-control" id="coordenacao_proc" name="coordenacao_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $coordenacao_proc . '">' . $coordenacao_proc . '</option>';
                                            }
                                            ?>
                                           
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Relaxamento do PR à manobra de
                                            evacuação</label>
                                        <select class="form-control" id="relaxamento_do_pr_a_manobra_de_evacuacao_proc "
                                            name="relaxamento_do_pr_a_manobra_de_evacuacao_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $relaxamento_do_pr_a_manobra_de_evacuacao_proc . '">' . $relaxamento_do_pr_a_manobra_de_evacuacao_proc . '</option>';
                                            }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pontos dolorosos</label>
                                <input type="text" class="form-control" id="pontos_dolorosos_proc"
                                    placeholder="Pontos dolorosos" name="pontos_dolorosos_proc"
                                    value="<?php echo @$pontos_dolorosos_proc ?>" readonly="true"  required>
                            </div>
                        </div>

                        <div class="modal-header">
                            <h5> Diagnósticos</h5>
                            <br>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Teste de esforço</label>
                            <select class="form-control" id="teste_de_esforco_proc" name="teste_de_esforco_proc">
                                <?php
                                if (@$_GET['funcao'] == 'editar') {
                                    echo '<option value="' . $teste_de_esforco_proc . '">' . $teste_de_esforco_proc . '</option>';
                                }
                                ?>
                           
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Reflexo Clitoriano/Reflexo bulbocavernoso
                                        (S2-S4)</label>
                                    <input type="text" class="form-control" id="reflexo_clitoriano_bulbocavernoso_proc"
                                        placeholder="Reflexo Clitoriano/Reflexo bulbocavernoso (S2-S4)"
                                        name="reflexo_clitoriano_bulbocavernoso_proc"
                                        value="<?php echo @$reflexo_clitoriano_bulbocavernoso_proc ?>" readonly="true"  required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Reflexo Geigel/ Cremastérico (L1-L2)</label>
                                    <input type="text" class="form-control" id="reflexo_ceigel_cremasterico"
                                        placeholder="Reflexo Geigel/ Cremastérico (L1-L2)"
                                        name="reflexo_ceigel_cremasterico"
                                        value="<?php echo @$reflexo_ceigel_cremasterico ?>" readonly="true"  required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Marcha</label>
                            <input type="text" class="form-control" id="marcha_proc" placeholder="Marcha"
                                name="marcha_proc" value="<?php echo @$marcha_proc ?>" readonly="true"  required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Outros dados relevantes</label>
                            <textarea readonly="true" class="form-control" id="outros_dados_proc" name="outros_dados_proc"
                                maxlength="350" readonly="true"  ><?php echo @$outros_dados_proc; ?></textarea>
                        </div>

                    </div>
                    <!-- FIM PROCTOLOGIA -->


                    <!-- UROGINECOLOGIA -->
                    <div class="collapse" id="collapseUROGINECOLOGIA">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5>Uroginecologia</h5>
                                 <!-- UROLOGIA -->
                    <?php if (@$_GET['funcao'] == 'editar') {

                        //BUSCAR DADOS DO REGISTRO A SER LISTADO
                        $res = $pdo->query("select * from ficha_uroginecologia where fkcpf = '$cpf'");
                        $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                        $queixa_prin_urogine = $dados[0]['queixa_prin_urogine'];
                        $antecedentes_pessoais_urogine = $dados[0]['antecedentes_pessoais_urogine'];
                        $antecedentes_cirurgicos_urogine = $dados[0]['antecedentes_cirurgicos_urogine'];
                        $antecedentes_familiares_urogine = $dados[0]['antecedentes_familiares_urogine'];

                        $fase_de_enchimento_urogine = $dados[0]['fase_de_enchimento_urogine'];
                        $fase_de_esvaziamento_urogine = $dados[0]['fase_de_esvaziamento_urogine'];
                        $outros_fase_de_esvaziamento_urogine = $dados[0]['outros_fase_de_esvaziamento_urogine'];
                        $sensibilidade_fase_de_esvaziamento_urogine = $dados[0]['sensibilidade_fase_de_esvaziamento_urogine'];
                        $itu_fase_de_esvaziamento_urogine = $dados[0]['itu_fase_de_esvaziamento_urogine'];
                        $perdas_urogine = $dados[0]['perdas_urogine'];
                        $outras_circunstancias_perdas_urogine = $dados[0]['outras_circunstancias_perdas_urogine'];
                        $perdas_durante_o_esforco_urogine = $dados[0]['perdas_durante_o_esforco_urogine'];
                        $outras_perdas_durante_o_esforco_urogine = $dados[0]['outras_perdas_durante_o_esforco_urogine'];
                        $qualidade_da_perda_urinariao_urogine = $dados[0]['qualidade_da_perda_urinariao_urogine'];
                        $quanto_tempo_iniciou_os_sintomas_urogine = $dados[0]['quanto_tempo_iniciou_os_sintomas_urogine'];
                        $quanto_tempo_demorou_para_procurar_ajuda_medica_urogine = $dados[0]['quanto_tempo_demorou_para_procurar_ajuda_medica_urogine'];
                        $desde_que_comecaram_os_sintomas_o_seu_estado_urogine = $dados[0]['desde_que_comecaram_os_sintomas_o_seu_estado_urogine'];
                        $frequencia_urinaria_urogine = $dados[0]['frequencia_urinaria_urogine'];
                        $protecoes_urogine = $dados[0]['protecoes_urogine'];
                        $numero_de_trocas_urogine = $dados[0]['numero_de_trocas_urogine'];

                        $corpo_perineal_uroginecologia = $dados[0]['corpo_perineal_uroginecologia'];
                        $tonus_do_eae_uroginecologia = $dados[0]['tonus_do_eae_uroginecologia'];
                        $puborretal_uroginecologia = $dados[0]['puborretal_uroginecologia'];
                        $mmii_uroginecologia = $dados[0]['mmii_uroginecologia'];
                        $fibrose_uroginecologia = $dados[0]['fibrose_uroginecologia'];
                        $afa_uroginecologia = $dados[0]['afa_uroginecologia'];
                        $perfect_uroginecologia = $dados[0]['perfect_uroginecologia'];
                        $elasticidade_uroginecologia = $dados[0]['elasticidade_uroginecologia'];
                        $coordenacao_uroginecologia = $dados[0]['coordenacao_uroginecologia'];
                        $relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia = $dados[0]['relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia'];
                        $pontos_dolorosos_uroginecologia = $dados[0]['pontos_dolorosos_uroginecologia'];

                        
                        //Obstétrica

                        $gestacoes_uroginecologia = $dados[0]['gestacoes_uroginecologia'];
                        $partos_uroginecologia = $dados[0]['partos_uroginecologia'];
                        $abortos_uroginecologia = $dados[0]['abortos_uroginecologia'];

                        $parto1_uroginecologia = $dados[0]['parto1_uroginecologia'];
                        $idade_materna1_uroginecologia = $dados[0]['idade_materna1_uroginecologia'];
                        $peso_da_crianca1_uroginecologia = $dados[0]['peso_da_crianca1_uroginecologia'];
                        
                        $parto2_uroginecologia = $dados[0]['parto2_uroginecologia'];
                        $idade_materna2_uroginecologia = $dados[0]['idade_materna2_uroginecologia'];
                        $peso_da_crianca2_uroginecologia = $dados[0]['peso_da_crianca2_uroginecologia'];

                        $parto3_uroginecologia = $dados[0]['parto3_uroginecologia'];
                        $idade_materna3_uroginecologia = $dados[0]['idade_materna3_uroginecologia'];
                        $peso_da_crianca3_uroginecologia = $dados[0]['peso_da_crianca3_uroginecologia'];

                        $realizou_episiotomia_uroginecologia = $dados[0]['realizou_episiotomia_uroginecologia'];
                        $forceps_uroginecologia = $dados[0]['forceps_uroginecologia'];
                        $complicacoes_obstetricas_uroginecologia = $dados[0]['complicacoes_obstetricas_uroginecologia'];
                        
                        //Ginecológia
                        $data_da_ultima_menstruacao_uroginecologia = $dados[0]['data_da_ultima_menstruacao_uroginecologia'];       
                        $menopausa_uroginecologia = $dados[0]['menopausa_uroginecologia'];
                        $metodo_anticoncepcional_uroginecologia = $dados[0]['metodo_anticoncepcional_uroginecologia'];
                        $terapia_de_reposicao_hormonal_uroginecologia = $dados[0]['terapia_de_reposicao_hormonal_uroginecologia'];
                        $complicacoes_ginecologicas_uroginecologia = $dados[0]['complicacoes_ginecologicas_uroginecologia'];
                        $realizou_cirurgia_ginecologica_uroginecologia = $dados[0]['realizou_cirurgia_ginecologica_uroginecologia'];
                        
                        //Sexualidade                    
                        $auto_conhecimento_vaginal_uroginecologia = $dados[0]['auto_conhecimento_vaginal_uroginecologia'];
                        $vida_sexual_uroginecologia = $dados[0]['vida_sexual_uroginecologia'];
                        $perdeu_a_virgindade_uroginecologia = $dados[0]['perdeu_a_virgindade_uroginecologia'];
                        $com_quem_perdeu_a_virgindade_uroginecologia = $dados[0]['com_quem_perdeu_a_virgindade_uroginecologia'];
                        $experiencia_a_virgindade_uroginecologia = $dados[0]['experiencia_a_virgindade_uroginecologia'];
                        $abuso_sexual_uroginecologia = $dados[0]['abuso_sexual_uroginecologia'];
                        $permissao_abuso_sexual_uroginecologia = $dados[0]['permissao_abuso_sexual_uroginecologia'];
                        $relato_abuso_sexual_uroginecologia = $dados[0]['relato_abuso_sexual_uroginecologia'];

                    } ?>


                                <h3>História Clínica</h3>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Queixa principal/duração</label>
                                <input type="text" class="form-control" id="queixa_prin_urogine"
                                    placeholder="Queixa principal/duração" name="queixa_prin_urogine"
                                    value="<?php echo @$queixa_prin_urogine ?>" readonly="true"  required>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlInput1">Antecedentes Patológicos</label>
                                <input type="text" class="form-control" id="antecedentes_pessoais_urogine"
                                    placeholder="Antecedentes Pessoais patológicos "
                                    name="antecedentes_pessoais_urogine"
                                    value="<?php echo @$antecedentes_pessoais_urogine ?>" readonly="true"  required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Antecedentes cirúrgicos</label>
                                        <input type="text" class="form-control" id="antecedentes_cirurgicos_urogine"
                                            placeholder="Antecedentes cirúrgicos" name="antecedentes_cirurgicos_urogine"
                                            value="<?php echo @$antecedentes_cirurgicos_urogine ?>" readonly="true"  required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Antecedentes familiares</label>
                                        <input type="text" class="form-control" id="antecedentes_familiares_urogine"
                                            placeholder="Antecedentes familiares" name="antecedentes_familiares_urogine"
                                            value="<?php echo @$antecedentes_familiares_urogine ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">
                                <div class="modal-header">
                                    <h5>Sintomas urinários
                                       
                                    </h5>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Fase de enchimento
                                        </label>
                                        <select class="form-control" id="" name="fase_de_enchimento_urogine">

                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $fase_de_enchimento_urogine . '">' . $fase_de_enchimento_urogine . '</option>';
                                            }
                                            ?>
                                         
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Fase de esvaziamento
                                        </label>
                                        <select class="form-control" id="" name="fase_de_esvaziamento_urogine">

                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $fase_de_esvaziamento_urogine . '">' . $fase_de_esvaziamento_urogine . '</option>';
                                            }
                                            ?>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Outros</label>
                                        <input type="text" class="form-control" id="outros_fase_de_esvaziamento_urogine"
                                            placeholder="Outros" name="outros_fase_de_esvaziamento_urogine"
                                            value="<?php echo @$outros_fase_de_esvaziamento_urogine ?>" readonly="true"  required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sensibilidade</label>
                                        <input type="text" class="form-control"
                                            id="sensibilidade_fase_de_esvaziamento_urogine" placeholder="Sensibilidade"
                                            name="sensibilidade_fase_de_esvaziamento_urogine"
                                            value="<?php echo @$sensibilidade_fase_de_esvaziamento_urogine ?>" readonly="true"  required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ITU</label>
                                        <input type="text" class="form-control" id="itu_fase_de_esvaziamento_urogine"
                                            placeholder="ITU" name="itu_fase_de_esvaziamento_urogine"
                                            value="<?php echo @$itu_fase_de_esvaziamento_urogine ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Perdas
                                        </label>
                                        <select class="form-control" id="" name="perdas_urogine">

                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $perdas_urogine . '">' . $perdas_urogine . '</option>';
                                            }
                                            ?>
                                         
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Outras circunstâncias</label>
                                        <input type="text" class="form-control"
                                            id="outras_circunstancias_perdas_urogine"
                                            placeholder="Outras circunstâncias"
                                            name="outras_circunstancias_perdas_urogine"
                                            value="<?php echo @$outras_circunstancias_perdas_urogine ?>" readonly="true"  required>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Perdas durante o esforço
                                        </label>
                                        <select class="form-control" id="" name="perdas_durante_o_esforco_urogine">

                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $perdas_durante_o_esforco_urogine . '">' . $perdas_durante_o_esforco_urogine . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Outros</label>
                                        <input type="text" class="form-control"
                                            id="outras_perdas_durante_o_esforco_urogine" placeholder="Outros"
                                            name="outras_perdas_durante_o_esforco_urogine"
                                            value="<?php echo @$outras_perdas_durante_o_esforco_urogine ?>" readonly="true"  required>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Qualidade da perda urinária</label>
                                <input type="text" class="form-control" id="qualidade_da_perda_urinariao_urogine"
                                    placeholder="Qualidade da perda urinária"
                                    name="qualidade_da_perda_urinariao_urogine"
                                    value="<?php echo @$qualidade_da_perda_urinariao_urogine ?>" readonly="true"  required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Quanto tempo iniciou os sintomas?</label>
                                        <input type="text" class="form-control"
                                            id="quanto_tempo_iniciou_os_sintomas_urogine"
                                            placeholder="Quanto tempo iniciou os sintomas?"
                                            name="quanto_tempo_iniciou_os_sintomas_urogine"
                                            value="<?php echo @$quanto_tempo_iniciou_os_sintomas_urogine ?>" readonly="true"  required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Quanto tempo demorou para procurar
                                            ajuda?</label>
                                        <input type="text" class="form-control"
                                            id="quanto_tempo_demorou_para_procurar_ajuda_medica_urogine"
                                            placeholder="Ajuda médica?"
                                            name="quanto_tempo_demorou_para_procurar_ajuda_medica_urogine"
                                            value="<?php echo @$quanto_tempo_demorou_para_procurar_ajuda_medica_urogine ?>"
                                            readonly="true"  required>
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Desde que começaram os sintomas o seu
                                            estado
                                        </label>
                                        <select class="form-control" id=""
                                            name="desde_que_comecaram_os_sintomas_o_seu_estado_urogine">

                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $desde_que_comecaram_os_sintomas_o_seu_estado_urogine . '">' . $desde_que_comecaram_os_sintomas_o_seu_estado_urogine . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Freqüência urinária?</label>
                                        <input type="text" class="form-control" id="frequencia_urinaria_urogine"
                                            placeholder="Freqüência urinária?" name="frequencia_urinaria_urogine"
                                            value="<?php echo @$frequencia_urinaria_urogine ?>"
                                            readonly="true"  required>
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Proteções
                                        </label>
                                        <select class="form-control" id="" name="protecoes_urogine">

                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $protecoes_urogine . '">' . $protecoes_urogine . '</option>';
                                            }
                                            ?>
                                           
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Número de trocas/dia</label>
                                        <input type="text" class="form-control" id="numero_de_trocas_urogine"
                                            placeholder="Número de trocas/dia" name="numero_de_trocas_urogine"
                                            value="<?php echo @$numero_de_trocas_urogine ?>" readonly="true"  required>
                                    </div>

                                </div>
                            </div>

                            <!-- Função Intestinal -->

                            <div class="modal-header">
                                <h5> Palpação</h5>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Corpo perineal</label>
                                        <select class="form-control" id="corpo_perineal_uroginecologia"
                                            name="corpo_perineal_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $corpo_perineal_uroginecologia . '">' . $corpo_perineal_uroginecologia . '</option>';
                                            }
                                            ?>
                                

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tônus do EAE</label>
                                        <select class="form-control" id="tonus_do_eae_uroginecologia" name="tonus_do_eae_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tonus_do_eae_uroginecologia . '">' . $tonus_do_eae_uroginecologia . '</option>';
                                            }
                                            ?>
                                          
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Puborretal</label>
                                        <select class="form-control" id="puborretal_uroginecologia" name="puborretal_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $puborretal_uroginecologia . '">' . $puborretal_uroginecologia . '</option>';
                                            }
                                            ?>
                                            

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">MMII</label>
                                        <select class="form-control" id="mmii_uroginecologia " name="mmii_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $mmii_uroginecologia . '">' . $mmii_uroginecologia . '</option>';
                                            }
                                            ?>
                                          

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Fibrose</label>
                                        <input type="text" class="form-control" id="fibrose_uroginecologia" placeholder="Fibrose"
                                            name="fibrose_uroginecologia" value="<?php echo @$fibrose_uroginecologia ?>" readonly="true"  required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Força muscular (AFA)</label>
                                        <input type="text" class="form-control" id="afa_uroginecologia"
                                            placeholder="Força muscular (AFA)" name="afa_uroginecologia"
                                            value="<?php echo @$afa_uroginecologia ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"><i>P E R F E C T</i></label>
                                        <input type="text" class="form-control" id="perfect_uroginecologia" placeholder="P.E.R.F.E.C.T"
                                            name="perfect_uroginecologia" value="<?php echo @$perfect_uroginecologia ?>" readonly="true"  required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Elasticidade</label>
                                        <input type="text" class="form-control" id="elasticidade_uroginecologia"
                                            placeholder="Elasticidade" name="elasticidade_uroginecologia"
                                            value="<?php echo @$elasticidade_uroginecologia ?>" readonly="true"  required>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Coordenação</label>
                                        <select class="form-control" id="coordenacao_uroginecologia" name="coordenacao_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $coordenacao_uroginecologia . '">' . $coordenacao_uroginecologia . '</option>';
                                            }
                                            ?>
                                          

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Relaxamento do PR à manobra de evacuação</label>
                                        <select class="form-control" id="relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia "
                                            name="relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia . '">' . $relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia . '</option>';
                                            }
                                            ?>
                                           

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pontos dolorosos</label>
                                <input type="text" class="form-control" id="pontos_dolorosos_uroginecologia"
                                    placeholder="Pontos dolorosos" name="pontos_dolorosos_uroginecologia"
                                    value="<?php echo @$pontos_dolorosos_uroginecologia ?>" readonly="true"  required>
                            </div>


                            <div class="modal-header">
                                <h5> História Ginecológia</h5>
                                <br>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Data da última menstruação (DUM)</label>
                                        <input type="date" class="form-control"
                                            id="data_da_ultima_menstruacao_uroginecologia"
                                            name="data_da_ultima_menstruacao_uroginecologia"
                                            value="<?php echo @$data_da_ultima_menstruacao_uroginecologia ?>" readonly="true" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Menopausa?</label>
                                        <input type="date" class="form-control" id="menopausa_uroginecologia"
                                            name="menopausa_uroginecologia"
                                            value="<?php echo @$menopausa_uroginecologia ?>" readonly="true"  required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Método anticoncepcional?</label>
                                        <input type="text" class="form-control"
                                            id="metodo_anticoncepcional_uroginecologia"
                                            name="metodo_anticoncepcional_uroginecologia"
                                            placeholder="Sim ou Não? Qual?"
                                            value="<?php echo @$metodo_anticoncepcional_uroginecologia ?>" readonly="true"  required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Terapia de reposição hormonal?</label>
                                        <input type="text" class="form-control"
                                            id="terapia_de_reposicao_hormonal_uroginecologia"
                                            name="terapia_de_reposicao_hormonal_uroginecologia"
                                            placeholder="Sim ou Não? Qual?"
                                            value="<?php echo @$terapia_de_reposicao_hormonal_uroginecologia ?>" readonly="true" 
                                            required>
                                    </div>
                                </div>

                            </div>



                            <div class="form-group">
                                <label for="exampleFormControlInput1">Complicações ginecológicas</label>
                                <input type="text" class="form-control" id="complicacoes_ginecologicas_uroginecologia"
                                    name="complicacoes_ginecologicas_uroginecologia"
                                    placeholder="Dor pélvica crônica, cistos, corrimento e etc."
                                    value="<?php echo @$complicacoes_ginecologicas_uroginecologia ?>" readonly="true"  required>
                            </div>



                            <div class="form-group">
                                <label for="exampleFormControlInput1">Realizou cirurgia ginecológica?</label>
                                <input type="text" class="form-control"
                                    id="realizou_cirurgia_ginecologica_uroginecologia"
                                    name="realizou_cirurgia_ginecologica_uroginecologia" placeholder="Sim ou Não? Qual?"
                                    value="<?php echo @$realizou_cirurgia_ginecologica_uroginecologia ?>" readonly="true"  required>
                            </div>

                            <div class="modal-header">
                                <h5>Sexualidade</h5>
                                <br>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Auto conhecimento vaginal?</label>


                                        <select class="form-control" id="auto_conhecimento_vaginal_uroginecologia "
                                            name="auto_conhecimento_vaginal_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $auto_conhecimento_vaginal_uroginecologia . '">' . $auto_conhecimento_vaginal_uroginecologia . '</option>';
                                            }
                                            ?>
                                           

                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Vida sexual</label>
                                        <input type="text" class="form-control" id="vida_sexual_uroginecologia"
                                            name="vida_sexual_uroginecologia"
                                            placeholder="Ativa ou Inativa? Diga a Frequência?"
                                            value="<?php echo @$vida_sexual_uroginecologia ?>" readonly="true" required>
                                    </div>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Perdeu a virgindade quando?</label>

                                        <input type="text" class="form-control" id="perdeu_a_virgindade_uroginecologia"
                                            name="perdeu_a_virgindade_uroginecologia"
                                            placeholder="Perdeu a virgindade quando?"
                                            value="<?php echo @$perdeu_a_virgindade_uroginecologia ?>" readonly="true"  required>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Com quem?</label>
                                        <input type="text" class="form-control"
                                            id="com_quem_perdeu_a_virgindade_uroginecologia"
                                            name="com_quem_perdeu_a_virgindade_uroginecologia" placeholder="Com quem? "
                                            value="<?php echo @$com_quem_perdeu_a_virgindade_uroginecologia ?>" readonly="true" 
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Como foi essa experiência?</label>

                                <textarea class="form-control" id="experiencia_a_virgindade_uroginecologia"
                                    name="experiencia_a_virgindade_uroginecologia"
                                    maxlength="300" readonly="true"  disabled><?php echo @$experiencia_a_virgindade_uroginecologia ?></textarea>
                            </div>



                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Você já sofreu algum abuso sexual?</label>


                                        <select class="form-control" id="abuso_sexual_uroginecologia "
                                            name="abuso_sexual_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $abuso_sexual_uroginecologia . '">' . $abuso_sexual_uroginecologia . '</option>';
                                            }
                                            ?>
                                          
                                          

                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Poderia relatar como foi?</label>
                                        <select class="form-control" id="permissao_abuso_sexual_uroginecologia "
                                            name="permissao_abuso_sexual_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $permissao_abuso_sexual_uroginecologia . '">' . $permissao_abuso_sexual_uroginecologia . '</option>';
                                            }
                                            ?>
                                           
                                           

                                        </select>

                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Relato</label>

                                <textarea class="form-control" id="relato_abuso_sexual_uroginecologia"
                                    name="relato_abuso_sexual_uroginecologia"
                                    maxlength="300" disabled readonly="true" ><?php echo @$relato_abuso_sexual_uroginecologia ?></textarea>
                            </div>


                        </div>

                        <!-- FIM UROGINECOLOGIA -->


                        <div id="mensagem" class="">
                        </div>
                    </div>



                    <div class="collapse" id="collapseORTOPEDIA">
                    <div class="modal-body">
                            <div class="modal-header">
                                <h5>ORTOPEDIA</h5>
                                <h3>História Clínica</h3>
                            </div>
                            <br>
                          
                        </div>                                
                    </div>                                
                    </div>                                
                                
                    <div class="modal-footer">
                        <button id="btn-fechar" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Fechar</button>

                      
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!--CHAMADA DA MODAL NOVO -->
    <?php
    if (@$_GET['funcao'] == 'novo' && @$item_paginado == '') {

        ?>
        <script>
        $('#btn-novo').click();
        </script>
    <?php } ?>


    <!--CHAMADA DA MODAL EDITAR -->
    <?php
    if (@$_GET['funcao'] == 'editar' && @$item_paginado == '') {

        ?>
        <script>
        $('#btn-novo').click();
        </script>
    <?php } ?>










    <!--AJAX PARA BUSCAR OS DADOS -->
    <script type="text/javascript">
    $(document).ready(function() {

        var pag = "<?= $pagina_ajax ?>";
        $('#btn-buscar').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/listar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "html",
                success: function(result) {
                    $('#listar').html(result)

                },


            })

        })


    })
    </script>




    <!--AJAX PARA LISTAR OS DADOS -->
    <script type="text/javascript">
    $(document).ready(function() {

        var pag = "<?= $pagina_ajax ?>";

        $.ajax({
            url: pag + "/listar.php",
            method: "post",
            data: $('#frm').serialize(),
            dataType: "html",
            success: function(result) {
                $('#listar').html(result)

            },


        })
    })
    </script>





    <!--AJAX PARA EDIÇÃO DOS DADOS -->
    <script type="text/javascript">
    $(document).ready(function() {
        var pag = "<?= $pagina_ajax ?>";
        $('#Editar').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: pag + "/editar.php",
                method: "post",
                data: $('form').serialize(),
                dataType: "text",
                success: function(mensagem) {

                    $('#mensagem').removeClass()

                    if (mensagem == 'Editado com Sucesso!!') {

                        $('#mensagem').addClass('mensagem-sucesso')


                        $('#txtbuscar').val('')
                        $('#btn-buscar').click();
                        $('#btn-fechar').click();




                    } else {

                        $('#mensagem').addClass('mensagem-erro');
                        $('#btn-buscar').click();
                        $('#btn-fechar').click();

                    }

                    $('#mensagem').text(mensagem);
                    $('#btn-buscar').click();
                    $('#btn-fechar').click();


                },

            })
        })
    })
    </script>



    



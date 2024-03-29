<?php
if (@$pag == 'externa') {
    $pagina_ajax = '../painel-atend/pacientes';
} else {
    $pagina_ajax = 'pacientes';
}

require_once("../conexao.php");
$pagina = 'pacientes';
$medico_resp = $_SESSION['nome_usuario'];


?>



<h4>Cadastrar Pacientes</h4>
<span class="text-muted">Aqui você cadastra todos os seus pacientes.</span><br>

<br>
<div class="row botao-novo">
    <div class="col-md-2">
        <a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
        <a href="index.php?acao=<?php echo $pagina ?>&funcao=novo" type="button" class="btn btn-secondary">Novo
            Paciente</a>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 col-sm-12">
        <div class="float-left">

        </div>

    </div>


    <?php /* 

//DEFINIR O NUMERO DE ITENS POR PÁGINA
if (isset($_POST['itens-pagina'])) {
   $itens_por_pagina = $_POST['itens-pagina'];
   @$_GET['pagina'] = 0;
} elseif (isset($_GET['itens'])) {
   $itens_por_pagina = $_GET['itens'];
} else {
   $itens_por_pagina = $opcao1;

}

*/ ?>


    <div class="col-md-6 col-sm-12">

        <div class="float-right mr-4">
            <form id="frm" class="form-inline my-2 my-lg-0" method="post">

                <input type="hidden" id="pag" name="pag" value="<?php echo @$_GET['pagina'] ?>">

                <!-- <input type="hidden" id="itens" name="itens" value="<?php echo @$itens_por_pagina; ?>">-->

                <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome ou CPF" aria-label="Search" name="txtbuscar" id="txtbuscar">
                <button style="display:none" class="btn btn-outline-secondary btn-sm my-2 my-sm-0" name="btn-buscar" id="btn-buscar"><i class="fas fa-search"></i></button>
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

                        $id_reg = openssl_decrypt($_GET['id'], "BF-CBC", $senhaEncrypt);
                        //$id_reg = $_GET['id'];
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


                        echo 'Edição de Paciente';
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

                    <h5>Identificação do Paciente.</h5>

                </div>
                <br>
                <form method="post">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" id="id" name="id" value="<?php echo @$id_reg ?>" required>
                                <input type="hidden" id="campo_antigo" name="campo_antigo" value="<?php echo @$cpf ?>" required>
                                <input type="hidden" id="medico_resp" name="medico_resp" value="<?php echo $medico_resp ?>" required>


                                <label for="exampleFormControlInput1">Nome<?php if (!isset($nome)) {
                                                                                echo '<span class="text-danger"> *</span>';
                                                                            }; ?></label>

                                <input type="text" class="form-control" id="nome" placeholder="Insira o Nome (Campo Obrigatório)" name="nome" value="<?php echo @$nome ?>" <?php if (isset($nome)) {
                                                                                                                                                                                echo "disabled";
                                                                                                                                                                            }; ?>>
                                <?php if (!isset($nome)) {
                                    echo '<span class="text-danger"> Esse campo não poderá ser editado</span>';
                                }; ?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">CPF<?php if (!isset($cpf)) {
                                                                                echo '<span class="text-danger"> *</span>';
                                                                            }; ?></label>

                                <input type="text" class="form-control" id="cpf" placeholder="Insira o CPF (Campo Obrigatório)" name="cpf" value="<?php echo @$cpf ?>" <?php if (isset($cpf)) {
                                                                                                                                                                            echo "disabled";
                                                                                                                                                                        }; ?>>
                                <?php if (!isset($cpf)) {
                                    echo '<span class="text-danger"> Esse campo não poderá ser editado</span>';
                                }; ?>
                            </div>

                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">RG</label>
                                <input type="text" class="form-control" id="rg" placeholder="Insira o RG " name="rg" value="<?php echo @$rg ?>" required>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Telefone</label>
                                <input type="text" class="form-control" id="telefone" placeholder="Insira o Telefone " name="telefone" value="<?php echo @$telefone ?>" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" class="form-control" id="telefone" placeholder="Insira o Email " name="email" value="<?php echo @$email ?>" required>
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

                                <?php if ($civil != 'Solteiro')
                                    echo '<option value="Solteiro">Solteiro</option>'; ?>
                                <?php if ($civil != 'Casado')
                                    echo '<option value="Casado">Casado</option>'; ?>
                                <?php if ($civil != 'Viúvo')
                                    echo '<option value="Viúvo">Viúvo</option>'; ?>

                            </select>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Data Nascimento <?php if (!isset($data)) {
                                                                                            echo '<span class="text-danger">*(Campo Obrigatório)</span>';
                                                                                        }; ?></label>
                                <input type="date" class="form-control" id="data" name="data" value="<?php echo @$data ?>">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Qual sexo foi designado ao nascimento?</label>
                            <select class="form-control" id="" name="sexo_nascimento">

                                <?php
                                if (@$_GET['funcao'] == 'editar') {
                                    echo '<option value="' . $sexo_nascimento . '">' . $sexo_nascimento . '</option>';
                                }
                                ?>
                                <?php if ($sexo_nascimento != 'Feminino')
                                    echo '<option value="Feminino">Feminino</option>'; ?>
                                <?php if ($sexo_nascimento != 'Masculino')
                                    echo '<option value="Masculino">Masculino</option>'; ?>
                                <?php if ($sexo_nascimento != 'Intersexo')
                                    echo '<option value="Intersexo">Intersexo</option>'; ?>
                                <?php if ($sexo_nascimento != 'Prefiro nao responder')
                                    echo '<option value="Prefiro nao responder">Prefiro nao responder</option>'; ?>

                            </select>

                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Você se identifica como?</label>
                            <input type="text" class="form-control" id="sexo_identifica" placeholder="Hetero, Gay, Bissexual etc..." name="sexo_identifica" value="<?php echo @$sexo_identifica ?>" required>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Qual sua identidade de Genero atual?</label>
                            <input type="text" class="form-control" id="identidade_genero" placeholder="Masculino, feminino. homem trans etc..." name="identidade_genero" value="<?php echo @$identidade_genero ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlSelect1">Qual pronome você prefere?</label>
                            <input type="text" class="form-control" id="pronome_paciente" placeholder="Ele/dele, Ela/ela, Elu/delu etc..." name="pronome_paciente" value="<?php echo @$pronome_paciente ?>" required>
                        </div>


                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlInput1">Endereço</label>
                        <input type="text" class="form-control" id="endereco" placeholder="Insira o Endereço " name="endereco" value="<?php echo @$endereco ?>" required>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Peso (KG)</label>
                                <input type="text" class="form-control" id="peso" placeholder="Insira o Peso" name="peso" value="<?php echo @$peso ?>" required>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Altura (cm)</label>
                                <input type="text" class="form-control" id="telefone" placeholder="Insira a Altura" name="altura" value="<?php echo @$altura ?>" required>
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
                                    <?php if ($imc != 'BP')
                                        echo '<option value="BP">BP</option>'; ?>
                                    <?php if ($imc != 'N')
                                        echo '<option value="N">N</option>'; ?>
                                    <?php if ($imc != 'S')
                                        echo '<option value="S">S</option>'; ?>
                                    <?php if ($imc != 'O')
                                        echo '<option value="O">O</option>'; ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Diagnostico de Origem</label>
                        <textarea class="form-control" id="obs" name="obs" maxlength="300"><?php echo @$obs ?></textarea>
                    </div>


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tipo de cirurgia </label>
                                <input type="text" class="form-control" i'd="tipo_cirurgia" placeholder="Tipo de cirurgia" name="tipo_cirurgia" value="<?php echo @$tipo_cirurgia ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Encaminhado </label>
                                <input type="text" class="form-control" id="medico_old" placeholder="Encaminhado por" name="medico_old" value="<?php echo @$medico_old ?>" required>
                            </div>
                        </div>


                    </div>
                    <?php if (!isset($cpf, $nome, $data)) {
                        echo ' <span class="text-muted">Nome, CPF e Data de Nascimento são informações <span class="text-danger">* Obrigatórias</span></span><br><br>';
                    }; ?>

                    <!--BOTOES PARA ESCOLHER ESPECIALIDADE -->
                    <div class="modal-header">


                        <h5>Especialidade</h5>

                        <p>
                            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseUROLOGIA" aria-expanded="false" aria-controls="collapseExample">
                                UROLOGIA
                            </button>
                            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapsePROCTOLOGIA" aria-expanded="false" aria-controls="collapseExample">
                                PROCTOLOGIA
                            </button>
                            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseUROGINECOLOGIA" aria-expanded="false" aria-controls="collapseExample">
                                UROGINECOLOGIA
                            </button>
                            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseORTOPEDIA" aria-expanded="false" aria-controls="collapseExample">
                                ORTOPEDIA
                            </button>
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
                                <input type="text" class="form-control" id="queixa_prin" placeholder="Queixa principal/duração" name="queixa_prin" value="<?php echo @$queixa_prin ?>" required>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlInput1">Antecedentes Patológicos</label>
                                <input type="text" class="form-control" id="antecedentes_pessoais" placeholder="Antecedentes Pessoais patológicos " name="antecedentes_pessoais" value="<?php echo @$antecedentes_pessoais ?>" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Antecedentes cirúrgicos</label>
                                        <input type="text" class="form-control" id="antecedentes_cirurgicos" placeholder="Antecedentes cirúrgicos" name="antecedentes_cirurgicos" value="<?php echo @$antecedentes_cirurgicos ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Antecedentes familiares</label>
                                        <input type="text" class="form-control" id="antecedentes_familiares" placeholder="Antecedentes familiares" name="antecedentes_familiares" value="<?php echo @$antecedentes_familiares ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Medicações em uso</label>
                                <textarea class="form-control" id="medicacoes" name="medicacoes" maxlength="300"><?php echo @$medicacoes ?></textarea>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Antecedentes Urológicos:</label>
                                <input type="text" class="form-control" id="antecedentes_urologicos" placeholder="antecedentes Urológicos" name="antecedentes_urologicos" value="<?php echo @$antecedentes_urologicos ?>" required>
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
                                            <?php if ($queixas_urinarias != 'Não se aplica')
                                                echo '<option value="Não se aplica">Não se aplica</option>'; ?>
                                            <?php if ($queixas_urinarias != 'Urgência')
                                                echo '<option value="Urgencia">Urgência</option>'; ?>
                                            <?php if ($queixas_urinarias != 'urge-incontinencia')
                                                echo '<option value="urge-incontinencia">urge-incontinencia</option>'; ?>
                                            <?php if ($queixas_urinarias != 'disúria')
                                                echo '<option value="disuria">disúria</option>'; ?>
                                            <?php if ($queixas_urinarias != 'noctúria')
                                                echo '<option value="nocturia">noctúria</option>'; ?>

                                            <?php if ($queixas_urinarias != 'enurese')
                                                echo '<option value="nocturia">noctúria</option>'; ?>
                                            <?php if ($queixas_urinarias != 'polaciúria')
                                                echo '<option value="polaciuria">polaciúria</option>'; ?>
                                            <?php if ($queixas_urinarias != 'hematúria')
                                                echo '<option value="hematuria">hematúria</option>'; ?>
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
                                            <?php if ($perdas_aos_esforcos != 'Não se aplica')
                                                echo '<option value="Não se aplica">Não se aplica</option>'; ?>
                                            <?php if ($perdas_aos_esforcos != 'pequenos')
                                                echo '<option value="pequenos">pequenos</option>'; ?>
                                            <?php if ($perdas_aos_esforcos != 'moderados')
                                                echo '<option value="moderados">moderados</option>'; ?>
                                            <?php if ($perdas_aos_esforcos != 'grandes')
                                                echo '<option value="grandes">grandes</option>'; ?>

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
                                            <?php if ($tipos_queixa_urina != 'Não se aplica')
                                                echo '<option value="Não se aplica">Não se aplica</option>'; ?>
                                            <?php if ($tipos_queixa_urina != 'Gotejamento')
                                                echo '<option value="Gotejamento">Gotejamento</option>'; ?>
                                            <?php if ($tipos_queixa_urina != 'Jato')
                                                echo '<option value="Jato">Jato</option>'; ?>

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
                                            <?php if ($perdas_esforcos != 'Não se aplica')
                                                echo '<option value="Não se aplica">Não se aplica</option>'; ?>
                                            <?php if ($perdas_esforcos != 'sincrônicas')
                                                echo '<option value="sincrônicas">sincrônicas</option>'; ?>
                                            <?php if ($perdas_esforcos != 'defasadas')
                                                echo '<option value="defasadas">defasadas</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlInput1">Circunstâncias das perdas:
                                </label>
                                <textarea class="form-control" id="circunstancias_das_perdas" name="circunstancias_das_perdas" maxlength="300"><?php echo @$circunstancias_das_perdas; ?></textarea>
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
                                            <?php if ($uso_de_protecao != 'nenhum')
                                                echo '<option value="nenhum">nenhum</option>'; ?>
                                            <?php if ($uso_de_protecao != 'clamp peniano')
                                                echo '<option value="Jato">clamp peniano</option>'; ?>

                                            <?php if ($uso_de_protecao != 'absorvente masculino')
                                                echo '<option value="absorvente masculino">absorvente masculino</option>'; ?>

                                            <?php if ($uso_de_protecao != 'fraldas')
                                                echo '<option value="fraldas">fraldas</option>'; ?>

                                            <?php if ($uso_de_protecao != 'forros')
                                                echo '<option value="forros">forros</option>'; ?>

                                            <?php if ($uso_de_protecao != 'coletor de perna')
                                                echo '<option value=" coletor de perna"> coletor de perna</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Função sexual:</label>
                                        <input type="text" class="form-control" id="Funcao_sexual" placeholder="Função sexual" name="funcao_sexual" value="<?php echo @$funcao_sexual ?>" required>
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
                                            <?php if ($SHIM != '22-25 Sem Disfunção Eréti')
                                                echo '<option value="22-25 Sem Disfunção Eréti">22-25 Sem Disfunção Erétil </option>'; ?>
                                            <?php if ($SHIM != '17-21 Disfunção Erétil Leve')
                                                echo '<option value="17-21 Disfunção Erétil Leveo">17-21 Disfunção Erétil Leve</option>'; ?>
                                            <?php if ($SHIM != '12-16 Disfunção Erétil Leve a Moderada')
                                                echo '<option value="12-16 Disfunção Erétil Leve a Moderada">12-16 Disfunção Erétil Leve a Moderada</option>'; ?>
                                            <?php if ($SHIM != '8-11 Disfunção Erétil Moderada')
                                                echo '<option value=" 8-11 Disfunção Erétil Moderada"> 8-11 Disfunção Erétil Moderada</option>'; ?>
                                            <?php if ($SHIM != '5-7 Disfunção Erétil Grave')
                                                echo '<option value="5-7 Disfunção Erétil Grave">5-7 Disfunção Erétil Grave</option>'; ?>
                                            <?php if ($SHIM != 'nao se aplica')
                                                echo '<option value=" não se aplica">não se aplica</option>'; ?>

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
                                            <?php if ($consumo_liquidos != 'Não se aplica')
                                                echo '<option value="Não se aplica">Não se aplica</option>'; ?>
                                            <?php if ($consumo_liquidos != 'Sim')
                                                echo '<option value="Sim">Sim</option>'; ?>
                                            <?php if ($consumo_liquidos != 'Nao')
                                                echo '<option value="Nao">Nao</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Hábitos de vida</label>
                                        <input type="text" class="form-control" id="habitos_vida" placeholder="Ex: Tabagismo, registrição dietética ..." name="habitos_vida" value="<?php echo @$habitos_vida ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Uso frequente de</label>
                                        <input type="text" class="form-control" id="uso_frequente" placeholder="Ex: Café, Chá preto, chocolate ..." name="uso_frequente" value="<?php echo @$uso_frequente ?>" required>
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
                                        <input type="text" class="form-control" id="cicatrizes" placeholder="Cicatrizes" name="cicatrizes" value="<?php echo @$cicatrizes ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Trofismo Genital</label>
                                        <input type="text" class="form-control" id="trofismo_genital" placeholder="Trofismo Genital" name="trofismo_genital" value="<?php echo @$trofismo_genital ?>" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Trofismo MMII</label>
                                        <input type="text" class="form-control" id="trofismo_mmii" placeholder="Trofismo MMII" name="trofismo_mmii" value="<?php echo @$trofismo_mmii ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Contração voluntaria de dos MAP</label>
                                        <select class="form-control" id="contracao_voluntaria" name="contracao_voluntaria">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $contracao_voluntaria . '">' . $contracao_voluntaria . '</option>';
                                            }
                                            ?>
                                            <?php if ($contracao_voluntaria != 'Presente')
                                                echo '<option value="Presente">Presente</option>'; ?>
                                            <?php if ($contracao_voluntaria != 'Ausente')
                                                echo '<option value="Ausente">Ausente</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Uso de músculos acessórios</label>
                                        <select class="form-control" id="musculos_acessorios" name="musculos_acessorios">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $musculos_acessorios . '">' . $musculos_acessorios . '</option>';
                                            }
                                            ?>
                                            <?php if ($musculos_acessorios != 'Abdominais')
                                                echo '<option value="Abdominais">Abdominais</option>'; ?>
                                            <?php if ($musculos_acessorios != 'Adutores')
                                                echo '<option value="Adutores">Adutores</option>'; ?>
                                            <?php if ($musculos_acessorios != 'Gluteos Apneia')
                                                echo '<option value="Glúteos Apneia">Glúteos Apneia</option>'; ?>
                                            <?php if ($musculos_acessorios != 'Presente')
                                                echo '<option value="Presente">Presente</option>'; ?>
                                            <?php if ($musculos_acessorios != 'Ausente')
                                                echo '<option value="Ausente">Ausente</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tônus do corpo perinea</label>
                                        <select class="form-control" id="tonus_do_corpo_perinea" name="tonus_do_corpo_perinea">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tonus_do_corpo_perinea . '">' . $tonus_do_corpo_perinea . '</option>';
                                            }
                                            ?>
                                            <?php if ($tonus_do_corpo_perinea != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($tonus_do_corpo_perinea != 'Pipertônico')
                                                echo '<option value="Pipertônico">Pipertônico</option>'; ?>
                                            <?php if ($tonus_do_corpo_perinea != 'Hipotônico')
                                                echo '<option value="Hipotônico">Hipotônico</option>'; ?>

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
                                            <?php if ($tonus_do_eae != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($tonus_do_eae != 'Pipertônico')
                                                echo '<option value="Pipertônico">Pipertônico</option>'; ?>
                                            <?php if ($tonus_do_eae != 'Hipotônico')
                                                echo '<option value="Hipotônico">Hipotônico</option>'; ?>

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
                                            <?php if ($tonus_de_mmii != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($tonus_de_mmii != 'Pipertônico')
                                                echo '<option value="Pipertônico">Pipertônico</option>'; ?>
                                            <?php if ($tonus_de_mmii != 'Hipotônico')
                                                echo '<option value="Hipotônico">Hipotônico</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Força muscular (Oxford)</label>
                                        <input type="text" class="form-control" id="forca_muscular" placeholder="Força muscular (Oxford)" name="forca_muscular" value="<?php echo @$forca_muscular ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sensibilidade</label>
                                        <input type="text" class="form-control" id="sensibilidade" placeholder="Sensibilidade" name="sensibilidade" value="<?php echo @$sensibilidade ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Pontos dolorosos</label>
                                        <input type="text" class="form-control" id="pontos_dolorosos" placeholder="Pontos dolorosos" name="pontos_dolorosos" value="<?php echo @$pontos_dolorosos ?>" required>
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
                                        <select class="form-control" id="corpo_perineal_urologia" name="corpo_perineal_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $corpo_perineal_urologia . '">' . $corpo_perineal_urologia . '</option>';
                                            }
                                            ?>
                                            <?php if ($corpo_perineal_urologia != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($corpo_perineal_urologia != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($corpo_perineal_urologia != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

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
                                            <?php if ($tonus_do_eae_urologia != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($tonus_do_eae_urologia != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($tonus_do_eae_urologia != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

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
                                            <?php if ($puborretal_urologia != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($puborretal_urologia != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($puborretal_urologia != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

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
                                            <?php if ($mmii_urologia != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($mmii_urologia != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($mmii_urologia != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Fibrose</label>
                                        <input type="text" class="form-control" id="fibrose_urologia" placeholder="Fibrose" name="fibrose_urologia" value="<?php echo @$fibrose_urologia ?>" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Força muscular (AFA)</label>
                                        <input type="text" class="form-control" id="afa_urologia" placeholder="Força muscular (AFA)" name="afa_urologia" value="<?php echo @$afa_urologia ?>" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"><i>P E R F E C T</i></label>
                                        <input type="text" class="form-control" id="perfect_urologia" placeholder="P.E.R.F.E.C.T" name="perfect_urologia" value="<?php echo @$perfect_urologia ?>" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Elasticidade</label>
                                        <input type="text" class="form-control" id="elasticidade_urologia" placeholder="Elasticidade" name="elasticidade_urologia" value="<?php echo @$elasticidade_urologia ?>" required>
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
                                            <?php if ($coordenacao_urologia != 'presente')
                                                echo '<option value="presente">presente</option>'; ?>
                                            <?php if ($coordenacao_urologia != 'ausente')
                                                echo '<option value="ausente">ausente</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Relaxamento do PR à manobra de
                                            evacuação</label>
                                        <select class="form-control" id="relaxamento_do_pr_a_manobra_de_evacuacao_urologia " name="relaxamento_do_pr_a_manobra_de_evacuacao_urologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $relaxamento_do_pr_a_manobra_de_evacuacao_urologia . '">' . $relaxamento_do_pr_a_manobra_de_evacuacao_urologia . '</option>';
                                            }
                                            ?>
                                            <?php if ($relaxamento_do_pr_a_manobra_de_evacuacao_urologia != 'sim')
                                                echo '<option value="sim">sim</option>'; ?>
                                            <?php if ($relaxamento_do_pr_a_manobra_de_evacuacao_urologia != 'nao')
                                                echo '<option value="nao">nao</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pontos dolorosos</label>
                                <input type="text" class="form-control" id="pontos_dolorosos" placeholder="Pontos dolorosos" name="pontos_dolorosos" value="<?php echo @$pontos_dolorosos ?>" required>
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
                                            <?php if ($pergunta1_urologia != 'Muito Baixa')
                                                echo '<option value="Muito Baixa">Muito Baixa</option>'; ?>
                                            <?php if ($pergunta1_urologia != 'Baixa')
                                                echo '<option value="Baixa">Baixa</option>'; ?>
                                            <?php if ($pergunta1_urologia != 'Moderada')
                                                echo '<option value="Moderada">Moderada</option>'; ?>
                                            <?php if ($pergunta1_urologia != 'Alta')
                                                echo '<option value="Alta">Alta</option>'; ?>
                                            <?php if ($pergunta1_urologia != 'Muito Alta')
                                                echo '<option value="Muito Alta">Muito Alta</option>'; ?>

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
                                            <?php if ($pergunta2_urologia != 'Quase nunca ou nunca')
                                                echo '<option value="Quase nunca ou nunca">Quase nunca ou nunca</option>'; ?>
                                            <?php if ($pergunta2_urologia != 'Poucas vezes (muito menos que a metade das vezes)')
                                                echo '<option value="Poucas vezes (muito menos que a metade das vezes)">Poucas vezes (muito menos que a metade das vezes)</option>'; ?>
                                            <?php if ($pergunta2_urologia != 'Algumas vezes (cerca de metade das vezes)')
                                                echo '<option value="Algumas vezes (cerca de metade das vezes)">Algumas vezes (cerca de metade das vezes)</option>'; ?>
                                            <?php if ($pergunta2_urologia != 'Algumas vezes (cerca de metade das vezes)')
                                                echo '<option value="Algumas vezes (cerca de metade das vezes)">Algumas vezes (cerca de metade das vezes)</option>'; ?>
                                            <?php if ($pergunta2_urologia != 'A maioria da vezes (muito mais que a metade)')
                                                echo '<option value="A maioria da vezes (muito mais que a metade)">A maioria da vezes (muito mais que a metade)</option>'; ?>
                                            <?php if ($pergunta2_urologia != 'Quase sempre ou sempre')
                                                echo '<option value="Quase sempre ou sempre">Quase sempre ou sempre</option>'; ?>

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
                                            <?php if ($pergunta3_urologia != 'Quase nunca ou nunca')
                                                echo '<option value="Quase nunca ou nunca">Quase nunca ou nunca</option>'; ?>
                                            <?php if ($pergunta3_urologia != 'Poucas vezes (muito menos que a metade das vezes)')
                                                echo '<option value="Poucas vezes (muito menos que a metade das vezes)">Poucas vezes (muito menos que a metade das vezes)</option>'; ?>
                                            <?php if ($pergunta3_urologia != 'Algumas vezes (cerca de metade das vezes)')
                                                echo '<option value="Algumas vezes (cerca de metade das vezes)">Algumas vezes (cerca de metade das vezes)</option>'; ?>
                                            <?php if ($pergunta3_urologia != 'Algumas vezes (cerca de metade das vezes)')
                                                echo '<option value="Algumas vezes (cerca de metade das vezes)">Algumas vezes (cerca de metade das vezes)</option>'; ?>
                                            <?php if ($pergunta3_urologia != 'A maioria da vezes (muito mais que a metade)')
                                                echo '<option value="A maioria da vezes (muito mais que a metade)">A maioria da vezes (muito mais que a metade)</option>'; ?>
                                            <?php if ($pergunta3_urologia != 'Quase sempre ou sempre')
                                                echo '<option value="Quase sempre ou sempre">Quase sempre ou sempre</option>'; ?>

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
                                            <?php if ($pergunta4_urologia != 'Extremamente difícil')
                                                echo '<option value="Extremamente difícil">Extremamente difícil</option>'; ?>
                                            <?php if ($pergunta4_urologia != 'Muito difícil')
                                                echo '<option value="Muito difícil">Muito difícil</option>'; ?>
                                            <?php if ($pergunta4_urologia != 'Difícil')
                                                echo '<option value="Difícil">Difícil</option>'; ?>
                                            <?php if ($pergunta4_urologia != 'Pouco Difícil')
                                                echo '<option value="Pouco Difícil">Pouco Difícil</option>'; ?>
                                            <?php if ($pergunta4_urologia != 'Nada Difícil')
                                                echo '<option value="Nada Difícil">Nada Difícil</option>'; ?>

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
                                            <?php if ($pergunta5_urologia != 'Quase nunca ou nunca')
                                                echo '<option value="Quase nunca ou nunca">Quase nunca ou nunca</option>'; ?>
                                            <?php if ($pergunta5_urologia != 'Poucas vezes (muito menos que a metade das vezes)')
                                                echo '<option value="Poucas vezes (muito menos que a metade das vezes)">Poucas vezes (muito menos que a metade das vezes)</option>'; ?>
                                            <?php if ($pergunta5_urologia != 'Algumas vezes (cerca de metade das vezes)')
                                                echo '<option value="Algumas vezes (cerca de metade das vezes)">Algumas vezes (cerca de metade das vezes)</option>'; ?>
                                            <?php if ($pergunta5_urologia != 'Algumas vezes (cerca de metade das vezes)')
                                                echo '<option value="Algumas vezes (cerca de metade das vezes)">Algumas vezes (cerca de metade das vezes)</option>'; ?>
                                            <?php if ($pergunta5_urologia != 'A maioria da vezes (muito mais que a metade)')
                                                echo '<option value="A maioria da vezes (muito mais que a metade)">A maioria da vezes (muito mais que a metade)</option>'; ?>
                                            <?php if ($pergunta5_urologia != 'Quase sempre ou sempre')
                                                echo '<option value="Quase sempre ou sempre">Quase sempre ou sempre</option>'; ?>

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
                                    <input type="text" class="form-control" id="queixa_prin_proc" placeholder="Queixa principal/duração" name="queixa_prin_proc" value="<?php echo @$queixa_prin_proc ?>" required>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Antecedentes Patológicos</label>
                                    <input type="text" class="form-control" id="antecedentes_pessoais_proc" placeholder="Antecedentes Pessoais patológicos " name="antecedentes_pessoais_proc" value="<?php echo @$antecedentes_pessoais_proc ?>" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Antecedentes cirúrgicos</label>
                                            <input type="text" class="form-control" id="antecedentes_cirurgicos_proc" placeholder="Antecedentes cirúrgicos" name="antecedentes_cirurgicos_proc" value="<?php echo @$antecedentes_cirurgicos_proc ?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Antecedentes familiares</label>
                                            <input type="text" class="form-control" id="antecedentes_familiares_proc" placeholder="Antecedentes familiares" name="antecedentes_familiares_proc" value="<?php echo @$antecedentes_familiares_proc ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">História proctológica</label>
                                <input type="text" class="form-control" id="historia_proctologica" placeholder="História proctológica" name="historia_proctologica" value="<?php echo @$historia_proctologica ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quanto tempo iniciou os sintomas?</label>
                                <input type="text" class="form-control" id="tempo_sintomas" placeholder="Quanto tempo iniciou os sintomas?" name="tempo_sintomas" value="<?php echo @$tempo_sintomas ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Quanto tempo demorou para procurar ajuda
                                    médica?</label>
                                <input type="text" class="form-control" id="tempo_ajuda" placeholder="Quanto tempo demorou para procurar ajuda médica?" name="tempo_ajuda" value="<?php echo @$tempo_ajuda ?>" required>
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
                                            <?php if ($sintomas_estado != 'esta igual')
                                                echo '<option value="está igual">está igual</option>'; ?>
                                            <?php if ($sintomas_estado != 'melhorou')
                                                echo '<option value="melhorou">melhorou</option>'; ?>
                                            <?php if ($sintomas_estado != 'piorou')
                                                echo '<option value="piorou">piorou</option>'; ?>

                                        </select>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Perdas </label>
                                            <input type="text" class="form-control" id="perdas_proc" placeholder="Perdas: tosse, agachar , espirro e etc.." name="perdas_proc" value="<?php echo @$perdas_proc ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Freqüência dos acidentes </label>
                                    <input type="text" class="form-control" id="frequencia_dos_acidentes" placeholder="Freqüência dos acidentes" name="frequencia_dos_acidentes" value="<?php echo @$frequencia_dos_acidentes ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Quantidade da perda </label>
                                    <input type="text" class="form-control" id="quantidade_da_perda" placeholder="Quantidade da perda" name="quantidade_da_perda" value="<?php echo @$quantidade_da_perda ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Proteções </label>
                                    <input type="text" class="form-control" id="protecoes_proc" placeholder="Proteções" name="protecoes_proc" value="<?php echo @$protecoes_proc ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Freqüência evacuatória </label>
                                    <input type="text" class="form-control" id="frequencia_evacuatoria" placeholder="Freqüência evacuatória" name="frequencia_evacuatoria" value="<?php echo @$frequencia_evacuatoria ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Necessita de alguma manobra especial para
                                        evacuar? </label>
                                    <input type="text" class="form-control" id="manobra_evacuar" placeholder="Necessita de alguma manobra especial para evacuar? " name="manobra_evacuar" value="<?php echo @$manobra_evacuar ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Medicações em uso</label>
                                    <input type="text" class="form-control" id="medicacoes_em_uso_proc" placeholder="Medicações em uso" name="medicacoes_em_uso_proc" value="<?php echo @$medicacoes_em_uso_proc ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Partos</label>
                                    <input type="text" class="form-control" id="partos_proc" placeholder="Qauntos vaginais,cesareana e outros..." name="partos_proc" value="<?php echo @$partos_proc ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Complicações puerperais</label>
                                    <input type="text" class="form-control" id="complicacoes_puerperais_proc" placeholder="iInfecção, incontinência,DIP,deiscência" name="complicacoes_puerperais_proc" value="<?php echo @$complicacoes_puerperais_proc ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Cirurgias ginecológicas</label>
                                    <input type="text" class="form-control" id="cirurgias_ginecologicas_proc" placeholder="Sim? Quantas? Não?" name="cirurgias_ginecologicas_proc" value="<?php echo @$cirurgias_ginecologicas_proc ?>" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Antecedentes Urológicos</label>
                                    <input type="text" class="form-control" id="antecedentes_urologicos_proc" placeholder="ITU, HPB, CA, próstata,LUTS, Incontinência, outros (especificar)" name="antecedentes_urologicos_proc" value="<?php echo @$antecedentes_urologicos_proc ?>" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Hábitos de vida</label>
                                        <input type="text" class="form-control" id="habitos_vida_proc" placeholder="Ex: Tabagismo, registrição dietética ..." name="habitos_vida_proc" value="<?php echo @$habitos_vida_proc ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Uso frequente de</label>
                                        <input type="text" class="form-control" id="uso_frequente_proc" placeholder="Ex: Café, Chá preto, chocolate ..." name="uso_frequente_proc" value="<?php echo @$uso_frequente_proc ?>" required>
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
                                            <?php if ($restricao_do_consumo_de_liquidos_proc != 'Sim')
                                                echo '<option value="Sim">sim</option>'; ?>
                                            <?php if ($restricao_do_consumo_de_liquidos_proc != 'Nao')
                                                echo '<option value="Nao">Nao</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Renda familiar</label>
                                        <input type="text" class="form-control" id="renda_familiar" placeholder="X salários mínimos" name="renda_familiar" value="<?php echo @$renda_familiar ?>" required>
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
                                        <input type="text" class="form-control" id="cicatrizes_proc" placeholder="Cicatrizes " name="cicatrizes_proc" value="<?php echo @$cicatrizes_proc ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Trofismo perianal</label>
                                        <input type="text" class="form-control" id="trofismo_perianal" placeholder="Trofismo perianal" name="trofismo_perianal" value="<?php echo @$trofismo_perianal ?>" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Trofismo MMII</label>
                                        <input type="text" class="form-control" id="trofismo_mmii_proc" placeholder="Trofismo MMII" name="trofismo_mmii_proc" value="<?php echo @$trofismo_mmii_proc ?>" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Contração voluntaria de dos MAP</label>
                                        <select class="form-control" id="contracao_voluntaria_proc" name="contracao_voluntaria_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $contracao_voluntaria_proc . '">' . $contracao_voluntaria_proc . '</option>';
                                            }
                                            ?>
                                            <?php if ($contracao_voluntaria_proc != 'Presente')
                                                echo '<option value="Presente">Presente</option>'; ?>
                                            <?php if ($contracao_voluntaria_proc != 'Ausente')
                                                echo '<option value="Ausente">Ausente</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Abertura vulvo-vaginal </label>
                                        <select class="form-control" id="abertura_vulvo_vaginal_proc" name="abertura_vulvo_vaginal_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $abertura_vulvo_vaginal_proc . '">' . $abertura_vulvo_vaginal_proc . '</option>';
                                            }
                                            ?>
                                            <?php if ($abertura_vulvo_vaginal_proc != '0')
                                                echo '<option value="0">0</option>'; ?>
                                            <?php if ($abertura_vulvo_vaginal_proc != '+')
                                                echo '<option value="+">+</option>'; ?>
                                            <?php if ($abertura_vulvo_vaginal_proc != '++')
                                                echo '<option value="++">++</option>'; ?>
                                            <?php if ($abertura_vulvo_vaginal_proc != '+++')
                                                echo '<option value="+++">+++</option>'; ?>
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
                                            <?php if ($abertura_anal_proc != '0')
                                                echo '<option value="0">0</option>'; ?>
                                            <?php if ($abertura_anal_proc != '+')
                                                echo '<option value="+">+</option>'; ?>
                                            <?php if ($abertura_anal_proc != '++')
                                                echo '<option value="++">++</option>'; ?>
                                            <?php if ($abertura_anal_proc != '+++')
                                                echo '<option value="+++">+++</option>'; ?>
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
                                            <?php if ($apneia_proc != 'presente')
                                                echo '<option value="presente">presente</option>'; ?>
                                            <?php if ($apneia_proc != 'ausente')
                                                echo '<option value="ausente">ausente</option>'; ?>

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
                                            <?php if ($contracao_do_eae != 'a tosse')
                                                echo '<option value="a tosse">a tosse</option>'; ?>
                                            <?php if ($contracao_do_eae != 'durante estímulo nociceptivo')
                                                echo '<option value="durante estímulo nociceptivo">durante estímulo nociceptivo</option>'; ?>

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
                                        <select class="form-control" id="corpo_perineal_proc" name="corpo_perineal_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $corpo_perineal_proc . '">' . $corpo_perineal_proc . '</option>';
                                            }
                                            ?>
                                            <?php if ($corpo_perineal_proc != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($corpo_perineal_proc != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($corpo_perineal_proc != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

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
                                            <?php if ($tonus_do_eae_proc != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($tonus_do_eae_proc != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($tonus_do_eae_proc != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

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
                                            <?php if ($puborretal_proc != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($puborretal_proc != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($puborretal_proc != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

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
                                            <?php if ($mmii_proc != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($mmii_proc != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($mmii_proc != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Fibrose</label>
                                        <input type="text" class="form-control" id="fibrose_proc" placeholder="Fibrose" name="fibrose_proc" value="<?php echo @$fibrose_proc ?>" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Força muscular (AFA)</label>
                                        <input type="text" class="form-control" id="afa_proc" placeholder="Força muscular (AFA)" name="afa_proc" value="<?php echo @$afa_proc ?>" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"><i>P E R F E C T</i></label>
                                        <input type="text" class="form-control" id="perfect_proc" placeholder="P.E.R.F.E.C.T" name="perfect_proc" value="<?php echo @$perfect_proc ?>" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Elasticidade</label>
                                        <input type="text" class="form-control" id="elasticidade_proc" placeholder="Elasticidade" name="elasticidade_proc" value="<?php echo @$elasticidade_proc ?>" required>
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
                                            <?php if ($coordenacao_proc != 'presente')
                                                echo '<option value="presente">presente</option>'; ?>
                                            <?php if ($coordenacao_proc != 'ausente')
                                                echo '<option value="ausente">ausente</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Relaxamento do PR à manobra de
                                            evacuação</label>
                                        <select class="form-control" id="relaxamento_do_pr_a_manobra_de_evacuacao_proc " name="relaxamento_do_pr_a_manobra_de_evacuacao_proc">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $relaxamento_do_pr_a_manobra_de_evacuacao_proc . '">' . $relaxamento_do_pr_a_manobra_de_evacuacao_proc . '</option>';
                                            }
                                            ?>
                                            <?php if ($relaxamento_do_pr_a_manobra_de_evacuacao_proc != 'sim')
                                                echo '<option value="sim">sim</option>'; ?>
                                            <?php if ($relaxamento_do_pr_a_manobra_de_evacuacao_proc != 'nao')
                                                echo '<option value="nao">nao</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pontos dolorosos</label>
                                <input type="text" class="form-control" id="pontos_dolorosos_proc" placeholder="Pontos dolorosos" name="pontos_dolorosos_proc" value="<?php echo @$pontos_dolorosos_proc ?>" required>
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
                                <?php if ($teste_de_esforco_proc != 'sem perdas')
                                    echo '<option value="sem perdas">sem perdas</option>'; ?>
                                <?php if ($teste_de_esforco_proc != 'perdas fecal/flatos a tosse')
                                    echo '<option value="perdas fecal/flatos a tosse">perdas fecal/flatos a tosse</option>'; ?>
                                <?php if ($teste_de_esforco_proc != 'perdas fecal/flatos à vasalva')
                                    echo '<option value="perdas fecal/flatos à vasalva">perdas fecal/flatos à vasalva</option>'; ?>

                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Reflexo Clitoriano/Reflexo bulbocavernoso
                                        (S2-S4)</label>
                                    <input type="text" class="form-control" id="reflexo_clitoriano_bulbocavernoso_proc" placeholder="Reflexo Clitoriano/Reflexo bulbocavernoso (S2-S4)" name="reflexo_clitoriano_bulbocavernoso_proc" value="<?php echo @$reflexo_clitoriano_bulbocavernoso_proc ?>" required>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Reflexo Geigel/ Cremastérico (L1-L2)</label>
                                    <input type="text" class="form-control" id="reflexo_ceigel_cremasterico" placeholder="Reflexo Geigel/ Cremastérico (L1-L2)" name="reflexo_ceigel_cremasterico" value="<?php echo @$reflexo_ceigel_cremasterico ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Marcha</label>
                            <input type="text" class="form-control" id="marcha_proc" placeholder="Marcha" name="marcha_proc" value="<?php echo @$marcha_proc ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Outros dados relevantes</label>
                            <textarea class="form-control" id="outros_dados_proc" name="outros_dados_proc" maxlength="300"><?php echo @$outros_dados_proc; ?></textarea>
                        </div>

                    </div>
                    <!-- FIM PROCTOLOGIA -->


                    <!-- UROGINECOLOGIA -->
                    <div class="collapse" id="collapseUROGINECOLOGIA">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5>Uroginecologia</h5>
                                <!-- Uroginecologia -->
                                <?php if (@$_GET['funcao'] == 'editar') {

                                    //BUSCAR DADOS DO REGISTRO A SER EDITADO
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
                                <input type="text" class="form-control" id="queixa_prin_urogine" placeholder="Queixa principal/duração" name="queixa_prin_urogine" value="<?php echo @$queixa_prin_urogine ?>" required>
                            </div>


                            <div class="form-group">
                                <label for="exampleFormControlInput1">Antecedentes Patológicos</label>
                                <input type="text" class="form-control" id="antecedentes_pessoais_urogine" placeholder="Antecedentes Pessoais patológicos " name="antecedentes_pessoais_urogine" value="<?php echo @$antecedentes_pessoais_urogine ?>" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Antecedentes cirúrgicos</label>
                                        <input type="text" class="form-control" id="antecedentes_cirurgicos_urogine" placeholder="Antecedentes cirúrgicos" name="antecedentes_cirurgicos_urogine" value="<?php echo @$antecedentes_cirurgicos_urogine ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Antecedentes familiares</label>
                                        <input type="text" class="form-control" id="antecedentes_familiares_urogine" placeholder="Antecedentes familiares" name="antecedentes_familiares_urogine" value="<?php echo @$antecedentes_familiares_urogine ?>" required>
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
                                            <?php if ($fase_de_enchimento_urogine != 'urgencia')
                                                echo '<option value="urgencia">urgencia</option>'; ?>
                                            <?php if ($fase_de_enchimento_urogine != 'urge-incontinencia')
                                                echo '<option value="urge-incontinencia">urge-incontinencia</option>'; ?>
                                            <?php if ($fase_de_enchimento_urogine != 'disuria')
                                                echo '<option value="disuria">disuria</option>'; ?>
                                            <?php if ($fase_de_enchimento_urogine != 'nocturia')
                                                echo '<option value="nocturia">nocturia</option>'; ?>

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
                                            <?php if ($fase_de_esvaziamento_urogine != 'hesitacao')
                                                echo '<option value="hesitacao">hesitacao</option>'; ?>
                                            <?php if ($fase_de_esvaziamento_urogine != 'esforco miccional')
                                                echo '<option value="esforco miccional">esforco miccional</option>'; ?>
                                            <?php if ($fase_de_esvaziamento_urogine != 'interrupcoes')
                                                echo '<option value="interrupcoes">interrupcoes</option>'; ?>
                                            <?php if ($fase_de_esvaziamento_urogine != 'jato fraco')
                                                echo '<option value=" jato fraco">jato fraco</option>'; ?>
                                            <?php if ($fase_de_esvaziamento_urogine != 'disuria')
                                                echo '<option value="disuria">disuria</option>'; ?>
                                            <?php if ($fase_de_esvaziamento_urogine != 'gotejamento pos-miccional')
                                                echo '<option value="gotejamento pos-miccional">gotejamento pos-miccional</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Outros</label>
                                        <input type="text" class="form-control" id="outros_fase_de_esvaziamento_urogine" placeholder="Outros" name="outros_fase_de_esvaziamento_urogine" value="<?php echo @$outros_fase_de_esvaziamento_urogine ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sensibilidade</label>
                                        <input type="text" class="form-control" id="sensibilidade_fase_de_esvaziamento_urogine" placeholder="Sensibilidade" name="sensibilidade_fase_de_esvaziamento_urogine" value="<?php echo @$sensibilidade_fase_de_esvaziamento_urogine ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">ITU</label>
                                        <input type="text" class="form-control" id="itu_fase_de_esvaziamento_urogine" placeholder="ITU" name="itu_fase_de_esvaziamento_urogine" value="<?php echo @$itu_fase_de_esvaziamento_urogine ?>" required>
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
                                            <?php if ($perdas_urogine != 'Não se aplica')
                                                echo '<option value="Não se aplica">Não se aplica</option>'; ?>
                                            <?php if ($perdas_urogine != 'urgencia')
                                                echo '<option value="urgencia">urgencia</option>'; ?>
                                            <?php if ($perdas_urogine != 'urge-incontinencia')
                                                echo '<option value="urge-incontinencia">urge-incontinencia</option>'; ?>
                                            <?php if ($perdas_urogine != 'disuria')
                                                echo '<option value="disuria">disuria</option>'; ?>
                                            <?php if ($perdas_urogine != 'nocturia')
                                                echo '<option value="nocturia">nocturia</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Outras circunstâncias</label>
                                        <input type="text" class="form-control" id="outras_circunstancias_perdas_urogine" placeholder="Outras circunstâncias" name="outras_circunstancias_perdas_urogine" value="<?php echo @$outras_circunstancias_perdas_urogine ?>" required>
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
                                            <?php if ($perdas_durante_o_esforco_urogine != 'Não se aplica')
                                                echo '<option value="Não se aplica">Não se aplica</option>'; ?>
                                            <?php if ($perdas_durante_o_esforco_urogine != 'sincronicas')
                                                echo '<option value="sincronicas">sincronicas</option>'; ?>
                                            <?php if ($perdas_durante_o_esforco_urogine != 'defasadas')
                                                echo '<option value="defasadas">defasadas</option>'; ?>
                                            <?php if ($perdas_durante_o_esforco_urogine != 'perdas ao contato com a agua')
                                                echo '<option value="perdas ao contato com a agua">perdas ao contato com a agua</option>'; ?>
                                            <?php if ($perdas_durante_o_esforco_urogine != 'aumento das perdas no período menstrua')
                                                echo '<option value="aumento das perdas no período menstrua">aumento das perdas no período menstrua</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Outros</label>
                                        <input type="text" class="form-control" id="outras_perdas_durante_o_esforco_urogine" placeholder="Outros" name="outras_perdas_durante_o_esforco_urogine" value="<?php echo @$outras_perdas_durante_o_esforco_urogine ?>" required>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Qualidade da perda urinária</label>
                                <input type="text" class="form-control" id="qualidade_da_perda_urinariao_urogine" placeholder="Qualidade da perda urinária" name="qualidade_da_perda_urinariao_urogine" value="<?php echo @$qualidade_da_perda_urinariao_urogine ?>" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Quanto tempo iniciou os sintomas?</label>
                                        <input type="text" class="form-control" id="quanto_tempo_iniciou_os_sintomas_urogine" placeholder="Quanto tempo iniciou os sintomas?" name="quanto_tempo_iniciou_os_sintomas_urogine" value="<?php echo @$quanto_tempo_iniciou_os_sintomas_urogine ?>" required>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Quanto tempo demorou para procurar
                                            ajuda?</label>
                                        <input type="text" class="form-control" id="quanto_tempo_demorou_para_procurar_ajuda_medica_urogine" placeholder="Ajuda médica?" name="quanto_tempo_demorou_para_procurar_ajuda_medica_urogine" value="<?php echo @$quanto_tempo_demorou_para_procurar_ajuda_medica_urogine ?>" required>
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Desde que começaram os sintomas o seu
                                            estado
                                        </label>
                                        <select class="form-control" id="" name="desde_que_comecaram_os_sintomas_o_seu_estado_urogine">

                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $desde_que_comecaram_os_sintomas_o_seu_estado_urogine . '">' . $desde_que_comecaram_os_sintomas_o_seu_estado_urogine . '</option>';
                                            }
                                            ?>
                                            <?php if ($desde_que_comecaram_os_sintomas_o_seu_estado_urogine != 'Não se aplica')
                                                echo '<option value="Não se aplica">Não se aplica</option>'; ?>
                                            <?php if ($desde_que_comecaram_os_sintomas_o_seu_estado_urogine != 'esta igual')
                                                echo '<option value="esta igual">esta igual</option>'; ?>
                                            <?php if ($desde_que_comecaram_os_sintomas_o_seu_estado_urogine != 'melhorou')
                                                echo '<option value="melhorou">melhorou</option>'; ?>
                                            <?php if ($desde_que_comecaram_os_sintomas_o_seu_estado_urogine != 'piorou')
                                                echo '<option value="piorou">piorou</option>'; ?>

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Freqüência urinária?</label>
                                        <input type="text" class="form-control" id="frequencia_urinaria_urogine" placeholder="Freqüência urinária?" name="frequencia_urinaria_urogine" value="<?php echo @$frequencia_urinaria_urogine ?>" required>
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
                                            <?php if ($protecoes_urogine != 'Não se aplica')
                                                echo '<option value="Não se aplica">Não se aplica</option>'; ?>
                                            <?php if ($protecoes_urogine != 'absorvente feminino')
                                                echo '<option value="absorvente feminino">absorvente feminino</option>'; ?>
                                            <?php if ($protecoes_urogine != 'fraldas')
                                                echo '<option value="fraldas">fraldas</option>'; ?>
                                            <?php if ($protecoes_urogine != 'forro')
                                                echo '<option value="forro">forro</option>'; ?>
                                            <?php if ($protecoes_urogine != 'outros')
                                                echo '<option value="outros">outros</option>'; ?>

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Número de trocas/dia</label>
                                        <input type="text" class="form-control" id="numero_de_trocas_urogine" placeholder="Número de trocas/dia" name="numero_de_trocas_urogine" value="<?php echo @$numero_de_trocas_urogine ?>" required>
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
                                        <select class="form-control" id="corpo_perineal_uroginecologia" name="corpo_perineal_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $corpo_perineal_uroginecologia . '">' . $corpo_perineal_uroginecologia . '</option>';
                                            }
                                            ?>
                                            <?php if ($corpo_perineal_uroginecologia != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($corpo_perineal_uroginecologia != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($corpo_perineal_uroginecologia != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

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
                                            <?php if ($tonus_do_eae_uroginecologia != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($tonus_do_eae_uroginecologia != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($tonus_do_eae_uroginecologia != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

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
                                            <?php if ($puborretal_uroginecologia != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($puborretal_uroginecologia != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($puborretal_uroginecologia != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

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
                                            <?php if ($mmii_uroginecologia != 'Normal')
                                                echo '<option value="Normal">Normal</option>'; ?>
                                            <?php if ($mmii_uroginecologia != 'Hipertonico')
                                                echo '<option value="Hipertonico">Hipertonico</option>'; ?>
                                            <?php if ($mmii_uroginecologiaa != 'Hipotonico')
                                                echo '<option value="Hipotonico">Hipotonico</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Fibrose</label>
                                        <input type="text" class="form-control" id="fibrose_uroginecologia" placeholder="Fibrose" name="fibrose_uroginecologia" value="<?php echo @$fibrose_uroginecologia ?>" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Força muscular (AFA)</label>
                                        <input type="text" class="form-control" id="afa_uroginecologia" placeholder="Força muscular (AFA)" name="afa_uroginecologia" value="<?php echo @$afa_uroginecologia ?>" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1"><i>P E R F E C T</i></label>
                                        <input type="text" class="form-control" id="perfect_uroginecologia" placeholder="P.E.R.F.E.C.T" name="perfect_uroginecologia" value="<?php echo @$perfect_uroginecologia ?>" required>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Elasticidade</label>
                                        <input type="text" class="form-control" id="elasticidade_uroginecologia" placeholder="Elasticidade" name="elasticidade_uroginecologia" value="<?php echo @$elasticidade_uroginecologia ?>" required>
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
                                            <?php if ($coordenacao_uroginecologia != 'presente')
                                                echo '<option value="presente">presente</option>'; ?>
                                            <?php if ($coordenacao_uroginecologia != 'ausente')
                                                echo '<option value="ausente">ausente</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Relaxamento do PR à manobra de
                                            evacuação</label>
                                        <select class="form-control" id="relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia " name="relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia . '">' . $relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia . '</option>';
                                            }
                                            ?>
                                            <?php if ($relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia != 'sim')
                                                echo '<option value="sim">sim</option>'; ?>
                                            <?php if ($relaxamento_do_pr_a_manobra_de_evacuacao_uroginecologia != 'nao')
                                                echo '<option value="nao">nao</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pontos dolorosos</label>
                                <input type="text" class="form-control" id="pontos_dolorosos_uroginecologia" placeholder="Pontos dolorosos" name="pontos_dolorosos_uroginecologia" value="<?php echo @$pontos_dolorosos_uroginecologia ?>" required>
                            </div>


                            <div class="modal-header">
                                <h5> História Obstétrica</h5>
                                <br>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Gestações</label>
                                        <input type="text" class="form-control" id="gestacoes_uroginecologia" placeholder="Gestações" name="gestacoes_uroginecologia" value="<?php echo @$gestacoes_uroginecologia ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Partos</label>
                                        <input type="text" class="form-control" id="partos_uroginecologia" placeholder="Partos" name="partos_uroginecologia" value="<?php echo @$partos_uroginecologia ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Abortos</label>
                                        <input type="text" class="form-control" id="abortos_uroginecologia" placeholder="Abortos" name="abortos_uroginecologia" value="<?php echo @$abortos_uroginecologia ?>" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">1º Parto</label>
                                        <input type="text" class="form-control" id="parto1_uroginecologia" placeholder="Tipo" name="parto1_uroginecologia" value="<?php echo @$parto1_uroginecologia ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Idade Materna</label>
                                        <input type="text" class="form-control" id="idade_materna1_uroginecologia" placeholder="Idade Materna" name="idade_materna1_uroginecologia" value="<?php echo @$idade_materna1_uroginecologia ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Peso da Criança</label>
                                        <input type="text" class="form-control" id="peso_da_crianca1_uroginecologia" placeholder="Peso da Criança" name="peso_da_crianca1_uroginecologia" value="<?php echo @$peso_da_crianca1_uroginecologia ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">2º Parto</label>
                                        <input type="text" class="form-control" id="parto2_uroginecologia" placeholder="Tipo" name="parto2_uroginecologia" value="<?php echo @$parto2_uroginecologia ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Idade Materna</label>
                                        <input type="text" class="form-control" id="idade_materna2_uroginecologia" placeholder="Idade Materna" name="idade_materna2_uroginecologia" value="<?php echo @$idade_materna2_uroginecologia ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Peso da Criança</label>
                                        <input type="text" class="form-control" id="peso_da_crianca2_uroginecologia" placeholder="Peso da Criança" name="peso_da_crianca2_uroginecologia" value="<?php echo @$peso_da_crianca2_uroginecologia ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">3º Parto</label>
                                        <input type="text" class="form-control" id="parto3_uroginecologia" placeholder="Tipo" name="parto3_uroginecologia" value="<?php echo @$parto3_uroginecologia ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Idade Materna</label>
                                        <input type="text" class="form-control" id="idade_materna3_uroginecologia" placeholder="Idade Materna" name="idade_materna3_uroginecologia" value="<?php echo @$idade_materna3_uroginecologia ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Peso da Criança</label>
                                        <input type="text" class="form-control" id="peso_da_crianca3_uroginecologia" placeholder="Peso da Criança" name="peso_da_crianca3_uroginecologia" value="<?php echo @$peso_da_crianca3_uroginecologia ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Realizou episiotomia</label>
                                        <select class="form-control" id="realizou_episiotomia_uroginecologia " name="realizou_episiotomia_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $realizou_episiotomia_uroginecologia . '">' . $realizou_episiotomia_uroginecologia . '</option>';
                                            }
                                            ?>
                                            <?php if ($realizou_episiotomia_uroginecologia != 'sim')
                                                echo '<option value="sim">Sim</option>'; ?>
                                            <?php if ($realizou_episiotomia_uroginecologia != 'nao')
                                                echo '<option value="nao">Não</option>'; ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Usou fórceps?</label>
                                        <select class="form-control" id="forceps_uroginecologia " name="forceps_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $forceps_uroginecologia . '">' . $forceps_uroginecologia . '</option>';
                                            }
                                            ?>
                                            <?php if ($forceps_uroginecologia != 'sim')
                                                echo '<option value="sim">Sim</option>'; ?>
                                            <?php if ($forceps_uroginecologia != 'nao')
                                                echo '<option value="nao">Não</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Complicações Obstétricas</label>
                                <select class="form-control" id="complicacoes_obstetricas_uroginecologia " name="complicacoes_obstetricas_uroginecologia">
                                    <?php
                                    if (@$_GET['funcao'] == 'editar') {
                                        echo '<option value="' . $complicacoes_obstetricas_uroginecologia . '">' . $complicacoes_obstetricas_uroginecologia . '</option>';
                                    }
                                    ?>
                                    <?php if ($complicacoes_obstetricas_uroginecologia != 'laceração')
                                        echo '<option value="laceração">Laceração</option>'; ?>
                                    <?php if ($complicacoes_obstetricas_uroginecologia != 'aderências')
                                        echo '<option value="aderências">Aderências</option>'; ?>
                                    <?php if ($complicacoes_obstetricas_uroginecologia != 'quelóides')
                                        echo '<option value="quelóides">Quelóides</option>'; ?>
                                    <?php if ($complicacoes_obstetricas_uroginecologia != 'fibrose')
                                        echo '<option value="fibrose">Fibrose</option>'; ?>

                                </select>
                            </div>
                            <div class="modal-header">
                                <h5> História Ginecológia</h5>
                                <br>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Data da última menstruação (DUM)</label>
                                        <input type="date" class="form-control" id="data_da_ultima_menstruacao_uroginecologia" name="data_da_ultima_menstruacao_uroginecologia" value="<?php echo @$data_da_ultima_menstruacao_uroginecologia ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Menopausa?</label>
                                        <input type="date" class="form-control" id="menopausa_uroginecologia" name="menopausa_uroginecologia" value="<?php echo @$menopausa_uroginecologia ?>" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Método anticoncepcional?</label>
                                        <input type="text" class="form-control" id="metodo_anticoncepcional_uroginecologia" name="metodo_anticoncepcional_uroginecologia" placeholder="Sim ou Não? Qual?" value="<?php echo @$metodo_anticoncepcional_uroginecologia ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Terapia de reposição hormonal?</label>
                                        <input type="text" class="form-control" id="terapia_de_reposicao_hormonal_uroginecologia" name="terapia_de_reposicao_hormonal_uroginecologia" placeholder="Sim ou Não? Qual?" value="<?php echo @$terapia_de_reposicao_hormonal_uroginecologia ?>" required>
                                    </div>
                                </div>

                            </div>



                            <div class="form-group">
                                <label for="exampleFormControlInput1">Complicações ginecológicas</label>
                                <input type="text" class="form-control" id="complicacoes_ginecologicas_uroginecologia" name="complicacoes_ginecologicas_uroginecologia" placeholder="Dor pélvica crônica, cistos, corrimento e etc." value="<?php echo @$complicacoes_ginecologicas_uroginecologia ?>" required>
                            </div>



                            <div class="form-group">
                                <label for="exampleFormControlInput1">Realizou cirurgia ginecológica?</label>
                                <input type="text" class="form-control" id="realizou_cirurgia_ginecologica_uroginecologia" name="realizou_cirurgia_ginecologica_uroginecologia" placeholder="Sim ou Não? Qual?" value="<?php echo @$realizou_cirurgia_ginecologica_uroginecologia ?>" required>
                            </div>

                            <div class="modal-header">
                                <h5>Sexualidade</h5>
                                <br>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Auto conhecimento vaginal?</label>


                                        <select class="form-control" id="auto_conhecimento_vaginal_uroginecologia " name="auto_conhecimento_vaginal_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $auto_conhecimento_vaginal_uroginecologia . '">' . $auto_conhecimento_vaginal_uroginecologia . '</option>';
                                            }
                                            ?>
                                            <?php if ($auto_conhecimento_vaginal_uroginecologia != 'sim')
                                                echo '<option value="sim">Sim</option>'; ?>
                                            <?php if ($auto_conhecimento_vaginal_uroginecologia != 'nao')
                                                echo '<option value="nao">Não</option>'; ?>

                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Vida sexual</label>
                                        <input type="text" class="form-control" id="vida_sexual_uroginecologia" name="vida_sexual_uroginecologia" placeholder="Ativa ou Inativa? Diga a Frequência?" value="<?php echo @$vida_sexual_uroginecologia ?>" required>
                                    </div>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Perdeu a virgindade quando?</label>

                                        <input type="text" class="form-control" id="perdeu_a_virgindade_uroginecologia" name="perdeu_a_virgindade_uroginecologia" placeholder="Perdeu a virgindade quando?" value="<?php echo @$perdeu_a_virgindade_uroginecologia ?>" required>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Com quem?</label>
                                        <input type="text" class="form-control" id="com_quem_perdeu_a_virgindade_uroginecologia" name="com_quem_perdeu_a_virgindade_uroginecologia" placeholder="Com quem? " value="<?php echo @$com_quem_perdeu_a_virgindade_uroginecologia ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Como foi essa experiência?</label>

                                <textarea class="form-control" id="experiencia_a_virgindade_uroginecologia" name="experiencia_a_virgindade_uroginecologia" maxlength="300"><?php echo @$experiencia_a_virgindade_uroginecologia ?></textarea>
                            </div>



                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Você já sofreu algum abuso sexual?</label>


                                        <select class="form-control" id="abuso_sexual_uroginecologia " name="abuso_sexual_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $abuso_sexual_uroginecologia . '">' . $abuso_sexual_uroginecologia . '</option>';
                                            }
                                            ?>
                                            <?php if ($abuso_sexual_uroginecologia != 'sim')
                                                echo '<option value="sim">Sim</option>'; ?>
                                            <?php if ($abuso_sexual_uroginecologia != 'nao')
                                                echo '<option value="nao">Não</option>'; ?>

                                        </select>


                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Poderia relatar como foi?</label>
                                        <select class="form-control" id="permissao_abuso_sexual_uroginecologia " name="permissao_abuso_sexual_uroginecologia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $permissao_abuso_sexual_uroginecologia . '">' . $permissao_abuso_sexual_uroginecologia . '</option>';
                                            }
                                            ?>
                                            <?php if ($permissao_abuso_sexual_uroginecologia != 'sim')
                                                echo '<option value="sim">Sim</option>'; ?>
                                            <?php if ($permissao_abuso_sexual_uroginecologia != 'nao')
                                                echo '<option value="nao">Não</option>'; ?>

                                        </select>

                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Relato</label>

                                <textarea class="form-control" id="relato_abuso_sexual_uroginecologia" name="relato_abuso_sexual_uroginecologia" maxlength="300"><?php echo @$relato_abuso_sexual_uroginecologia ?></textarea>
                            </div>





                        </div>
                        <!-- FIM UROGINECOLOGIA -->


                        <div id="mensagem" class="">
                        </div>
                    </div>


                    <!-- ORTOPEDIA  -->
                    <div class="collapse" id="collapseORTOPEDIA">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5>ORTOPEDIA</h5>
                                <!-- collapseORTOPEDIA -->
                                <?php if (@$_GET['funcao'] == 'editar') {
                                    //BUSCAR DADOS DO REGISTRO A SER EDITADO
                                    $res = $pdo->query("select * from ficha_ortopedia where fkcpf = '$cpf'");
                                    $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                                    $historia_molestia_progressa_ortopedia = $dados[0]['historia_molestia_progressa_ortopedia'];
                                    $historia_molestia_atual_ortopedia = $dados[0]['historia_molestia_atual_ortopedia'];
                                    $historia_molestia_sintomas_ortopedia = $dados[0]['historia_molestia_sintomas_ortopedia'];
                                    $inspecao_ortopedia = $dados[0]['inspecao_ortopedia'];
                                    $obs_inspecao_ortopedia = $dados[0]['obs_inspecao_ortopedia'];

                                    //OMBRO
                                    $ombro_flexaoD_ortopedia = $dados[0]['ombro_flexaoD_ortopedia'];
                                    $ombro_flexaoE_ortopedia = $dados[0]['ombro_flexaoE_ortopedia'];
                                    $ombro_extensaoE_ortopedia = $dados[0]['ombro_extensaoE_ortopedia'];
                                    $ombro_extensaoD_ortopedia = $dados[0]['ombro_extensaoD_ortopedia'];
                                    $ombro_abducaoE_ortopedia  = $dados[0]['ombro_abducaoE_ortopedia'];
                                    $ombro_abducaoD_ortopedia  = $dados[0]['ombro_abducaoD_ortopedia'];
                                    $ombro_aducaoE_ortopedia  = $dados[0]['ombro_aducaoE_ortopedia'];
                                    $ombro_aducaoD_ortopedia  = $dados[0]['ombro_aducaoD_ortopedia'];
                                    $ombro_rotacaoInternaE_ortopedia = $dados[0]['ombro_rotacaoInternaE_ortopedia'];
                                    $ombro_rotacaoInternaD_ortopedia = $dados[0]['ombro_rotacaoInternaD_ortopedia'];
                                    $ombro_rotacaoExternaE_ortopedia = $dados[0]['ombro_rotacaoExternaE_ortopedia'];
                                    $ombro_rotacaoExternaD_ortopedia = $dados[0]['ombro_rotacaoExternaD_ortopedia'];
                                    
                                    //COTOVELO

                                    $cotovelo_flexaoE_ortopedia = $dados[0]['cotovelo_flexaoE_ortopedia'];
                                    $cotovelo_flexaoD_ortopedia = $dados[0]['cotovelo_flexaoD_ortopedia'];
                                    $cotovelo_extensaoE_ortopedia = $dados[0]['cotovelo_extensaoE_ortopedia'];
                                    $cotovelo_extensaoD_ortopedia = $dados[0]['cotovelo_extensaoD_ortopedia'];
                                    $cotovelo_pronocaoE_ortopedia = $dados[0]['cotovelo_pronocaoE_ortopedia'];
                                    $cotovelo_pronocaoD_ortopedia = $dados[0]['cotovelo_pronocaoD_ortopedia'];
                                    $cotovelo_supinacaoE_ortopedia = $dados[0]['cotovelo_supinacaoE_ortopedia'];
                                    $cotovelo_supinacaoD_ortopedia = $dados[0]['cotovelo_supinacaoD_ortopedia'];

                                    //PUNHO
                                    $punho_flexaoE_ortopedia = $dados[0]['punho_flexaoE_ortopedia'];
                                    $punho_flexaoD_ortopedia = $dados[0]['punho_flexaoD_ortopedia'];
                                    $punho_extensaoE_ortopedia = $dados[0]['punho_extensaoE_ortopedia'];
                                    $punho_extensaoD_ortopedia = $dados[0]['punho_extensaoD_ortopedia'];
                                    $punho_desvioUlnarE_ortopedia = $dados[0]['punho_desvioUlnarE_ortopedia'];
                                    $punho_desvioUlnarD_ortopedia = $dados[0]['punho_desvioUlnarD_ortopedia'];
                                    $punho_desvioRadialE_ortopedia = $dados[0]['punho_desvioRadialE_ortopedia'];
                                    $punho_desvioRadialD_ortopedia = $dados[0]['punho_desvioRadialD_ortopedia'];

                                    //TRONCO
                                    $tronco_flexaoE_ortopedia = $dados[0]['tronco_flexaoE_ortopedia'];
                                    $tronco_flexaoD_ortopedia = $dados[0]['tronco_flexaoD_ortopedia'];
                                    $tronco_rotacaoE_ortopedia = $dados[0]['tronco_rotacaoE_ortopedia'];
                                    $tronco_rotacaoD_ortopedia = $dados[0]['tronco_rotacaoD_ortopedia'];
                                    $tronco_extensaoE_ortopedia = $dados[0]['tronco_extensaoE_ortopedia'];
                                    $tronco_extensaoD_ortopedia = $dados[0]['tronco_extensaoD_ortopedia'];

                                    //QUADRIL
                                    $quadril_flexaoE_ortopedia = $dados[0]['quadril_flexaoE_ortopedia'];
                                    $quadril_flexaoD_ortopedia = $dados[0]['quadril_flexaoD_ortopedia'];
                                    $quadril_extensaoE_ortopedia = $dados[0]['quadril_extensaoE_ortopedia'];
                                    $quadril_extensaoD_ortopedia = $dados[0]['quadril_extensaoD_ortopedia'];
                                    $quadril_abducaoE_ortopedia = $dados[0]['quadril_abducaoE_ortopedia'];
                                    $quadril_abducaoD_ortopedia = $dados[0]['quadril_abducaoD_ortopedia'];
                                    $quadril_aducaoE_ortopedia = $dados[0]['quadril_aducaoE_ortopedia'];
                                    $quadril_aducaoD_ortopedia = $dados[0]['quadril_aducaoD_ortopedia'];
                                    $quadril_rotacaoInternaE_ortopedia = $dados[0]['quadril_rotacaoInternaE_ortopedia'];
                                    $quadril_rotacaoInternaD_ortopedia = $dados[0]['quadril_rotacaoInternaD_ortopedia'];
                                    $quadril_rotacaoExternaE_ortopedia = $dados[0]['quadril_rotacaoExternaE_ortopedia'];
                                    $quadril_rotacaoExternaD_ortopedia = $dados[0]['quadril_rotacaoExternaD_ortopedia'];

                                    //JOELHO
                                    $joelho_flexaoE_ortopedia = $dados[0]['joelho_flexaoE_ortopedia'];
                                    $joelho_flexaoD_ortopedia = $dados[0]['joelho_flexaoD_ortopedia'];
                                    $joelho_extensaoE_ortopedia = $dados[0]['joelho_extensaoE_ortopedia'];
                                    $joelho_extensaoD_ortopedia = $dados[0]['joelho_extensaoD_ortopedia'];

                                    //TORNOZELO
                                    $tornozelo_dorsiflexaoE_ortopedia = $dados[0]['tornozelo_dorsiflexaoE_ortopedia'];
                                    $tornozelo_dorsiflexaoD_ortopedia = $dados[0]['tornozelo_dorsiflexaoD_ortopedia'];
                                    $tornozelo_plantiflexaoE_ortopedia = $dados[0]['tornozelo_plantiflexaoE_ortopedia'];
                                    $tornozelo_plantiflexaoD_ortopedia = $dados[0]['tornozelo_plantiflexaoD_ortopedia'];


                                    //REFLEXOS
                                    $estilrradialE_ortopedia = $dados[0]['estilrradialE_ortopedia'];
                                    $estilrradialD_ortopedia = $dados[0]['estilrradialD_ortopedia'];
                                    $bicipitalE_ortopedia = $dados[0]['bicipitalE_ortopedia'];
                                    $bicipitalD_ortopedia = $dados[0]['bicipitalD_ortopedia'];
                                    $tricipitalE_ortopedia = $dados[0]['tricipitalE_ortopedia'];
                                    $tricipitalD_ortopedia = $dados[0]['tricipitalD_ortopedia'];
                                    $patelarE_ortopedia = $dados[0]['patelarE_ortopedia'];
                                    $patelarD_ortopedia = $dados[0]['patelarD_ortopedia'];
                                    $aquileuE_ortopedia = $dados[0]['aquileuE_ortopedia'];
                                    $aquileuD_ortopedia = $dados[0]['aquileuD_ortopedia'];
                                    $babisnkiE_ortopedia = $dados[0]['babisnkiE_ortopedia'];
                                    $babisnkiD_ortopedia = $dados[0]['babisnkiD_ortopedia'];
                                    $cutaneoAbdominalE_ortopedia = $dados[0]['cutaneoAbdominalE_ortopedia'];
                                    $cutaneoAbdominalD_ortopedia = $dados[0]['cutaneoAbdominalD_ortopedia'];
                                    $sinaisDeAutotismoMedularE_ortopedia = $dados[0]['sinaisDeAutotismoMedularE_ortopedia'];
                                    $sinaisDeAutotismoMedularD_ortopedia = $dados[0]['sinaisDeAutotismoMedularD_ortopedia'];
                                    $impulsoExtensorE_ortopedia = $dados[0]['impulsoExtensorE_ortopedia'];
                                    $impulsoExtensorD_ortopedia = $dados[0]['impulsoExtensorD_ortopedia'];
                                    $tripliceFlexaoE_ortopedia = $dados[0]['tripliceFlexaoE_ortopedia'];
                                    $tripliceFlexaoD_ortopedia = $dados[0]['tripliceFlexaoD_ortopedia'];
                                    $sincinesiasE_ortopedia = $dados[0]['sincinesiasE_ortopedia'];
                                    $sincinesiasD_ortopedia = $dados[0]['sincinesiasD_ortopedia'];

                                    //Mudança de Decúbito
                                    $decubito1_ortopedia = $dados[0]['decubito1_ortopedia'];
                                    $decubito2_ortopedia = $dados[0]['decubito2_ortopedia'];
                                    $decubito3_ortopedia = $dados[0]['decubito3_ortopedia'];
                                    $decubito4_ortopedia = $dados[0]['decubito4_ortopedia'];
                                    $decubito5_ortopedia = $dados[0]['decubito5_ortopedia'];

                                    //Neurovegetativas
                                    $cardiopulmonar_ortopedia = $dados[0]['cardiopulmonar_ortopedia'];
                                    $genitoUrinaria_ortopedia = $dados[0]['genitoUrinaria_ortopedia'];
                                    $outros_ortopedia = $dados[0]['outros_ortopedia'];                   
                                    $examesComplementares_ortopedia = $dados[0]['examesComplementares_ortopedia'];
                                    $objetivo_ortopedia = $dados[0]['objetivo_ortopedia'];
                                    $conduta_ortopedia = $dados[0]['conduta_ortopedia'];

                              
                                } ?>
                                <h3>História da Moléstia</h3>
                            </div>
                            <br>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Pregressa</label>
                            <textarea class="form-control" id="historia_molestia_progressa_ortopedia" name="historia_molestia_progressa_ortopedia" maxlength="300"><?php echo @$historia_molestia_progressa_ortopedia ?></textarea>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Atual</label>
                            <textarea class="form-control" id="historia_molestia_atual_ortopedia" name="historia_molestia_atual_ortopedia" maxlength="300"><?php echo @$historia_molestia_atual_ortopedia ?></textarea>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">Inspeção</label>
                            <textarea class="form-control" id="historia_molestia_sintomas_ortopedia" name="historia_molestia_sintomas_ortopedia" maxlength="300"><?php echo @$historia_molestia_sintomas_ortopedia ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Poderia relatar como foi?</label>
                            <select class="form-control" id="inspecao_ortopedia " name="inspecao_ortopedia">
                                <?php
                                if (@$_GET['funcao'] == 'editar') {
                                    echo '<option value="' . $inspecao_ortopedia . '">' . $inspecao_ortopedia . '</option>';
                                }
                                ?>
                                <?php if ($inspecao_ortopedia != 'Coluna Vertical')
                                    echo '<option value="Coluna Vertical">Coluna Vertical</option>'; ?>
                                <?php if ($inspecao_ortopedia != 'Temperatura')
                                    echo '<option value="Temperatura">Temperatura</option>'; ?>
                                <?php if ($inspecao_ortopedia != 'Estado de Nutrição')
                                    echo '<option value="Estado de Nutrição">Estado de Nutrição.</option>'; ?>
                                <?php if ($inspecao_ortopedia != 'Respiração')
                                    echo '<option value="Respiração">Respiração</option>'; ?>
                                <?php if ($inspecao_ortopedia != 'Fáceis')
                                    echo '<option value="Fáceis">Fáceis</option>'; ?>
                                <?php if ($inspecao_ortopedia != 'Trofismo')
                                    echo '<option value="Fáceis">Trofismo</option>'; ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" id="obs_inspecao_ortopedia" name="obs_inspecao_ortopedia" maxlength="300"><?php echo @$obs_inspecao_ortopedia ?></textarea>
                        </div>

                        <div class="modal-header">
                            <h5>
                                <a data-toggle="collapse" href="#forcaMuscular-ortopedia" aria-expanded="false" aria-controls="forcaMuscular-ortopedia">Força Muscular</a>
                            </h5>

                            <br>
                        </div>
                        <div class="collapse" id="forcaMuscular-ortopedia">
                        <div class="form-group">
                            Obs: A força muscular necessita da compreenssão do paciente a frente à solicitção do movimento. <br>
                        </div>
                        <div class="form-group">
                            Realizar se possivel o teste, caso não seja possivel observar a movimento espontânea.<br>
                        </div>
                        <div class="modal-header">
                            <h5><a data-toggle="collapse" href="#ombro" aria-expanded="false" aria-controls="ombro"> Ombro</a></h5>
                            <br>
                        </div>
                        <div class="collapse" id="ombro">
                            <!-- FLEXAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão E</label>
                                        <select class="form-control" id="ombro_flexaoE_ortopedia " name="ombro_flexaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_flexaoE_ortopedia . '">' . $ombro_flexaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_flexaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>

                                            <?php if ($ombro_flexaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                                
                                            <?php if ($ombro_flexaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_flexaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_flexaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_flexaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão D</label>

                                        <select class="form-control" id="ombro_flexaoD_ortopedia " name="ombro_flexaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_flexaoD_ortopedia . '">' . $ombro_flexaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_flexaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_flexaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_flexaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_flexaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_flexaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_flexaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM FLEXAO -->

                            <!-- EXTENSAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão E</label>
                                        <select class="form-control" id="ombro_extensaoE_ortopedia " name="ombro_extensaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_extensaoE_ortopedia . '">' . $ombro_extensaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_extensaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_extensaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_extensaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_extensaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_extensaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_extensaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão D</label>

                                        <select class="form-control" id="ombro_extensaoD_ortopedia " name="ombro_extensaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_extensaoD_ortopedia . '">' . $ombro_extensaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_extensaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_extensaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_extensaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_extensaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_extensaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_extensaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM EXTENSAO -->

                            <!-- ABDUÇÃO -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Abdução E</label>
                                        <select class="form-control" id="ombro_abducaoE_ortopedia " name="ombro_abducaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_abducaoE_ortopedia . '">' . $ombro_abducaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_abducaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_abducaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_abducaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_abducaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_abducaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_abducaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Abdução D</label>

                                        <select class="form-control" id="ombro_abducaoD_ortopedia " name="ombro_abducaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_abducaoD_ortopedia . '">' . $ombro_abducaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_abducaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_abducaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_abducaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_abducaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_abducaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_abducaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ABDUÇÃO -->

                            <!-- FIM ADUÇÃO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Adução E</label>
                                        <select class="form-control" id="ombro_aducaoE_ortopedia " name="ombro_aducaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_aducaoE_ortopedia . '">' . $ombro_aducaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_aducaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_aducaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_aducaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_aducaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_aducaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_aducaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Adução D</label>

                                        <select class="form-control" id="ombro_aducaoD_ortopedia " name="ombro_aducaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_aducaoD_ortopedia . '">' . $ombro_aducaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_aducaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_aducaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_aducaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_aducaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_aducaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_aducaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ADUÇÃO -->

                            <!-- ROTAÇÃO INTERNA -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rotação Interna E</label>
                                        <select class="form-control" id="ombro_rotacaoInternaE_ortopedia " name="ombro_rotacaoInternaE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_rotacaoInternaE_ortopedia . '">' . $ombro_rotacaoInternaE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_rotacaoInternaE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_rotacaoInternaE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_rotacaoInternaE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_rotacaoInternaE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_rotacaoInternaE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_rotacaoInternaE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rotação Interna D</label>

                                        <select class="form-control" id="ombro_rotacaoInternaD_ortopedia " name="ombro_rotacaoInternaD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_rotacaoInternaD_ortopedia . '">' . $ombro_rotacaoInternaD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_rotacaoInternaD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_rotacaoInternaD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_rotacaoInternaD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_rotacaoInternaD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_rotacaoInternaD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_rotacaoInternaD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ROTAÇÃO INTERNA -->

                            <!-- ROTAÇÃO EXTERNA -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rotação Externa E</label>
                                        <select class="form-control" id="ombro_rotacaoExternaE_ortopedia " name="ombro_rotacaoExternaE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_rotacaoExternaE_ortopedia . '">' . $ombro_rotacaoExternaE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_rotacaoExternaE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_rotacaoExternaE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_rotacaoExternaE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_rotacaoExternaE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_rotacaoExternaE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_rotacaoExternaE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rotação Externa D</label>

                                        <select class="form-control" id="ombro_rotacaoExternaD_ortopedia " name="ombro_rotacaoExternaD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_rotacaoExternaD_ortopedia . '">' . $ombro_rotacaoExternaD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_rotacaoExternaD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_rotacaoExternaD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_rotacaoExternaD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_rotacaoExternaD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_rotacaoExternaD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_rotacaoExternaD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ROTAÇÃO EXTERNA -->
                            <!-- FIM OMBRO -->
                        </div>
                        
                        <div class="modal-header">
                            <h5><a data-toggle="collapse" href="#cotovelo" aria-expanded="false" aria-controls="cotovelo">Cotovelo</a></h5>
                            <br>
                        </div>
                        <!-- FLEXAO -->
                        <div class="collapse" id="cotovelo">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão E</label>
                                        <select class="form-control" id="cotovelo_flexaoE_ortopedia " name="cotovelo_flexaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $cotovelo_flexaoE_ortopedia . '">' . $cotovelo_flexaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($cotovelo_flexaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($cotovelo_flexaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($cotovelo_flexaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $cotovelo_flexaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($cotovelo_flexaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($cotovelo_flexaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão D</label>

                                        <select class="form-control" id="cotovelo_flexaoD_ortopedia " name="cotovelo_flexaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $cotovelo_flexaoD_ortopedia . '">' . $cotovelo_flexaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($cotovelo_flexaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($cotovelo_flexaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($cotovelo_flexaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $cotovelo_flexaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($cotovelo_flexaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($cotovelo_flexaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM FLEXAO -->

                            <!-- EXTENSAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão E</label>
                                        <select class="form-control" id="cotovelo_extensaoE_ortopedia " name="cotovelo_extensaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $cotovelo_extensaoE_ortopedia . '">' . $cotovelo_extensaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($cotovelo_extensaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($cotovelo_extensaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($cotovelo_extensaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $cotovelo_extensaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($cotovelo_extensaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($cotovelo_extensaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão D</label>

                                        <select class="form-control" id="ombro_extensaoD_ortopedia " name="ombro_extensaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $cotovelo_extensaoD_ortopedia . '">' . $cotovelo_extensaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($cotovelo_extensaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($cotovelo_extensaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($cotovelo_extensaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $cotovelo_extensaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($cotovelo_extensaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($cotovelo_extensaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM EXTENSAO -->

                            <!-- PRONAÇÃO -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Pronação E</label>
                                        <select class="form-control" id="cotovelo_pronocaoE_ortopedia " name="cotovelo_pronocaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $cotovelo_pronocaoE_ortopedia . '">' . $cotovelo_pronocaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($cotovelo_pronocaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($cotovelo_pronocaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($cotovelo_pronocaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $cotovelo_pronocaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($cotovelo_pronocaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($cotovelo_pronocaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Pronação D</label>

                                        <select class="form-control" id="cotovelo_pronocaoD_ortopedia " name="cotovelo_pronocaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $cotovelo_pronocaoD_ortopedia . '">' . $cotovelo_pronocaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($cotovelo_pronocaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($cotovelo_pronocaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($cotovelo_pronocaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $cotovelo_pronocaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($cotovelo_pronocaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($cotovelo_pronocaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM PRONAÇÃO -->

                            <!-- FIM SUPINACAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Supinação E</label>
                                        <select class="form-control" id="cotovelo_supinacaoE_ortopedia " name="cotovelo_supinacaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $cotovelo_supinacaoE_ortopedia . '">' . $cotovelo_supinacaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($cotovelo_supinacaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($cotovelo_supinacaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($cotovelo_supinacaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $cotovelo_supinacaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($cotovelo_supinacaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($cotovelo_supinacaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Supinação D</label>

                                        <select class="form-control" id="cotovelo_supinacaoD_ortopedia " name="cotovelo_supinacaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $cotovelo_supinacaoD_ortopedia . '">' . $cotovelo_supinacaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($cotovelo_supinacaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($cotovelo_supinacaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($cotovelo_supinacaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $cotovelo_supinacaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($cotovelo_supinacaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($cotovelo_supinacaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM SUPINAÇÃO -->
                        </div>

                        <div class="modal-header">
                            <h5><a data-toggle="collapse" href="#punho" aria-expanded="false" aria-controls="punho">Punho</a></h5>
                            <br>
                        </div>
                        
                        <div class="collapse" id="punho">
                            <!-- FLEXAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão E</label>
                                        <select class="form-control" id="punho_flexaoE_ortopedia " name="punho_flexaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $punho_flexaoE_ortopedia . '">' . $punho_flexaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($punho_flexaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($punho_flexaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($punho_flexaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $punho_flexaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($punho_flexaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($punho_flexaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão D</label>

                                        <select class="form-control" id="punho_flexaoD_ortopedia " name="punho_flexaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $punho_flexaoD_ortopedia . '">' . $punho_flexaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($punho_flexaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($punho_flexaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($punho_flexaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $punho_flexaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($punho_flexaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($punho_flexaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM FLEXAO -->

                            <!-- EXTENSAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão E</label>
                                        <select class="form-control" id="punho_extensaoE_ortopedia " name="punho_extensaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $punho_extensaoE_ortopedia . '">' . $punho_extensaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($punho_extensaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($punho_extensaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($punho_extensaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $punho_extensaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($punho_extensaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($punho_extensaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão D</label>

                                        <select class="form-control" id="punho_extensaoD_ortopedia " name="punho_extensaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $punho_extensaoD_ortopedia . '">' . $punho_extensaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($punho_extensaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($punho_extensaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($punho_extensaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $punho_extensaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($punho_extensaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($punho_extensaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>


                            </div>
                            <!-- FIM EXTENSAO -->

                            <!-- DESVIO ULNAR -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Desvio Ulnar E</label>
                                        <select class="form-control" id="punho_desvioUlnarE_ortopedia " name="punho_desvioUlnarE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $punho_desvioUlnarE_ortopedia . '">' . $punho_desvioUlnarE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($punho_desvioUlnarE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($punho_desvioUlnarE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($punho_desvioUlnarE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $punho_desvioUlnarE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($punho_desvioUlnarE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($punho_desvioUlnarE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Desvio Ulnar D</label>

                                        <select class="form-control" id="punho_desvioUlnarD_ortopedia " name="punho_desvioUlnarD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $punho_desvioUlnarD_ortopedia . '">' . $punho_desvioUlnarD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($punho_desvioUlnarD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($punho_desvioUlnarD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($punho_desvioUlnarD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $punho_desvioUlnarD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($punho_desvioUlnarD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($punho_desvioUlnarD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM DESVIO ULNAR -->

                            <!-- DESVIO RADIAL -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Desvio Radial E</label>
                                        <select class="form-control" id="punho_desvioRadialE_ortopedia " name="punho_desvioRadialE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $punho_desvioRadialE_ortopedia . '">' . $punho_desvioRadialE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($punho_desvioRadialE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($punho_desvioRadialE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($punho_desvioRadialE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $punho_desvioRadialE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($punho_desvioRadialE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($punho_desvioRadialE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Desvio Radial D</label>

                                        <select class="form-control" id="punho_desvioRadialD_ortopedia " name="punho_desvioRadialD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $punho_desvioRadialD_ortopedia . '">' . $punho_desvioRadialD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($punho_desvioRadialD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($punho_desvioRadialD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($punho_desvioRadialD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $punho_desvioRadialD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($punho_desvioRadialD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($punho_desvioRadialD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- FIM DESVIO RADIAL -->


                        <div class="modal-header">
                            <h5><a data-toggle="collapse" href="#tronco" aria-expanded="false" aria-controls="tronco">Tronco</a></h5>
                            <br>
                        </div>

                        <div class="collapse" id="tronco">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão E</label>
                                        <select class="form-control" id="tronco_flexaoE_ortopedia " name="tronco_flexaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tronco_flexaoE_ortopedia . '">' . $tronco_flexaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($tronco_flexaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($tronco_flexaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($tronco_flexaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $tronco_flexaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($tronco_flexaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($tronco_flexaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão D</label>

                                        <select class="form-control" id="tronco_flexaoD_ortopedia " name="tronco_flexaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tronco_flexaoD_ortopedia . '">' . $tronco_flexaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($tronco_flexaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($tronco_flexaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($tronco_flexaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $tronco_flexaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($tronco_flexaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($tronco_flexaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM FLEXAO -->

                            <!-- ROTACAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rotação E</label>
                                        <select class="form-control" id="tronco_rotacaoE_ortopedia " name="tronco_rotacaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tronco_rotacaoE_ortopedia . '">' . $tronco_rotacaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($tronco_rotacaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($tronco_rotacaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($tronco_rotacaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                            ">(2) Há movimento somente na ausência de gravidade.
                                            </option>'; ?>
                                            <?php if (
                                                $tronco_rotacaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                            ">(3) Consegue realizar movimento vencendo a gravidade.
                                            </option>'; ?>
                                            <?php if ($tronco_rotacaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($tronco_rotacaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rotação D</label>

                                        <select class="form-control" id="tronco_rotacaoD_ortopedia " name="tronco_rotacaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tronco_rotacaoD_ortopedia . '">' . $tronco_rotacaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($tronco_rotacaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($tronco_rotacaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($tronco_rotacaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                            ">(2) Há movimento somente na ausência de gravidade.
                                            </option>'; ?>
                                            <?php if (
                                                $tronco_rotacaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                            ">(3) Consegue realizar movimento vencendo a gravidade.
                                            </option>'; ?>
                                            <?php if ($tronco_rotacaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($tronco_rotacaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                                 <!-- FIM ROTACAO -->
                            <!-- EXTENSAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão E</label>
                                        <select class="form-control" id="tronco_extensaoE_ortopedia " name="tronco_extensaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tronco_extensaoE_ortopedia . '">' . $tronco_extensaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($tronco_extensaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($tronco_extensaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($tronco_extensaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                            ">(2) Há movimento somente na ausência de gravidade.
                                            </option>'; ?>
                                            <?php if (
                                                $tronco_extensaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                            ">(3) Consegue realizar movimento vencendo a gravidade.
                                            </option>'; ?>
                                            <?php if ($tronco_extensaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($tronco_extensaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão D</label>

                                        <select class="form-control" id="tronco_extensaoD_ortopedia " name="tronco_extensaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tronco_extensaoD_ortopedia . '">' . $tronco_extensaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($tronco_extensaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($tronco_extensaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($tronco_extensaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                            ">(2) Há movimento somente na ausência de gravidade.
                                            </option>'; ?>
                                            <?php if (
                                                $tronco_extensaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                            ">(3) Consegue realizar movimento vencendo a gravidade.
                                            </option>'; ?>
                                            <?php if ($tronco_extensaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($tronco_extensaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                                 <!-- FIM ROTAÇÃO -->
                            

                        
                        </div>
                       
                        <div class="modal-header">
                            <h5><a data-toggle="collapse" href="#quadril" aria-expanded="false" aria-controls="quadril">Quadril</a></h5>
                            <br>
                        </div>
                        
                        <div class="collapse" id="quadril">
                            <!-- FLEXAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão E</label>
                                        <select class="form-control" id="quadril_flexaoE_ortopedia " name="quadril_flexaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_flexaoE_ortopedia . '">' . $quadril_flexaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_flexaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>

                                            <?php if ($quadril_flexaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                                
                                            <?php if ($quadril_flexaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_flexaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_flexaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_flexaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão D</label>

                                        <select class="form-control" id="quadril_flexaoD_ortopedia " name="quadril_flexaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_flexaoD_ortopedia . '">' . $quadril_flexaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_flexaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($quadril_flexaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($quadril_flexaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_flexaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_flexaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_flexaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM FLEXAO -->

                            <!-- EXTENSAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão E</label>
                                        <select class="form-control" id="quadril_extensaoE_ortopedia " name="quadril_extensaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_extensaoE_ortopedia . '">' . $quadril_extensaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_extensaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($quadril_extensaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($quadril_extensaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_extensaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_extensaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_extensaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão D</label>

                                        <select class="form-control" id="quadril_extensaoD_ortopedia " name="quadril_extensaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_extensaoD_ortopedia . '">' . $quadril_extensaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_extensaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($quadril_extensaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($quadril_extensaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_extensaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_extensaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_extensaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM EXTENSAO -->

                            <!-- ABDUÇÃO -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Abdução E</label>
                                        <select class="form-control" id="quadril_abducaoE_ortopedia " name="quadril_abducaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_abducaoE_ortopedia . '">' . $quadril_abducaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_abducaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($quadril_abducaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($quadril_abducaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_abducaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_abducaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_abducaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Abdução D</label>

                                        <select class="form-control" id="quadril_abducaoD_ortopedia " name="quadril_abducaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_abducaoD_ortopedia . '">' . $quadril_abducaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_abducaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($quadril_abducaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($quadril_abducaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_abducaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_abducaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_abducaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ABDUÇÃO -->

                            <!-- FIM ADUÇÃO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Adução E</label>
                                        <select class="form-control" id="quadril_aducaoE_ortopedia " name="quadril_aducaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_aducaoE_ortopedia . '">' . $quadril_aducaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_aducaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($quadril_aducaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($quadril_aducaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_aducaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_aducaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_aducaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Adução D</label>

                                        <select class="form-control" id="quadril_aducaoD_ortopedia " name="quadril_aducaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_aducaoD_ortopedia . '">' . $quadril_aducaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_aducaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($quadril_aducaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($quadril_aducaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_aducaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_aducaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_aducaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ADUÇÃO -->

                            <!-- ROTAÇÃO INTERNA -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rotação Interna E</label>
                                        <select class="form-control" id="quadril_rotacaoInternaE_ortopedia " name="quadril_rotacaoInternaE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_rotacaoInternaE_ortopedia . '">' . $quadril_rotacaoInternaE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_rotacaoInternaE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($quadril_rotacaoInternaE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($quadril_rotacaoInternaE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_rotacaoInternaE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_rotacaoInternaE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_rotacaoInternaE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rotação Interna D</label>

                                        <select class="form-control" id="quadril_rotacaoInternaD_ortopedia " name="quadril_rotacaoInternaD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_rotacaoInternaD_ortopedia . '">' . $quadril_rotacaoInternaD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_rotacaoInternaD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($quadril_rotacaoInternaD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($quadril_rotacaoInternaD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_rotacaoInternaD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_rotacaoInternaD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_rotacaoInternaD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ROTAÇÃO INTERNA -->

                            <!-- ROTAÇÃO EXTERNA -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rotação Externa E</label>
                                        <select class="form-control" id="quadril_rotacaoExternaE_ortopedia " name="quadril_rotacaoExternaE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $quadril_rotacaoExternaE_ortopedia . '">' . $quadril_rotacaoExternaE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($quadril_rotacaoExternaE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($quadril_rotacaoExternaE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($quadril_rotacaoExternaE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $quadril_rotacaoExternaE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($quadril_rotacaoExternaE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($quadril_rotacaoExternaE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Rotação Externa D</label>

                                        <select class="form-control" id="quadril_rotacaoExternaD_ortopedia " name="quadril_rotacaoExternaD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $ombro_rotacaoExternaD_ortopedia . '">' . $ombro_rotacaoExternaD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($ombro_rotacaoExternaD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($ombro_rotacaoExternaD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($ombro_rotacaoExternaD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                    ">(2) Há movimento somente na ausência de gravidade.
                                                    </option>'; ?>
                                            <?php if (
                                                $ombro_rotacaoExternaD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
    '
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                    ">(3) Consegue realizar movimento vencendo a gravidade.
                                                    </option>'; ?>
                                            <?php if ($ombro_rotacaoExternaD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($ombro_rotacaoExternaD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM ROTAÇÃO EXTERNA -->
                           
                        </div>
                        <!-- FIM QUADRIL -->

                        <div class="modal-header">
                            <h5><a data-toggle="collapse" href="#joelho" aria-expanded="false" aria-controls="quadril">Joelho</a></h5>
                            <br>
                        </div>

                        <div class="collapse" id="joelho">
                             <!-- FLEXAO -->
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão E</label>
                                        <select class="form-control" id="joelho_flexaoE_ortopedia " name="joelho_flexaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $joelho_flexaoE_ortopedia . '">' . $joelho_flexaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($joelho_flexaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($joelho_flexaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($joelho_flexaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $joelho_flexaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($joelho_flexaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($joelho_flexaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Flexão D</label>

                                        <select class="form-control" id="joelho_flexaoD_ortopedia " name="joelho_flexaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $joelho_flexaoD_ortopedia . '">' . $joelho_flexaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($joelho_flexaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($joelho_flexaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($joelho_flexaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $joelho_flexaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($joelho_flexaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($joelho_flexaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM FLEXAO -->

                            <!-- EXTENSAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão E</label>
                                        <select class="form-control" id="joelho_extensaoE_ortopedia " name="joelho_extensaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $joelho_extensaoE_ortopedia . '">' . $joelho_extensaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($joelho_extensaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($joelho_extensaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($joelho_extensaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $joelho_extensaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($joelho_extensaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($joelho_extensaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Extensão D</label>

                                        <select class="form-control" id="joelho_extensaoD_ortopedia " name="joelho_extensaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $joelho_extensaoD_ortopedia . '">' . $joelho_extensaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($joelho_extensaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($joelho_extensaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($joelho_extensaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $joelho_extensaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($joelho_extensaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($joelho_extensaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>


                            </div>
                            <!-- FIM EXTENSAO -->
                        </div>


                        <div class="modal-header">
                            <h5><a data-toggle="collapse" href="#tornozelo" aria-expanded="false" aria-controls="tornozelo">Tornozelo</a></h5>
                            <br>
                        </div>

                        <div class="collapse" id="tornozelo">
                             <!-- FLEXAO -->
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Dorsiflexão E</label>
                                        <select class="form-control" id="tornozelo_dorsiflexaoE_ortopedia " name="tornozelo_dorsiflexaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tornozelo_dorsiflexaoE_ortopedia . '">' . $tornozelo_dorsiflexaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($tornozelo_dorsiflexaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($tornozelo_dorsiflexaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($tornozelo_dorsiflexaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $tornozelo_dorsiflexaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($tornozelo_dorsiflexaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($tornozelo_dorsiflexaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Dorsiflexão D</label>

                                        <select class="form-control" id="tornozelo_dorsiflexaoD_ortopedia " name="tornozelo_dorsiflexaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tornozelo_dorsiflexaoD_ortopedia . '">' . $tornozelo_dorsiflexaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($tornozelo_dorsiflexaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($tornozelo_dorsiflexaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($tornozelo_dorsiflexaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $tornozelo_dorsiflexaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($tornozelo_dorsiflexaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($tornozelo_dorsiflexaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM FLEXAO -->

                            <!-- EXTENSAO -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Plantiflexão E</label>
                                        <select class="form-control" id="tornozelo_plantiflexaoE_ortopedia " name="tornozelo_plantiflexaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tornozelo_plantiflexaoE_ortopedia . '">' . $tornozelo_plantiflexaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($tornozelo_plantiflexaoE_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($tornozelo_plantiflexaoE_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($tornozelo_plantiflexaoE_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $tornozelo_plantiflexaoE_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($tornozelo_plantiflexaoE_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($tornozelo_plantiflexaoE_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Plantiflexão D</label>

                                        <select class="form-control" id="tornozelo_plantiflexaoD_ortopedia " name="tornozelo_plantiflexaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tornozelo_plantiflexaoD_ortopedia . '">' . $tornozelo_plantiflexaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                            <?php if ($tornozelo_plantiflexaoD_ortopedia != '(0) Ausencia de Contração.')
                                                echo '<option value="(0) Ausencia de Contração.">(0) Ausencia de Contração.</option>'; ?>
                                            <?php if ($tornozelo_plantiflexaoD_ortopedia != '(1) Há uma leve contração porém incapaz de produzir movimento.')
                                                echo '<option value="(1) Há uma leve contração porém incapaz de produzir movimento.">(1) Há uma leve contração porém incapaz de produzir movimento.</option>'; ?>
                                            <?php if ($tornozelo_plantiflexaoD_ortopedia != '(2) Há movimento somente na ausência de gravidade.')
                                                echo '<option value="(2) Há movimento somente na ausência de gravidade.
                                                ">(2) Há movimento somente na ausência de gravidade.
                                                </option>'; ?>
                                            <?php if (
                                                $tornozelo_plantiflexaoD_ortopedia != '(3) Consegue realizar movimento vencendo a gravidade.
'
                                            )
                                                echo '<option value="(3) Consegue realizar movimento vencendo a gravidade.
                                                ">(3) Consegue realizar movimento vencendo a gravidade.
                                                </option>'; ?>
                                            <?php if ($tornozelo_plantiflexaoD_ortopedia != '(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.')
                                                echo '<option value="(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.">(4) Consegue realizar movimento vencendo a gravidade e também uma resistência externa.</option>'; ?>
                                            <?php if ($tornozelo_plantiflexaoD_ortopedia != '(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.')
                                                echo '<option value="(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.">(5) Consegue realizar movimento superando uma resistencia maior que o musculo bom.</option>'; ?>

                                        </select>
                                    </div>
                                </div>


                            </div>
                            <!-- FIM EXTENSAO -->
                        </div>
                    </div>

                        <!-- FIM FORÇA MUSCULAR -->

                        <div class="modal-header">
                            <h5>
                                <a data-toggle="collapse" href="#reflexos" aria-expanded="false" aria-controls="reflexos">Reflexos</a>
                            </h5>
                            <br>
                        </div>
                        <div class="collapse" id="reflexos">
                            <div class="form-group">
                            Para testar os reflexos deve-se utilizar o martelo de percussão para determinar sua amplitude.<br>
                        </div>
                        <h5>Reflexos Profundos</h5>
                            <br>      
                         <!-- Estilrradial -->
                         <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Estilrradial E</label>
                                        <select class="form-control" id="estilrradialE_ortopedia" name="estilrradialE_ortopedia">
                                        <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $estilrradialE_ortopedia . '">' . $estilrradialE_ortopedia . '</option>';
                                            }
                                            ?>
                                           
                                            <?php if ($estilrradialE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($estilrradialE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($estilrradialE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($estilrradialE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Estilrradial D</label>

                                        <select class="form-control" id="estilrradialD_ortopedia " name="estilrradialD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $estilrradialD_ortopedia . '">' . $estilrradialD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($estilrradialD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($estilrradialD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($estilrradialD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($estilrradialD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM Estilrradial -->

                         <!-- Bicipital -->
                         <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Bicipital E</label>
                                        <select class="form-control" id="bicipitalE_ortopedia " name="bicipitalE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $bicipitalE_ortopedia . '">' . $bicipitalE_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($bicipitalE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($bicipitalE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($bicipitalE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($bicipitalE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Bicipital D</label>

                                        <select class="form-control" id="bicipitalD_ortopedia " name="bicipitalD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $bicipitalD_ortopedia . '">' . $bicipitalD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($bicipitalD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($bicipitalD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($bicipitalD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($bicipitalD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM bicipital -->


                         <!-- Tricipital -->
                         <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tricipital E</label>
                                        <select class="form-control" id="tricipitalE_ortopedia " name="tricipitalE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tricipitalE_ortopedia . '">' . $tricipitalE_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($tricipitalE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($tricipitalE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($tricipitalE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($tricipitalE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tricipital D</label>

                                        <select class="form-control" id="tricipitalD_ortopedia " name="tricipitalD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tricipitalD_ortopedia . '">' . $tricipitalD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($tricipitalD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($tricipitalD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($tricipitalD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($tricipitalD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM Tricipital -->

                         <!-- Patelar -->
                         <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Patelar E</label>
                                        <select class="form-control" id="patelarE_ortopedia " name="patelarE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $patelarE_ortopedia . '">' . $patelarE_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($patelarE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($patelarE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($patelarE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($patelarE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Patelar D</label>

                                        <select class="form-control" id="patelarD_ortopedia " name="patelarD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $patelarD_ortopedia . '">' . $patelarD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($patelarD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($patelarD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($patelarD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($patelarD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM Patelar -->

                         <!-- Aquileu -->
                         <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Aquileu E</label>
                                        <select class="form-control" id="aquileuE_ortopedia " name="aquileuE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $aquileuE_ortopedia . '">' . $aquileuE_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($aquileuE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($aquileuE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($aquileuE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($aquileuE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Aquileu D</label>

                                        <select class="form-control" id="aquileuD_ortopedia " name="aquileuD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $aquileuD_ortopedia . '">' . $aquileuD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($aquileuD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($aquileuD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($aquileuD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($aquileuD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM Aquileu -->
                            
                            <h5>Reflexos Superficias </h5>
                            <br>  
                               <!-- Babisnki -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Babisnki E</label>
                                        <select class="form-control" id="babisnkiE_ortopedia " name="babisnkiE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $babisnkiE_ortopedia . '">' . $babisnkiE_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($babisnkiE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($babisnkiE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($babisnkiE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($babisnkiE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Babisnki D</label>

                                        <select class="form-control" id="babisnkiD_ortopedia " name="babisnkiD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $babisnkiD_ortopedia . '">' . $babisnkiD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($babisnkiD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($babisnkiD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($babisnkiD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($babisnkiD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM Babisnki -->

                            <!-- Cutâneo Abdominal -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Cutâneo Abdominal  E</label>
                                        <select class="form-control" id="cutaneoAbdominalE_ortopedia " name="cutaneoAbdominalE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $cutaneoAbdominalE_ortopedia . '">' . $cutaneoAbdominalE_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($cutaneoAbdominalE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($cutaneoAbdominalE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($cutaneoAbdominalE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($cutaneoAbdominalE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Cutâneo Abdominal  D</label>

                                        <select class="form-control" id="cutaneoAbdominalD_ortopedia " name="cutaneoAbdominalD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $cutaneoAbdominalD_ortopedia . '">' . $cutaneoAbdominalD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($cutaneoAbdominalD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($cutaneoAbdominalD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($cutaneoAbdominalD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($cutaneoAbdominalD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM Cutâneo Abdominal  -->

                            <h5>Outros Reflexos e sinais </h5>
                            <br>        

                            <!-- Sinais de automatismo medular -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sinais de Automatismo Medular E</label>
                                        <select class="form-control" id="sinaisDeAutotismoMedularE_ortopedia " name="sinaisDeAutotismoMedularE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $sinaisDeAutotismoMedularE_ortopedia . '">' . $sinaisDeAutotismoMedularE_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($sinaisDeAutotismoMedularE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($sinaisDeAutotismoMedularE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($sinaisDeAutotismoMedularE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($sinaisDeAutotismoMedularE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sinais de Automatismo Medular D</label>

                                        <select class="form-control" id="sinaisDeAutotismoMedularD_ortopedia " name="sinaisDeAutotismoMedularD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $sinaisDeAutotismoMedularD_ortopedia . '">' . $sinaisDeAutotismoMedularD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($sinaisDeAutotismoMedularD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($sinaisDeAutotismoMedularD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($sinaisDeAutotismoMedularD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($sinaisDeAutotismoMedularD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM  Sinais de automatismo medular  -->

                            <!-- Impulso extensor -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Impulso Extensor E</label>
                                        <select class="form-control" id="impulsoExtensorE_ortopedia " name="impulsoExtensorE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $impulsoExtensorE_ortopedia . '">' . $impulsoExtensorE_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($impulsoExtensorE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($impulsoExtensorE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($impulsoExtensorE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($impulsoExtensorE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Impulso Extensor D</label>

                                        <select class="form-control" id="impulsoExtensorD_ortopedia " name="impulsoExtensorD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $impulsoExtensorD_ortopedia . '">' . $impulsoExtensorD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($impulsoExtensorD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($impulsoExtensorD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($impulsoExtensorD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($impulsoExtensorD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM  Impulso extensor  -->

                            <!-- Tríplice Flexão -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tríplice Flexão E</label>
                                        <select class="form-control" id="tripliceFlexaoE_ortopedia " name="tripliceFlexaoE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tripliceFlexaoE_ortopedia . '">' . $tripliceFlexaoE_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($tripliceFlexaoE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($tripliceFlexaoE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($tripliceFlexaoE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($tripliceFlexaoE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Tríplice Flexão D</label>

                                        <select class="form-control" id="tripliceFlexaoD_ortopedia " name="tripliceFlexaoD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $tripliceFlexaoD_ortopedia . '">' . $tripliceFlexaoD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($tripliceFlexaoD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($tripliceFlexaoD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($tripliceFlexaoD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($tripliceFlexaoD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM Tríplice Flexão -->

                            <!-- Sincinesias -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sincinesias E</label>
                                        <select class="form-control" id="sincinesiasE_ortopedia " name="sincinesiasE_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $sincinesiasE_ortopedia . '">' . $sincinesiasE_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($sincinesiasE_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($sincinesiasE_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($sincinesiasE_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($sincinesiasE_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sincinesias D</label>

                                        <select class="form-control" id="sincinesiasD_ortopedia " name="sincinesiasD_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $sincinesiasD_ortopedia . '">' . $sincinesiasD_ortopedia . '</option>';
                                            }
                                            ?>
                                             <?php if ($sincinesiasD_ortopedia != '(A) Aumentado: hiperreflexia.')
                                                echo '<option value="(A) Aumentado: hiperreflexia.">(A) Aumentado: hiperreflexia.</option>'; ?>
                                            <?php if ($sincinesiasD_ortopedia != '(D) Diminuido: hiporeflexia.')
                                                echo '<option value="(D) Diminuido: hiporeflexia.">(D) Diminuido: hiporeflexia.</option>'; ?>
                                            <?php if ($sincinesiasD_ortopedia != '(SR) Sem reflexo, ausente: arreflexia.')
                                                echo '<option value="(SR) Sem reflexo, ausente: arreflexia.
                                                ">(SR) Sem reflexo, ausente: arreflexia. </option>'; ?>
                                            <?php if ($sincinesiasD_ortopedia != '(N) Normal - Normorreflexia.')
                                                echo '<option value="(N) Normal - Normorreflexia.">(N) Normal - Normorreflexia..</option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- FIM Sincinesias -->
                        </div>
                            <!-- FIM REFLEXOS -->


                            <h5>Mudança de Decúbito </h5>
                            <br> 
                                <div class="form-group">
                                    A) Verificar se o paciente passa para uma posição sozinho.<br>
                                    B) Permanece nessa posição sem necessitar de ajudar.<br>
                                    B) *Tempo que consegue permanecer em pé ou sentado.<br>
                                </div>
                            
                              
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sentado em Pé*</label>
                                        <select class="form-control" id="decubito1_ortopedia " name="decubito1_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $decubito1_ortopedia . '">' . $decubito1_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($decubito1_ortopedia != '(I) Independente.')
                                                echo '<option value="(I) Independente.">(I) Independente.</option>'; ?>
                                            <?php if ($decubito1_ortopedia != '(D) Dependente - com auxilio.')
                                                echo '<option value="(D) Dependente - com auxilio.">(D) Dependente - com auxilio.</option>'; ?>
                                            <?php if ($decubito1_ortopedia != '(NR) Não Realiza')
                                                echo '<option value="(NR) Não Realiza
                                                ">(NR) Não Realiza </option>'; ?>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Em pé para sentado*</label>

                                        <select class="form-control" id="decubito2_ortopedia " name="decubito2_ortopedia">
                                        <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $decubito1_ortopedia . '">' . $decubito1_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($decubito2_ortopedia != '(I) Independente.')
                                                echo '<option value="(I) Independente.">(I) Independente.</option>'; ?>
                                            <?php if ($decubito2_ortopedia != '(D) Dependente - com auxilio.')
                                                echo '<option value="(D) Dependente - com auxilio.">(D) Dependente - com auxilio.</option>'; ?>
                                            <?php if ($decubito2_ortopedia != '(NR) Não Realiza')
                                                echo '<option value="(NR) Não Realiza
                                                ">(NR) Não Realiza </option>'; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Sentado para deitado</label>

                                        <select class="form-control" id="decubito3_ortopedia " name="decubito3_ortopedia">
                                        <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $decubito1_ortopedia . '">' . $decubito1_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($decubito3_ortopedia != '(I) Independente.')
                                                echo '<option value="(I) Independente.">(I) Independente.</option>'; ?>
                                            <?php if ($decubito3_ortopedia != '(D) Dependente - com auxilio.')
                                                echo '<option value="(D) Dependente - com auxilio.">(D) Dependente - com auxilio.</option>'; ?>
                                            <?php if ($decubito3_ortopedia != '(NR) Não Realiza')
                                                echo '<option value="(NR) Não Realiza
                                                ">(NR) Não Realiza </option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Decúbito dorsal para ventral</label>
                                        <select class="form-control" id="decubito4_ortopedia " name="decubito4_ortopedia">
                                            <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $decubito4_ortopedia . '">' . $decubito4_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($decubito4_ortopedia != '(I) Independente.')
                                                echo '<option value="(I) Independente.">(I) Independente.</option>'; ?>
                                            <?php if ($decubito4_ortopedia != '(D) Dependente - com auxilio.')
                                                echo '<option value="(D) Dependente - com auxilio.">(D) Dependente - com auxilio.</option>'; ?>
                                            <?php if ($decubito4_ortopedia != '(NR) Não Realiza')
                                                echo '<option value="(NR) Não Realiza
                                                ">(NR) Não Realiza </option>'; ?>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Decúbito ventral para dorsal ventral</label>

                                        <select class="form-control" id="decubito5_ortopedia " name="decubito5_ortopedia">
                                        <?php
                                            if (@$_GET['funcao'] == 'editar') {
                                                echo '<option value="' . $decubito5_ortopedia . '">' . $decubito5_ortopedia . '</option>';
                                            }
                                            ?>
                                           <?php if ($decubito5_ortopedia != '(I) Independente.')
                                                echo '<option value="(I) Independente.">(I) Independente.</option>'; ?>
                                            <?php if ($decubito5_ortopedia != '(D) Dependente - com auxilio.')
                                                echo '<option value="(D) Dependente - com auxilio.">(D) Dependente - com auxilio.</option>'; ?>
                                            <?php if ($decubito5_ortopedia != '(NR) Não Realiza')
                                                echo '<option value="(NR) Não Realiza
                                                ">(NR) Não Realiza </option>'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            
                            <h5>Funções Neurovegetativas </h5>
                            <br> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Cardiopulmonar</label>
                                        <input type="text" class="form-control" id="cardiopulmonar_ortopedia" name="cardiopulmonar_ortopedia" placeholder="Cardiopulmonar" value="<?php echo @$cardiopulmonar_ortopedia ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Gênito Urinária</label>
                                        <input type="text" class="form-control" id="genitoUrinaria_ortopedia" name="genitoUrinaria_ortopedia" placeholder="Gênito Urinária" value="<?php echo @$genitoUrinaria_ortopedia ?>" required>

                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Outros</label>
                                <input type="text" class="form-control" id="outros_ortopedia" name="outros_ortopedia" placeholder="Outros" value="<?php echo @$outros_ortopedia ?>" required>
                            </div>
                                    
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Exames Complementares</label>
                                <div class="form-group">
                                <input type="text" class="form-control" id="examesComplementares_ortopedia" name="examesComplementares_ortopedia" placeholder="RX, Sangue, Urina, Eletromiografia e etc" value="<?php echo @$examesComplementares_ortopedia ?>" required>
                            </div>
                                       

                            </div>

                          
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Objetivo</label>
                                <textarea class="form-control" id="objetivo_ortopedia" name="objetivo_ortopedia" maxlength="300"><?php echo @$objetivo_ortopedia ?></textarea>
                            </div>
                                       
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Conduta</label>
                                <textarea class="form-control" id="conduta_ortopedia" name="conduta_ortopedia" maxlength="300"><?php echo @$conduta_ortopedia ?></textarea>
                            </div>
 

                        </div>
                    </div>
                    <!-- FIM ORTOPEDIA  -->



                    <div class="modal-footer">


                        <span class="text-muted">Lembre-se que o limite por campo é de no máximo <span class="text-danger"> 300 caracteres.</span></span>
                        <button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                        <button type="submit" name="<?php echo $nome_botao ?>" id="<?php echo $nome_botao ?>" class="btn btn-primary"><?php echo $nome_botao ?></button>


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





    <!--CHAMADA DA MODAL DELETAR -->
    <?php
    if (@$_GET['funcao'] == 'excluir' && @$item_paginado == '') {
        //$id = $_GET['id']
        $id = openssl_decrypt($_GET['id'], "BF-CBC", $senhaEncrypt);

    ?>

        <div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Excluir Registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>Deseja realmente Excluir este Registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
                        <form method="post">
                            <input type="hidden" id="id" name="id" value="<?php echo @$id ?>" required>

                            <button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    <?php } ?>






    <!--CHAMADA DA MODAL CRIAR LOGIN -->
    <?php
    if (@$_GET['funcao'] == 'login' && @$item_paginado == '') {

    ?>

        <!-- Modal -->
        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php

                                                                        $id_reg = openssl_decrypt($_GET['id'], "BF-CBC", $senhaEncrypt);
                                                                        //$id_reg = $_GET['id'];


                                                                        $res = $pdo->query("select * from pacientes where id = '$id_reg'");
                                                                        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                                                                        $nome_pac = $dados[0]['nome'];
                                                                        $email = $dados[0]['email'];

                                                                        ?>
                            Criar Login do Paciente - <?php echo $nome_pac ?>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form method="post">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <input type="hidden" id="id" name="id" value="<?php echo @$id_reg ?>" required>
                                        <input type="hidden" id="nome_pac" name="nome_pac" value="<?php echo @$nome_pac ?>" required>


                                        <input type="hidden" id="id-resp" name="id-resp" value="<?php echo @$id_resp ?>" required>

                                        <input type="hidden" id="email" name="email" value="<?php echo @$email ?>" required>

                                        <label for="exampleFormControlInput1">Usuario</label>
                                        <input type="text" class="form-control" id="email" placeholder="" name="email" value="<?php echo @$email ?>" disabled required>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Senha</label>
                                        <?php
                                        $res = $pdo->query("select * from usuarios where usuario = '$email'");
                                        $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                                        $senha_paciente = $dados[0]['senha_original'];
                                        ?>

                                        <input type="text" class="form-control" id="senha_paciente" name="senha_paciente" value="<?php echo @$senha_paciente ?>" required>
                                    </div>
                                </div>
                            </div>



                            <div id="mensagem_login" class="">

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button id="btn-fechar_login" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                        <button type="submit" name="btn-login" id="btn-login" class="btn btn-primary">Salvar</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>



    <?php } ?>


    <script>
        $('#modalLogin').modal("show");
    </script>

    <script>
        $('#modalResp').modal("show");
    </script>


    <!--CHAMADA DA MODAL RESP -->
    <?php
    if (@$_GET['funcao'] == 'resp' && @$item_paginado == '') {

    ?>
        <!-- Modal -->
        <div class="modal fade" id="modalResp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php

                                                                        //$id_reg = $_GET['id'];
                                                                        $id_reg = openssl_decrypt($_GET['id'], "BF-CBC", $senhaEncrypt);


                                                                        $res = $pdo->query("select * from pacientes where id = '$id_reg'");
                                                                        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                                                                        $nome_pac = $dados[0]['nome'];

                                                                        //BUSCAR DADOS DO REGISTRO A SER EDITADO
                                                                        $res = $pdo->query("select * from responsaveis where paciente = '$id_reg'");
                                                                        $dados = $res->fetchAll(PDO::FETCH_ASSOC);
                                                                        if (count($dados) > 0) {
                                                                            $nome_resp = $dados[0]['nome'];
                                                                            $cpf_resp = $dados[0]['cpf'];
                                                                            $data_nasc_resp = $dados[0]['data_nasc'];
                                                                            $id_resp = $dados[0]['id'];
                                                                        }

                                                                        ?>
                            Responsável do Paciente : <?php echo $nome_pac ?>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form method="post">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <input type="hidden" id="id" name="id" value="<?php echo @$id_reg ?>" required>

                                        <input type="hidden" id="id-resp" name="id-resp" value="<?php echo @$id_resp ?>" required>

                                        <input type="hidden" id="campo_antigo" name="campo_antigo" value="<?php echo @$cpf ?>" required>


                                        <label for="exampleFormControlInput1">Nome</label>
                                        <input type="text" class="form-control" id="nome_resp" placeholder="Insira o Nome " name="nome" value="<?php echo @$nome_resp ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group disabled">
                                        <label for="exampleFormControlInput1">CPF</label>
                                        <input type="text" class="form-control" id="cpf_resp" placeholder="Insira o CPF " name="cpf" value="<?php echo @$cpf_resp ?>" required>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Data Nascimento</label>
                                        <input type="date" class="form-control" id="data" name="data" value="<?php echo @$data_nasc_resp ?>" required>
                                    </div>
                                </div>
                            </div>



                            <div id="mensagem_resp" class="">

                            </div>

                    </div>
                    <div class="modal-footer">
                        <button id="btn-fechar_resp" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                        <button type="submit" onclick="cpfMensagem()" name="btn-resp" id="btn-resp" class="btn btn-primary">Salvar</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>


    <?php } ?>

    <script>
        $('#modalResp').modal("show");
    </script>


    <script>
        $('#modal-deletar').modal("show");
    </script>


    <!--MASCARAS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script src="../js/mascaras.js"></script>


    <!--AJAX PARA INSERÇÃO DOS DADOS -->
    <script type="text/javascript">
        $(document).ready(function() {
            var pag = "<?= $pagina_ajax ?>";
            $('#Salvar').click(function(event) {
                event.preventDefault();

                $.ajax({
                    url: pag + "/inserir.php",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(mensagem) {

                        $('#mensagem').removeClass()

                        if (mensagem == 'Cadastrado com Sucesso!') {

                            $('#mensagem').addClass('mensagem-sucesso')

                            $('#nome').val('')
                            $('#cpf').val('')
                            $('#telefone').val('')
                            $('#crm').val('')
                            $('#email').val('')

                            $('#txtbuscar').val('')
                            $('#btn-buscar').click();
                            $('#btn-fechar').click();

                        } else {

                            $('#mensagem').addClass('mensagem-erro');
                            $('#btn-buscar').click();
                            window.alert("Fique atento, Nome e CPF e Data de Nascimento são campos obrigatórios ");

                        }

                        $('#mensagem').text(mensagem);
                        $('#btn-buscar').click();
                        $('#btn-fechar').click();


                    },

                })
            })
        })
    </script>


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



    <!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
    <script type="text/javascript">
        $('#txtbuscar').keyup(function() {
            $('#btn-buscar').click();
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



    <!--AJAX PARA EXCLUSÃO DOS DADOS -->
    <script type="text/javascript">
        $(document).ready(function() {
            var pag = "<?= $pagina_ajax ?>";
            $('#btn-deletar').click(function(event) {
                event.preventDefault();

                $.ajax({
                    url: pag + "/excluir.php",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(mensagem) {

                        $('#txtbuscar').val('')
                        $('#btn-cancelar-excluir').click();

                        $('#btn-buscar').click();
                        $('#btn-fechar').click();


                    },

                })
            })
        })
    </script>






    <!--AJAX PARA INSERÇÃO DOS DADOS -->
    <script type="text/javascript">
        $(document).ready(function() {
            var pag = "<?= $pagina_ajax ?>";
            $('#btn-resp').click(function(event) {
                event.preventDefault();

                $.ajax({
                    url: pag + "/inserir-resp.php",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(mensagem) {

                        $('#mensagem').removeClass()

                        if (mensagem == 'Cadastrado com Sucesso!!') {

                            $('#mensagem_resp').addClass('mensagem-sucesso')

                            $('#nome').val('')
                            $('#cpf').val('')

                            $('#txtbuscar').val('')
                            $('#btn-buscar').click();

                            $('#btn-fechar_resp').click();
                            $('#btn-buscar').click();

                        } else {

                            $('#mensagem_resp').addClass('mensagem-erro')
                        }

                        $('#mensagem_resp').text(mensagem)

                    },

                })
            })
        })
    </script>


    <!--AJAX PARA INSERÇÃO DOS DADOS PARA CRIAR LOGIN -->
    <script type="text/javascript">
        $(document).ready(function() {
            var pag = "<?= $pagina_ajax ?>";
            $('#btn-login').click(function(event) {
                event.preventDefault();

                $.ajax({
                    url: pag + "/inserir-login.php",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(mensagem) {

                        $('#mensagem').removeClass()

                        if (mensagem == 'Cadastrado com Sucesso!!') {

                            $('#mensagem_login').addClass('mensagem-sucesso')

                            $('#email').val('')
                            $('#senha_paciente').val('')
                            $('#nome_pac').val('')

                            $('#txtbuscar').val('')
                            $('#btn-buscar').click();

                            $('#btn-fechar_login').click();
                            $('#btn-buscar').click();

                        } else {

                            $('#mensagem_login').addClass('mensagem-erro')
                        }

                        $('#mensagem_login').text(mensagem)

                    },

                })
            })
        })
    </script>
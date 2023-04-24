<?php
@session_start();

$pagina = 'assinatura';

?>

<h4>Assinatura</h4>
<span class="text-muted">Detalhes da sua assinatura atual</span><br>

<div class="row mt-4 mb-3 ml-1 ">
    
    <?php 
            if($agora_format > $data_fim_acesso_format){
                //DATA EXPIROU
                header("location:acesso-bloqueado.php");

            }
            if ($agora_format == $data_fim_acesso_format) {
                //DIA DE VENCIMENTO
                echo'
                <div class="row">
        <div class="col-md-6">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Primeira Vez?</h4>
                    </div>
                    <div class="modal-body text-muted">
                    <h5 class="text-muted">Hoje é o último dia para do seu plano gratuito </h5>
                       <b>Último dia</b> que você tem disponivel para utilizar o Sistema Ortopelve.<br>
                        <br>Clique no botão e cadastre-se para evitar o bloqueio e futuro cancelamento permanente da sua conta.
                    </div>

                    <div class="row ml-1">
                        <div class="col-md-6 ">
                            <label for="exampleFormControlInput1">Cadastre-se</label><br>
                            <a href="https://sistema.ortopelve.com.br/index.php?rp=/store/sistema-ortopelve/sistema-ortopelve" target="_blank" type="button"
                                class="btn btn-success"><i class="fas fa-money-bill-alt"></i> Assinar Ortopelve</a><br>
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Contato com o suporte</label><br>
                            <a href="https://www.ortopelve.com.br/contato" type="button" target="_blank"
                                class="btn btn-secondary"><i class="fas fa-info-circle"></i> Suporte</a>
                        </div>

                    </div>
                    <p class="text-muted ml-3"> <br>Críticas, sugestões, dúvidas ou elogios? Fale com a gente pelo
                        <a href="mailto:cliente@ortopelve.com.br">cliente@ortopelve.com.br</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Já é cliente?</h4>
                    </div>
                    <div class="modal-body text-muted">
                    <h5 class="text-muted">Hoje é o último dia para seu plano expirar </h5>';
                            
                            echo'Seu plano esta disponível até o dia <b>'.$data_fim_acesso2.'</b> 
                            <br> <br>Clique no botão e renove o plano para evitar o bloqueio e futuro cancelamento permanente da sua conta.
                    </div>

                    <div class="row ml-1">

                        <div class="col-md-6 ">
                            <label for="exampleFormControlInput1">Garantir mais alguns meses</label><br>
                            <a href="https://sistema.ortopelve.com.br/index.php?rp=/login" type="button"
                                class="btn btn-success" target="_blank"><i class="fas fa-money-bill-alt"></i> Renovar Plano</a><br>
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Clique no botão para</label><br>
                            <a href="https://www.ortopelve.com.br/contato" type="button" target="_blank"
                                class="btn btn-secondary"><i class="fas fa-info-circle"></i> Suporte</a>
                        </div>

                    </div>
                    <p class="text-muted ml-3"> <br>Críticas, sugestões, dúvidas ou elogios? Fale com a gente pelo
                        <a href="mailto:cliente@ortopelve.com.br">cliente@ortopelve.com.br</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
            ';

            }
            
            if ($agora_format < $data_fim_acesso_format) {
                // DENTRO DO PRAZO E NOVO CLIENTE
                echo'
                <div class="row">
                <div class="col-md-6">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Primeira Vez?</h4>
                            </div>
                            <div class="modal-body text-muted">
                            <h5 class="text-muted">Seu plano gratuito vai até o dia  <b>'.$data_fim_acesso2.'</b> </h5>
                               Onde você tem disponivel utilizar o Sistema Ortopelve na integra.<br>
                                <br>Clique no botão e cadastre-se para evitar o bloqueio e futuro cancelamento permanente da sua conta.
                            </div>
        
                            <div class="row ml-1">
                                <div class="col-md-6 ">
                                    <label for="exampleFormControlInput1">Cadastre-se</label><br>
                                    <a href="https://sistema.ortopelve.com.br/index.php?rp=/store/sistema-ortopelve/sistema-ortopelve" target="_blank" type="button"
                                        class="btn btn-success"><i class="fas fa-money-bill-alt"></i> Assinar Ortopelve</a><br>
                                </div>
        
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Contato com o suporte</label><br>
                                    <a href="https://www.ortopelve.com.br/contato" type="button" target="_blank"
                                        class="btn btn-secondary"><i class="fas fa-info-circle"></i> Suporte</a>
                                </div>
        
                            </div>
                            <p class="text-muted ml-3"> <br>Críticas, sugestões, dúvidas ou elogios? Fale com a gente pelo
                                <a href="mailto:cliente@ortopelve.com.br">cliente@ortopelve.com.br</a>
                            </p>
                        </div>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Já é cliente?</h4>
                            </div>
                            <div class="modal-body text-muted">
                            <h5 class="text-muted">Obrigado pela preferência</h5>';
                                    
                                    echo'Seu plano esta disponível até o dia <b>'.$data_fim_acesso2.'</b> 
                                    <br> <br>Clique no botão caso queira renovar o plano e garantir mais alguns meses de uso no nosso sistema.
                            </div>
        
                            <div class="row ml-1">
        
                                <div class="col-md-6 ">
                                    <label for="exampleFormControlInput1">Garantir mais alguns meses</label><br>
                                    <a href="https://sistema.ortopelve.com.br/index.php?rp=/login" type="button"
                                        class="btn btn-success" target="_blank"><i class="fas fa-money-bill-alt"></i> Renovar Plano</a><br>
                                </div>
        
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1">Clique no botão para</label><br>
                                    <a href="https://www.ortopelve.com.br/contato" type="button" target="_blank"
                                        class="btn btn-secondary"><i class="fas fa-info-circle"></i> Suporte</a>
                                </div>
        
                            </div>
                            <p class="text-muted ml-3"> <br>Críticas, sugestões, dúvidas ou elogios? Fale com a gente pelo
                                <a href="mailto:cliente@ortopelve.com.br">cliente@ortopelve.com.br</a>
                            </p>
                        </div>
                    </div>
                </div>
        
            </div>
                ';
            }  

          
            ?>
   
</div>


<?php 	

/* '%'.$nome_da_varivel.'%' 
	Usado junto ao LIKE em MySQl ele busca valores parecidos */
if(isset($_GET[$item4]) and $_GET['txtbuscar'] != ''){
	$nome_buscar= '%'.$_GET['txtbuscar'].'%';
	$res = $pdo->prepare("SELECT * FROM usuarios WHERE nome LIKE :nome ORDER BY nome ASC");
	$res->bindValue(":nome", $nome_buscar);
	$res->execute();
	$dados = $res->fetchAll(PDO::FETCH_ASSOC); 
	$linhas = count($dados);
}else{
	$res = $pdo->query("SELECT * FROM usuarios ORDER BY nome ASC ");
		$res->execute();
		$dados = $res->fetchAll(PDO::FETCH_ASSOC); 
		$linhas = count($dados);
}	
		?>

<div class="row botao-novo">
    <div class="col-md-12">
        <button data-toggle="modal" data-target="#modal" type="button" class="btn btn-secondary">Novo Usuarios</button>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6 col-sm-12">
        <div class="float-left">

            <label class="registro" for="exampleFormControlSelect1">Registros <b>(<?php echo $linhas ?>)</b></label>
            <select class="form-control-sm" id="exampleFormControlSelect1">
                <option>10</option>
                <option>25</option>
                <option>50</option>

            </select>

        </div>
    </div>


    <div class="col-md-6 col-sm-12">

        <div class="float-right mr-4">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Nome" aria-label="Search"
                    name="txtbuscar">
                <button class="btn btn-outline-secondary btn-sm my-2 my-sm-0" type="submit"
                    name="<?php echo $item4; ?>"><i class="fas fa-search"></i></button>
            </form>
        </div>

    </div>


</div>


<table class="table table-sm mt-3">
    <thead class="thead-light">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Usuario</th>
            <th scope="col">Senha</th>
            <th scope="col">Nivel</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
		for($i=0; $i < count($dados); $i++){
			foreach($dados[$i] as $key => $value){
			}		
			$id = $dados[$i]['id'];
			$nome = $dados[$i]['nome'];
			$usuario = $dados[$i]['usuario'];
			$senha = $dados[$i]['senha'];
			$senha_original = $dados[$i]['senha_original'];
			$nivel = $dados[$i]['nivel'];
		?>

        <tr>
            <td><?php echo $nome ?></td>
            <td><?php echo $usuario ?></td>
            <td><?php echo $senha_original ?></td>
            <td><?php echo $nivel ?></td>
            <td>
                <a href="index.php?acao=usuarios&funcao=editar&id=<?php echo $id ?>"><i
                        class="fas fa-edit text-info"></i></a>
                <a href="index.php?acao=usuarios&funcao=excluir&id=<?php echo $id ?>"><i class="far fa-trash-alt text-danger"></i></a>
            </td>
        </tr>
        <?php
	}
	?>
    </tbody>
</table>






<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome</label>
                        <input type="text" class="form-control" id="" placeholder="Insira o Nome" name="nome">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" name="usuario" class="form-control" id="" placeholder="Insira o Email">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Senha</label>
                        <input type="text" name="senha" class="form-control" id="" placeholder="Insira a senha">
                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn-salvar" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!--Código do Botão Salvar -->
<?php
	if(isset($_POST['btn-salvar'])){
		$nome = $_POST['nome'];
		$usuario = $_POST['usuario'];
		$senha = $_POST['senha_original'];
		$senha_cript = md5($senha);


		//VERIFICAR SE O USUARIO JÁ ESTA CADASTRADO
		$res_c = $pdo->query ("SELECT * FROM usuarios WHERE usuario = '$usuario'");

		$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
		$linhas = count($dados_c);

		if($linhas == 0){
			$res = $pdo->prepare ("INSERT INTO usuarios(nome, usuario, senha, senha_original, nivel) values (:nome, :usuario, :senha, :senha_original, :nivel)");

			$res->bindValue(":nome", $nome);  
			$res->bindValue(":usuario", $usuario);  
			$res->bindValue(":senha", $senha_cript);  
			$res->bindValue(":senha_original", $senha);  
			$res->bindValue(":nivel", 'admin');
			$res->execute();

			echo "<script language='javascript'>window.alert('Registro Inserido')</script>";
			echo "<script language='javascript'>window.location='index.php?acao=usuarios'</script>"; 
		}
		
		else{
			echo "
    <script language='javascript'>window.alert('Usuario já cadastrado')</script>";
    
		}
	}

?>

<!--Código do Botão Editar -->
<?php
	if(isset($_GET['funcao']) == 'editar'){
		$id_usuario = $_GET['id'];
		

		//BUSCAR DADOS DO REGISTOR A SER EDITADO
		$res = $pdo->query ("SELECT * FROM usuarios WHERE id = '$id_usuario'");
		$dados = $res->fetchAll(PDO::FETCH_ASSOC);
		$nome_usuario = $dados[0]['nome'];
		$email_usuario = $dados[0]['usuario'];
		$senha_usuario = $dados[0]['senha_original'];
        $email_usuario_rec = $dados[0]['usuario'];
		?>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Usuarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome</label>
                        <input type="text" name="nome" class="form-control" id="" placeholder="Insira o Nome"
                            value="<?php echo "$nome_usuario" ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" name="usuario" class="form-control" id="" placeholder="Insira o Email"
                            value="<?php echo "$email_usuario" ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Senha</label>
                        <input type="text" name="senha" class="form-control" id="" placeholder="Insira a senha"
                            value="<?php echo "$senha_usuario" ?>">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                <button type="submit" name="btn-editar" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
		if(@$_POST['btn-editar']){
			$nome = $_POST['nome'];
			$usuario = $_POST['usuario'];
			$senha = $_POST['senha'];
			$senha_cript = md5($senha);
	
	
			//VERIFICAR SE O USUARIO JÁ ESTA CADASTRADO SOMENTE SE FOR TROCADO O USUARIO
            if($email_usuario_rec != $usuario){   
			$res_c = $pdo->query ("SELECT * FROM usuarios WHERE usuario = '$usuario'");
	
			$dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
			$linhas = count($dados_c);
	 
			if($linhas != 0){
				echo "<script language='javascript'>window.alert('Usuario já cadastrado')</script>";
                exit();
			}
        }
			$res = $pdo->prepare ("UPDATE usuarios SET nome = :nome, usuario = :usuario, senha = :senha_cript, senha_original = :senha WHERE id = :id");
	
				$res->bindValue(":nome", $nome);  
				$res->bindValue(":usuario", $usuario);  
				$res->bindValue(":senha", $senha);  
				$res->bindValue(":senha_cript", $senha_cript);  
				$res->bindValue(":id", $id_usuario);
				$res->execute();
	
				echo "<script language='javascript'>window.alert('Registro Atualizado')</script>";
				echo "<script language='javascript'>window.location='index.php?acao=usuarios'</script>"; 
		} 
	?>
<?php } ?>

<!--Código do Botão EXCLUIR -->
<?php
	if(@$_GET['funcao'] == 'excluir'){
		$id_usuario = $_GET['id'];
        $res = $pdo->query ("DELETE FROM usuarios WHERE id = '$id_usuario'");
        echo "<script language='javascript'>window.alert('Registro Excluido')</script>";
				echo "<script language='javascript'>window.location='index.php?acao=usuarios'</script>"; 
    }   
?>

<!-- Chamar Modal Editar -->
<script>
$("#modalEditar").modal("show");
</script>

<!--MASCARAS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

<script src="../js/mascaras.js"></script>
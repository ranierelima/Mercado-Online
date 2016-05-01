<html>
<head>
    <!-- Meta charset="UTF-8", é utilizado para aceitar acentuação, 
    e não exibir para o Usuário uma letra estranha-->
	<meta charset="UTF-8">
    <!-- É utilizado para chamar o CSS, responsável por deixar o 
    site com uma interface mais amigavel. -->
	<link rel="stylesheet" href="<?=base_url("css/bootstrap.css")?>">
</head>
<body>
    
    <?php if($this->session->flashdata("success")):?>
    <p class="alert alert-success"><?=$this->session->flashdata("success")?></p>
    <?php elseif($this->session->flashdata("danger")):?>
    <p class="alert alert-danger"><?=$this->session->flashdata("danger")?></p>
    <?php endif ?>
    <!-- A class container, é usada para criar uma caixa invisivel, que melhora a visualização centralizando a visualização.-->
	<div class="container">
        <h1>Produtos</h1>
        <!--A class alert e alert-success tem a função de exibir uma mensagem de Sucesso para o usuário em cor verde. Para mensagens de erro é utilizado o alert-danger, que gera uma mensagem em vermelho. -->
		<!-- Table, cria uma tabela. Para criar linhas é utilizado a tag TR e
        para gerar uma coluna é utilizado o TD. -->
        <table class="table" style="text-align:center;">
            <thead>
                <tr>
                    <td><b>Nome</b></td>
                    <td><b>Descrição</b></td>
                    <td><b>Preço</b></td>
                    <td><b>Ações</b></td>
                </tr>
            </thead>
            <tbody>
            <!-- O foreach é a mesma coisa que um for, um laço de repetição, 
            porém no foreach você passa um conjunto de dados (arrays), e um apelido. 
            Abaixo o array é chamada de produtos e o apelido é chamada de produto.-->
			<?php foreach($produtos as $produto): ?>
				<tr>
				<td><?=anchor("produtos/{$produto["id"]}",$produto["nome"])?></td>
                <td><?= character_limiter(html_escape($produto["descricao"]), 50) ?></td>
                <td><?= numerosEmReais($produto["preco"]) ?></td>
                <td><?= anchor("produtos/".$produto['id']."/editar" , "Editar Produto",array("class"=>"btn btn-info"))?>
        <?= anchor ("produtos/".$produto['id']."/deletar", "Deletar Produto",array("class"=>"btn btn-danger")) ?>
    </td>
			</tr>
            <!-- Endforeach = Termina o foreach-->
			<?php endforeach ?>
            </tbody>
        </table>
        <?php
        if($this->session->userdata("usuarioLogado")) : ?>
        <?= anchor("usuarios/deslogado","Desloga", array("class"=>"btn btn-danger"))?>
        <?= anchor("produtos/formularioCadastro","Cadastrar Produtos", array("class"=>"btn btn-info"))?>
        <?php else : ?>
        <h1>Aqui é o Login</h1>
        <?php
            echo form_open("usuarios/autenticar");
            echo form_label("E-mail:","email");
            echo form_input(array(
                "id"=>"email",
                "name"=>"email",
                "class"=>"form-control"
            ));
            echo form_label("Senha:","senha");
            echo form_input(array(
            "id"=>"senha",
            "name"=>"senha",
            "class"=>"form-control",
            "type"=>"password"
            ));
            
            echo form_button(array(
                "type"=>"submit",
                "content"=>"Login",
                "class"=>"btn btn-primary"
            ));

            echo form_close();
        ?>
        
        
               <h1>Cadastro de Usuários: </h1>
        <?php
        
            echo form_open("usuarios/cadastrar");

            echo form_label("Nome:", "nome");
            echo form_input(array(
                "id"=>"nome",
                "name"=>"nome",
                "class"=>"form-control",
                "maxlength"=>"255"
            ));
            echo form_label("E-mail:", "email");
            echo form_input(array(
                "id"=>"email",
                "name"=>"email",
                "class"=>"form-control",
                "maxlength"=>"255"
            ));
            echo form_label("Senha:", "senha");
            echo form_password(array(
                "id"=>"senha",
                "name"=>"senha",
                "class"=>"form-control",
                "maxlength"=>"255"
            ));

            echo form_button(array(
                "type"=>"submit",
                "content"=>"Cadastrar",
                "class" =>"btn btn-primary"
            ));

            echo form_close();
        ?>
        <?php endif ?>
	</div>
</body>
</html>
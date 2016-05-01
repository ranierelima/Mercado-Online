<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="<?=base_url("css/bootstrap.css")?>">
</head>
<body>
    <div class="container">
<h1>Editar Produtos</h1>

<?php
            echo form_open("produtos/editarProduto");

            echo form_hidden("id",$produto["id"]);

            echo form_label("Nome:","nome");
            echo form_input(array(
                "id"=>"nome",
                "name"=>"nome",
                "class"=>"form-control",
                "required"=>"required",
                "value"=>$produto['nome']
            ));

            echo form_label("Descrição:","descricao");
            echo form_input(array(
                "id"=>"descricao",
                "name"=>"descricao",
                "class"=>"form-control",
                "required"=>"required",
                "value"=>$produto['descricao']
            ));

            echo form_label("Preço:","preco");
            echo form_input(array(
                "id"=>"preco",
                "name"=>"preco",
                "type"=>"number",
                "class"=>"form-control",
                "required"=>"required",
                "value"=>$produto['preco']
            ));

            echo form_button(array(
                "type"=>"submit",
                "content"=>"Enviar",
                "class"=>"btn btn-primary"
            ));
            echo form_close();
        ?>
    </div>
    </body>
</html>
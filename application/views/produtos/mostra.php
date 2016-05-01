<html>
<head>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="<?=base_url("css/bootstrap.css")?>">
</head>
<body>
    
    <div class="container">
    
        <h1><?= $produto['nome']?> </h1>
        
        <table class="table table-striped table-bordered">
        <tr>
            <td>Preço: <?= numerosEmReais($produto['preco'])?></td>
            <td>Descrição: <?=html_escape($produto['descricao'])?></td>
        </tr>
        </table>
        <?= anchor("produtos/".$produto['id']."/editar" , "Editar Produto",array("class"=>"btn btn-info"))?>
        <?= anchor ("produtos/".$produto['id']."/deletar", "Deletar Produto",array("class"=>"btn btn-danger")) ?>
    </div>
    
</body>
</html>
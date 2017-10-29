<?php
$id = $_GET['id'];
$arqui = fopen('bd/banco.txt','r+');
		while (true){
			$busca  = fgets($arqui);
			if ($busca == null)break;
			$auxi = preg_replace("/[^0-9]/", "", $busca);
			if (strcmp($id, $auxi) == 0) {
				$posicao = strpos($busca, 'Nome:');
				$nome = substr($busca, $posicao+5);
			}
		}
	$_SESSION['id'] = $id;
	$_SESSION['nome'] = $nome;

	fclose($arqui);
?>
<div>
	<form action="?pg=update2" method="post">
		<div class="form-group">
		  <label class="control-label col-sm-4" for="email">Editar nome</label>
		  <input type="text" class="form-control" name="newName" id="newName" value="<?php echo $nome;?>">
		</div>
		<button type="submit"  class="col-sm-3 btn btn-dark">Atualizar</button>
	</form>
</div>
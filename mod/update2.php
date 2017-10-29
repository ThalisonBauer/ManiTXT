<?php
$id = $_SESSION['id'];
$oldName = $_SESSION['nome'];
$newName = $_POST['newName'];
$arqui = fopen('bd/banco.txt','r+');
$fls = fopen('bd/banco.txt', 'a');

	while (true){
		$busca  = fgets($arqui);
		if ($busca == null)break;
		$auxi = preg_replace("/[^0-9]/", "", $busca);

			if (strcmp($id, $auxi) == 0)
			{
				$posicao = strpos($busca, 'Nome:');
				$nome = substr($busca, $posicao+5);

					if(strcmp($nome, $oldName) == 0){
						error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
						$newnome = "ID: ".$id." Nome:".$newName."\r\n";
						$string .=  $newnome;
					}
			}else{
						error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
						$string .= $busca;
			}
}
	rewind($arqui);
	ftruncate($arqui, 0);
	fwrite($fls, $string);

?>
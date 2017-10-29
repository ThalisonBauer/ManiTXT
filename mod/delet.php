<?php
$id = $_GET['id'];
$arqui = fopen('bd/banco.txt','r+');
$fls = fopen('bd/banco.txt', 'a');
$primeira  = fgets($arqui);

		while (true) {
			$busca  = fgets($arqui);
			if ($busca == null)break;
			$auxi = preg_replace("/[^0-9]/", "", $busca);
			if(strcmp($primeira, $busca) == 1){
				if (strcmp($id, $auxi) == 0){
					error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
					$string .=  "";
				}else{
					error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
					$string .= $busca;
				}
			}
		}
	rewind($arqui);
	ftruncate($arqui, 0);
	fwrite($fls, "".$primeira."");
	fwrite($fls, $string);
	fclose($arqui);
	fclose($fls);
?>
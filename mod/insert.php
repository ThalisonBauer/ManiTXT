<?php
$arquivo = 'bd/banco.txt';
$nome =  $_POST['nome'];
	if(file_exists($arquivo)){
			$fls = fopen($arquivo, 'a');
			$arq = fopen($arquivo,'r+');
			$linha = fgets($arq);
			$aux = preg_replace("/[^0-9]/", "", $linha);
			$aux = $aux + 1;
			$text = "ID: ".$aux." Nome: ".$nome."\r\n";
				fwrite($fls, $text);
				
				if ($arq){
					while(true){
						$copy = fgets($arq);
						if ($copy==null) break;
						if(strcmp($linha,$copy) == 0){
							echo "Oie";
						}else{
							error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
							$string .=  $copy;
						}
					}
				}
			rewind($arq);
			ftruncate($arq, 0);
			fwrite($fls, "ID[".$aux."] \r\n");
			fwrite($fls, $string);
			fclose($fls);
			fclose($arq);
	}else{
		$fp = fopen('bd/banco.txt', 'a');
		fwrite($fp, "ID[0] \r\n");
		$text = "ID: 0 Nome: ".$nome."\r\n";
		fwrite($fp, $text);
		fclose($fp);
	}



?>
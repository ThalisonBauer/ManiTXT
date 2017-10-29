<?php
session_start();

?>
<html>
	<head>
		<title>Manipulação Arquivos</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
			<script src="https://use.fontawesome.com/3733e31c11.js"></script>
	</head>
	<body>
		<div class="col-sm-6 offset-sm-3">
				<form class="form-horizontal" action="?pg=add" method="post">
				  <div class="form-group">
				    <label class="control-label col-sm-4" for="email">Nome Completo</label>
				    <div>
				      <input type="text" class="form-control" name="nome" id="nome" required>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div>
				      <button type="submit" class=" col-sm-3 btn btn-success">Cadastrar</button>
				    </div>
				  </div>
				</form>
				<?php 
				if (isset($_GET['pg'])){
					switch ($_GET['pg']){
					    case 'add': include('mod/insert.php');break;
					    case 'update': include('mod/update.php');break;
						case 'update2': include('mod/update2.php');break;
					    case 'delet': include('mod/delet.php');break;
					}
				}                                     
				?>
				<table class="table" border="1">
					<th>ID:</th>
					<th>Nome completo</th>
					<th><center>Excluir</center></th>
					<th><center>Editar</center></th>

					<?php 
					$verifica = 'bd/banco.txt';
						if(file_exists($verifica)){
							$ler = fopen('bd/banco.txt', 'a+');
							$axu = fgets($ler);
							if ($ler){
								while (true) {
									$lin = fgets($ler);
									if ($lin == null)break;
									if(strcmp($lin,$axu)== true){
										if($lin == null) break;
											$ids = preg_replace("/[^0-9]/", "", $lin);
											$posicao = strpos($lin, 'Nome:');
											$nome = substr($lin, $posicao+5);
											?>	
												<tr>
													<td><?php echo $ids; ?></td>
													<td style="width: 400px"><?php echo $nome; ?></td>
													<td style="text-align: center"><a href="?pg=delet&id=<?php echo $ids;?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
													<td style="text-align: center"><a href="?pg=update&id=<?php echo $ids;?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
												</tr>
											<?php
										}
									}
								}
							}else{
							echo "SEM REGISTROS";
						}
					?>
				</table>
		</div>
	</body>
</html>
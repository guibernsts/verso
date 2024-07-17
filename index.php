
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabela Estilizada Versao 2.0</title>
  
  <link rel="stylesheet" href="css/form.css" type="text/css">	
  <link rel="stylesheet" href="css/select2.css" type="text/css">	
  <link rel="stylesheet" href="css/tableList.css" type="text/css">		
  <link rel="stylesheet" href="https://webcomponent.com.br/bst/ispinia/Static_Full_Version/font-awesome/css/font-awesome.css" type="text/css">			
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  
	
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>	
  <script src="scripts/select2.js"></script>	
  <script  src="scripts/functions.js"></script>	
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	
</head>
<body>



	
	
 <form  action="javascript: saveUser();" method="post" name="form">
  
  <input type="hidden" name="id" value="0">
	 
  <label for="name">Nome:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

	<?
	require 'connection.php';
	$connection = new Connection();
	$colors = $connection->query("SELECT * FROM colors");

	?> 
   <label for="frutas">Selecione suas cores favoritas:</label>
	<select id="colors" name="colors" multiple="multiple" class="chosen-select multiSelect"  data-placeholder="Selecione suas cores favoritas" >
	  <?
		foreach($colors as $color) 
			{
			echo "<option value='".$color->id."'>".$color->name."</option>";
			}
		?>
	</select>
	 
	 
	 
  
	 
	 

  <input type="submit" class="inputSave"  value="Salvar">	 
  <input type="button" class="inputSearh"  onClick="javascript: listUsers();" value="Pesquisar">	 
  <input type="button" class="inputReset"  onClick="javascript: resetTeste();" value="Reset DB">	 	 
</form>

	

<div id="ajaxSearch"></div>	
<div id="ajaxResponse"></div>
	

	

	
	</body>
</html>

<script>
 $(document).ready(function(){
	  var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
                }
            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }
	 
  });
</script>
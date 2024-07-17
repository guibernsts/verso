<?php
require 'connection.php';
$connection = new Connection();

$users = $connection->query("SELECT * FROM users WHERE id=".$id);
while ($user = $users->fetch(PDO::FETCH_ASSOC)) {
            
            $userId = $user['id'];
	 		$userName = $user['name'];
	 		$userEmail = $user['email'];
 }

$users = $connection->query("SELECT * FROM user_colors WHERE user_id=".$id);


$i = 0;

while ($user = $users->fetch(PDO::FETCH_ASSOC)) 
	{
    
    $colors_idsA[$i]= $user['color_id'];
	$i++;
	 		
 	}


?>
<script id="runscriptUserSearh">
document.form.id.value = '<?=$userId;?>';
document.form.name.value = '<?=$userName;?>';	
document.form.email.value = '<?=$userEmail;?>';	
$('#colors').val('').trigger('chosen:updated');	

	
<? if($i>0) { $colors_ids = '"'.implode('","',$colors_idsA).'"'; ?>	
var values = [<?=$colors_ids;?>];	
$('#colors').val(values).trigger('chosen:updated');
//$('#colors').val("Green").trigger('chosen:updated');	

<? }?>	
	
</script>


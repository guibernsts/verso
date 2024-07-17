<?php
require 'connection.php';
$connection = new Connection();
$users = $connection->query("SELECT * FROM users WHERE id=".$id);


 while ($user = $users->fetch(PDO::FETCH_ASSOC)) {
            
            $userId = $user['id'];
	 		$userName = $user['name'];
	 		$userEmail = $user['email'];
            
 }


?>
<script id="runscriptUserSearh">
document.form.id.value = '<?=$userId;?>';
document.form.name.value = '<?=$userName;?>';	
document.form.email.value = '<?=$userEmail;?>';		
</script>


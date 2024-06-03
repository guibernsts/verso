<?php
require 'connection.php';
$connection = new Connection();


switch($action) 
	{
	case "delete":
	$users = $connection->query("DELETE FROM users WHERE id=".$id);
	$users = $connection->query("DELETE FROM user_colors WHERE user_id=".$id);	
	break;
	
	case "update":
	$users = $connection->query("UPDATE users SET name='$name', email='$email' WHERE id=".$id);
	break;
	
	case "insert":
	$insert = $connection->query("INSERT INTO users(name, email)
    							 VALUES        ('".$name."', '".$email."')	");
	
	$getlastId = $connection->query("SELECT id FROM users order by id ");
	while ($lastId = $getlastId->fetch(PDO::FETCH_ASSOC)) { $id = $lastId['id']; }
    break; 
													  
    }


if (is_array($colors)) 
	{
	
	$usersColor = $connection->query("DELETE FROM user_colors WHERE user_id=".$id);
	foreach ($colors as $color) {

		
		
		$usersColor = $connection->query("INSERT INTO user_colors(color_id,user_id) VALUES('".$color."',$id)");
		
	}
	}


?>
<script id="runscriptUserSearh">


	
</script>


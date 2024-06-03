<?php
require 'connection.php';

$connection = new Connection();


$users = $connection->query("SELECT * FROM users");

echo "<table border='1'>

    <tr>
        <th>ID</th>    
        <th>Nome</th>    
        <th>Email</th>
		<th>Colors</th>
        <th>Ação</th>    
    </tr>
";

foreach($users as $user) 
	{
	
	$colors = $connection->query("SELECT c.name FROM user_colors uc INNER JOIN colors c ON c.id=uc.color_id WHERE uc.user_id=".$user->id);
	
	$i = 0;
	$strColors = "";
	while ($color = $colors->fetch(PDO::FETCH_ASSOC)) 
		{
		if($i==0) $strColors = $color['name'];
		else	  $strColors.= ",".$color['name'];	
		
		
		$i++;

		}
	
	echo sprintf("<tr>
						  <td>".$user->id."</td>
						  <td>".$user->name."</td>
						  <td>".$user->email."</td>
						  <td>".$strColors."</td>
						  <td>
							   <a class='btn btn-edit'    onclick='javascript: searchUser(".$user->id.")'>Editar</a>
							   <a class='btn btn-delete'  onclick='javascript: deleteUser(".$user->id.")'>Excluir</a>
						  </td>
					   </tr>");

	}

echo "</table>";








//$users = $connection->query("SELECT * FROM user_colors");
//
//echo "<table border='1'>
//
//    <tr>
//        <th>color_id</th>    
//        <th>user_id</th>            
//    </tr>
//";
//
//foreach($users as $user) {
//
//    echo sprintf("<tr>
//                      <td>%s</td>
//                      <td>%s</td>                      
//                   </tr>",
//        $user->color_id, $user->user_id);
//
//}
//
//echo "</table>";
//

?>



<table>
	<tr>
		<th>ID</th>
		<th>Title</th>
		<th>Body</th>
		<th>Created Time</th>
	</tr>
	
	<?php
		foreach ($post as $value) {
			echo '<td>'.$value["id"].'</td>';
			echo '<td>'.$value["title"].'</td>';
			echo '<td>'.$value["body"].'</td>';
			echo '<td>'.$value["created"].'</td>';
		}
	?>
		
	
</table>
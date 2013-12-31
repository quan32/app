<?php
	echo $this->Html->link('Logout', 
		array('controller' => 'users', 'action' => 'logout'));
?>
<h1>Thread</h1>

<table>
<tr>
	<th>ID</th>
	<th>Title</th>
	<th>Owner</th>
	<th>Detail</th>
</tr>
<?php
	foreach ($threads as $thread) {
		echo '<tr>';
		foreach ($thread as $value) {
			echo '<td>'.$value["id"].'</td>';

			echo '<td>'.$this->Html->link($value['title'],
			 array('controller' => 'posts',
			 	'action' => 'index',
			 	$value['id'])).'</td>';

			echo '<td>'.$value["user_id"].'</td>';

			echo '<td>';
			echo $this->Html->link('Detail', 
				array('action' => 'view', $value["id"]));
			echo '</td>';

		}
		echo '</tr>';
	}
?>
</table>
<?php
	echo $this->Html->link('Add thread', 
		array('controller' => 'threads', 'action' => 'add'));
?>
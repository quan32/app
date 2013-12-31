<h1>Blog Post</h1>
<div>
	<?php
	echo $this->Html->link('Logout', 
		array('controller' => 'users', 'action' => 'logout'));
?>
</div>

<table>
<tr>
	<th>ID</th>
	<th>Title</th>
	<th>Action</th>
	<th>Created Time</th>
</tr>
<?php
	foreach ($posts as $post) {
		echo '<tr>';
		foreach ($post as $value) {
			echo '<td>'.$value["id"].'</td>';

			echo '<td>'.$this->Html->link($value['title'],
			 array('controller' => 'posts',
			 	'action' => 'view',
			 	$value['id'])).'</td>';

			echo '<td>';
			echo $this->Html->link('Edit', 
				array('action' => 'edit', $value["id"]));
			echo " ";
			echo $this->Form->postLink('Delete', 
				array('action' => 'delete', $value["id"]),
				array('confirm' => 'Are you sure?'));
			echo '</td>';

			echo '<td>'.$value["created"].'</td>';
		}
		echo '</tr>';
	}
?>
</table>
<?php
	echo $this->Html->link('Add Post', 
		array('controller' => 'posts', 'action' => 'add'));
?>
<?php
//var_dump($posts);die();

?>
<html>
<head>

<?php
	echo $this->Html->script('jquery-1.10.2.min');
?>

 <script type="text/javascript">
 	// $(document).ready(function(){
 	// 	var auto_refresh = setInterval(function(){
		// $.post(<?php echo '"'.$this->webroot.'threads/listPost1/'.$thread_id.'"' ?>,
		// ,
		// {

		// },
		// function(data, status){
		// 	<?php 
		// 		$posts = json_decode(data);
		// 		print_r($posts);
		// 	?>

			
		// }

		// 	);}, 10000);
 	// });
	

</script>
</head>
<body>
</html>
<h1>Post</h1>
<div>
	<?php
	echo $this->Html->link('Logout', 
		array('controller' => 'users', 'action' => 'logout'));
?>
</div>

<table>
<div id="mainContent">

</div>
<?php
	foreach ($posts as $post) {
		echo '<tr>';
		foreach ($post as $value) {
			echo '<td>'.$value["username"].'</td>';

			echo '<td>'.$value["body"].'</td>';
			echo '<td>';
			echo $this->Html->link('Edit', 
				array('controller'=>'posts','action' => 'edit', $value["id"]));
			echo " ";
			echo $this->Form->postLink('Delete', 
				array('controller'=>'posts','action' => 'delete', $value["id"]),
				array('confirm' => 'Are you sure?'));
			echo '</td>';

			echo '<td>'.$value["created"].'</td>';
		}
		echo '</tr>';
	}
?>
</table>
<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('body', array('rows' => '2'));
	echo $this->Form->end('Save Post');

?>





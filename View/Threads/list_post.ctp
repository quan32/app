<html>
<head>
<?php
	echo $this->Html->script('jquery-1.10.2.min');
?>
 <script type="text/javascript">
		$(document).ready(function(){
			$("#PostBody").focus();
			var interval = setInterval(function(){
				$.ajax({
					type:'POST',
					url:"<?php 
						echo Router::url(array(
							'controller' => 'threads',
							'action' => 'listPost1',
							$thread_id
							));
					?>",
					success:function(data){
						if(data !=""){
						var tag;
						tag = $(data);
						$("#mainContent").html("");
						$("#mainContent").html(tag);
						}
					}

				});
			},1000);
		});
</script>
</head>
<body>
</html>
<h1>Post</h1>



<div id="mainContent">
<table id="table-list" class='table table-striped table-hover'>
	<?php
	foreach ($posts as $post) {
		echo '<tr>';
		foreach ($post as $value) {
			echo '<td>'.$value["username"].'</td>';

			echo '<td>'.$value["body"].'</td>';

			if($user_id === $value['user_id']){
				echo '<td>';
				echo $this->Html->link('Edit', 
					array('controller'=>'posts','action' => 'edit', $value["id"]),
					array('class'=>'btn btn-primary btn-xs')
					);
				echo " ";
				echo $this->Form->postLink('Delete', 
					array('controller'=>'posts','action' => 'delete', $value["id"]),
					array('confirm' => 'Are you sure?', 'class'=>'btn btn-primary btn-xs'));
				echo '</td>';
			}
			else{
				echo '<td></td>';
			}
			

			echo '<td>'.$value["created"].'</td>';
		}
		echo '</tr>';
	}
	?>

	<div id='hidden_tag'></div>
</table>
</div>


<?php
	echo $this->Form->create('Post', array('class'=>'form-horizontal'));
	echo $this->Form->input('body', array('class' => 'form-control', 'rows'=>'1'));
	echo $this->Form->end(array('lable'=>'Send Post', 'class'=>'btn btn-primary btn-lg'));

?>





<div class="users form">
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User',
								array('class'=>'form-horizontal')); ?>

	<fieldset>
		<legend>
			<?php echo __('<h1>Please enter your username and password</h1>'); ?>
		</legend>
		<?php echo $this->Form->input('username',
									array('class' => 'form-control')
									);
		echo $this->Form->input('password',
									array('class' => 'form-control'));
		?>
	</fieldset>
	<?php echo $this->Form->end(array('Send Post', 'class'=>'btn btn-primary')); ?>
</div>
<?php
	echo $this->Html->link('Add user', 
		array('controller' => 'users', 'action' => 'add'),
			array('class'=>'btn btn-primary')
		);
?>
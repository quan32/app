<div class="users form">
	<?php echo $this->Form->create('User',
		array('class'=>'form-horizontal')
	); ?>
	<fieldset>
		<legend><?php echo __('Register New User'); ?></legend>
		<?php 
		echo $this->Form->input('username',
			array('class' => 'form-control')
			);
		echo $this->Form->input('password',
			array('class' => 'form-control')
			);
		?>
	</fieldset>

	<?php echo $this->Form->end(array('label'=>'Add user','class'=>'btn btn-primary')); ?>
</div>

<h1>Add Thread</h1>
<?php
	echo $this->Form->create('Thread');
	echo $this->Form->input('title');
	echo $this->Form->input('description', array('rows' => '10'));
	echo $this->Form->end('Save Thread');

?>
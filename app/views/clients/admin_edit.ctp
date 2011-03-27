<div class="clients form">
<?php echo $form->create('Client');?>
	<fieldset>
 		<legend><?php __('Edit Client');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Client.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Client.id'))); ?></li>
		<li><?php echo $html->link(__('List Clients', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Projects', true), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Project', true), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
</div>

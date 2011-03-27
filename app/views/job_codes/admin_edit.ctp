<div class="jobCodes form">
<?php echo $form->create('JobCode');?>
	<fieldset>
 		<legend><?php __('Edit JobCode');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('project_id');
		echo $form->input('code');
		echo $form->input('description');
		echo $form->input('initial');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('JobCode.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('JobCode.id'))); ?></li>
		<li><?php echo $html->link(__('List JobCodes', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Projects', true), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Project', true), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
</div>

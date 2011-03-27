<div class="projects form">
<?php echo $form->create('Project');?>
	<fieldset>
 		<legend><?php __('Edit Project');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('client');
		echo $form->input('language');
		echo $form->input('dns_dev');
		echo $form->input('dns_proto');
		echo $form->input('dns_live');
		echo $form->input('database_name');
		echo $form->input('subversion_url');
		echo $form->input('bugtracker_id');
		echo $form->input('wiki_url');
		echo $form->input('Employee');
		echo $form->input('JobCode');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Project.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Project.id'))); ?></li>
		<li><?php echo $html->link(__('List Projects', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Employees', true), array('controller'=> 'employees', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Employee', true), array('controller'=> 'employees', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Job Codes', true), array('controller'=> 'job_codes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Job Code', true), array('controller'=> 'job_codes', 'action'=>'add')); ?> </li>
	</ul>
</div>

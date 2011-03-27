<div class="jobCodes form">
<?php echo $form->create('JobCode', array('action'=>'edit'));?>
    <h3>Jobcode Edit:</h3>

    <fieldset class="module aligned">
        <div class="form-row">
		    <? echo $form->input('project_id'); ?>
        </div>
        <div class="form-row">
		    <? echo $form->input('code'); ?>
        </div>
        <div class="form-row">
		    <? echo $form->input('description'); ?>
        </div>
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

<div class="jobCodes form">
<?php echo $form->create('JobCode');?>
    <h3>Add Job:</h3>
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
		<li><?php echo $html->link(__('List JobCodes', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Projects', true), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Project', true), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
</div>

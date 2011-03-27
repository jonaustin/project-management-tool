<div class="jobCodes index">
<h2><?php __('JobCodes');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('project_id');?></th>
	<th><?php echo $paginator->sort('code');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('initial');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($jobCodes as $jobCode):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $jobCode['JobCode']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($jobCode['Project']['name'], array('controller'=> 'projects', 'action'=>'view', $jobCode['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $jobCode['JobCode']['code']; ?>
		</td>
		<td>
			<?php echo $jobCode['JobCode']['description']; ?>
		</td>
		<td>
			<?php echo $jobCode['JobCode']['initial']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $jobCode['JobCode']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $jobCode['JobCode']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $jobCode['JobCode']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $jobCode['JobCode']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New JobCode', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Projects', true), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Project', true), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
</div>

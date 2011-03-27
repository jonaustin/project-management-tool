<div class="projects index">
<h2><?php __('Projects');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('client');?></th>
	<th><?php echo $paginator->sort('language');?></th>
	<th><?php echo $paginator->sort('dns_dev');?></th>
	<th><?php echo $paginator->sort('dns_proto');?></th>
	<th><?php echo $paginator->sort('dns_live');?></th>
	<th><?php echo $paginator->sort('database_name');?></th>
	<th><?php echo $paginator->sort('subversion_url');?></th>
	<th><?php echo $paginator->sort('bugtracker_id');?></th>
	<th><?php echo $paginator->sort('wiki_url');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($projects as $project):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $project['Project']['id']; ?>
		</td>
		<td>
			<?php echo $project['Project']['name']; ?>
		</td>
		<td>
			<?php echo $project['Project']['client']; ?>
		</td>
		<td>
			<?php echo $project['Project']['language']; ?>
		</td>
		<td>
			<?php echo $project['Project']['dns_dev']; ?>
		</td>
		<td>
			<?php echo $project['Project']['dns_proto']; ?>
		</td>
		<td>
			<?php echo $project['Project']['dns_live']; ?>
		</td>
		<td>
			<?php echo $project['Project']['database_name']; ?>
		</td>
		<td>
			<?php echo $project['Project']['subversion_url']; ?>
		</td>
		<td>
			<?php echo $project['Project']['bugtracker_id']; ?>
		</td>
		<td>
			<?php echo $project['Project']['wiki_url']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $project['Project']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $project['Project']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?>
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
		<li><?php echo $html->link(__('New Project', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Employees', true), array('controller'=> 'employees', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Employee', true), array('controller'=> 'employees', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Job Codes', true), array('controller'=> 'job_codes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Job Code', true), array('controller'=> 'job_codes', 'action'=>'add')); ?> </li>
	</ul>
</div>

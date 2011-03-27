<div class="clients view">
<h2><?php  __('Client');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $client['Client']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Client', true), array('action'=>'edit', $client['Client']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Client', true), array('action'=>'delete', $client['Client']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $client['Client']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Clients', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Client', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Projects', true), array('controller'=> 'projects', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Project', true), array('controller'=> 'projects', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Projects');?></h3>
	<?php if (!empty($client['Project'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Client Id'); ?></th>
		<th><?php __('Language'); ?></th>
		<th><?php __('Dns Dev'); ?></th>
		<th><?php __('Dns Proto'); ?></th>
		<th><?php __('Dns Live'); ?></th>
		<th><?php __('Database Name'); ?></th>
		<th><?php __('Subversion Url'); ?></th>
		<th><?php __('Bugtracker Id'); ?></th>
		<th><?php __('Wiki Url'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['Project'] as $project):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $project['id'];?></td>
			<td><?php echo $project['name'];?></td>
			<td><?php echo $project['client_id'];?></td>
			<td><?php echo $project['language'];?></td>
			<td><?php echo $project['dns_dev'];?></td>
			<td><?php echo $project['dns_proto'];?></td>
			<td><?php echo $project['dns_live'];?></td>
			<td><?php echo $project['database_name'];?></td>
			<td><?php echo $project['subversion_url'];?></td>
			<td><?php echo $project['bugtracker_id'];?></td>
			<td><?php echo $project['wiki_url'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'projects', 'action'=>'view', $project['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'projects', 'action'=>'edit', $project['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'projects', 'action'=>'delete', $project['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Project', true), array('controller'=> 'projects', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>

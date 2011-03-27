<div class="projects view">
<h2><?php  __('Project');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Client'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['client']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Language'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['language']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dns Dev'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['dns_dev']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dns Proto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['dns_proto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dns Live'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['dns_live']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Database Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['database_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subversion Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['subversion_url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bugtracker Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['bugtracker_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Wiki Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['wiki_url']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Project', true), array('action'=>'edit', $project['Project']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Project', true), array('action'=>'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Projects', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Project', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Employees', true), array('controller'=> 'employees', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Employee', true), array('controller'=> 'employees', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Job Codes', true), array('controller'=> 'job_codes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Job Code', true), array('controller'=> 'job_codes', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Employees');?></h3>
	<?php if (!empty($project['Employee'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('First'); ?></th>
		<th><?php __('Position Type'); ?></th>
		<th><?php __('Position Sub Type'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['Employee'] as $employee):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $employee['id'];?></td>
			<td><?php echo $employee['email'];?></td>
			<td><?php echo $employee['first'];?></td>
			<td><?php echo $employee['position_type'];?></td>
			<td><?php echo $employee['position_sub_type'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'employees', 'action'=>'view', $employee['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'employees', 'action'=>'edit', $employee['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'employees', 'action'=>'delete', $employee['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $employee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Employee', true), array('controller'=> 'employees', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Job Codes');?></h3>
	<?php if (!empty($project['JobCode'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Code'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['JobCode'] as $jobCode):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $jobCode['id'];?></td>
			<td><?php echo $jobCode['code'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'job_codes', 'action'=>'view', $jobCode['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'job_codes', 'action'=>'edit', $jobCode['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'job_codes', 'action'=>'delete', $jobCode['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $jobCode['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Job Code', true), array('controller'=> 'job_codes', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>

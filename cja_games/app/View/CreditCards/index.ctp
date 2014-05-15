<div class="creditCards index">
	<h2><?php echo __('Credit Cards'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('expiration_date'); ?></th>
			<th><?php echo $this->Paginator->sort('name_on_card'); ?></th>
			<th><?php echo $this->Paginator->sort('number'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($creditCards as $creditCard): ?>
	<tr>
		<td><?php echo h($creditCard['CreditCard']['id']); ?>&nbsp;</td>
		<td><?php echo h($creditCard['CreditCard']['expiration_date']); ?>&nbsp;</td>
		<td><?php echo h($creditCard['CreditCard']['name_on_card']); ?>&nbsp;</td>
		<td><?php echo h($creditCard['CreditCard']['number']); ?>&nbsp;</td>
		<td><?php echo h($creditCard['CreditCard']['type']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($creditCard['User']['name'], array('controller' => 'users', 'action' => 'view', $creditCard['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $creditCard['CreditCard']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $creditCard['CreditCard']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $creditCard['CreditCard']['id']), null, __('Are you sure you want to delete # %s?', $creditCard['CreditCard']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Credit Card'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

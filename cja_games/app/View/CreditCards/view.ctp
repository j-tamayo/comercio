<div class="creditCards view">
<h2><?php echo __('Credit Card'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($creditCard['CreditCard']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiration Date'); ?></dt>
		<dd>
			<?php echo h($creditCard['CreditCard']['expiration_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name On Card'); ?></dt>
		<dd>
			<?php echo h($creditCard['CreditCard']['name_on_card']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($creditCard['CreditCard']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($creditCard['CreditCard']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($creditCard['User']['name'], array('controller' => 'users', 'action' => 'view', $creditCard['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Credit Card'), array('action' => 'edit', $creditCard['CreditCard']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Credit Card'), array('action' => 'delete', $creditCard['CreditCard']['id']), null, __('Are you sure you want to delete # %s?', $creditCard['CreditCard']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Credit Cards'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit Card'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="creditCards form">
<?php echo $this->Form->create('CreditCard'); ?>
	<fieldset>
		<legend><?php echo __('Add Credit Card'); ?></legend>
	<?php
		echo $this->Form->input('expiration_date');
		echo $this->Form->input('name_on_card');
		echo $this->Form->input('number');
		echo $this->Form->input('type');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Credit Cards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

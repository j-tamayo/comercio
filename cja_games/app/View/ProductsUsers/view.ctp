<div class="productsUsers view">
<h2><?php echo __('Products User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productsUser['ProductsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productsUser['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsUser['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productsUser['User']['name'], array('controller' => 'users', 'action' => 'view', $productsUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($productsUser['ProductsUser']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($productsUser['ProductsUser']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($productsUser['ProductsUser']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Products User'), array('action' => 'edit', $productsUser['ProductsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Products User'), array('action' => 'delete', $productsUser['ProductsUser']['id']), null, __('Are you sure you want to delete # %s?', $productsUser['ProductsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Products User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

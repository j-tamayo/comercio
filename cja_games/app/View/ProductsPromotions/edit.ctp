<div class="productsPromotions form">
<?php echo $this->Form->create('ProductsPromotion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Products Promotion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('promotion_id');
		echo $this->Form->input('product_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProductsPromotion.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProductsPromotion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Products Promotions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Promotions'), array('controller' => 'promotions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promotion'), array('controller' => 'promotions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

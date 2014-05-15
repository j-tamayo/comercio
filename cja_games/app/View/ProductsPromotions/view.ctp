<div class="productsPromotions view">
<h2><?php echo __('Products Promotion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($productsPromotion['ProductsPromotion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Promotion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productsPromotion['Promotion']['name'], array('controller' => 'promotions', 'action' => 'view', $productsPromotion['Promotion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($productsPromotion['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsPromotion['Product']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Products Promotion'), array('action' => 'edit', $productsPromotion['ProductsPromotion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Products Promotion'), array('action' => 'delete', $productsPromotion['ProductsPromotion']['id']), null, __('Are you sure you want to delete # %s?', $productsPromotion['ProductsPromotion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products Promotions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Products Promotion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Promotions'), array('controller' => 'promotions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promotion'), array('controller' => 'promotions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

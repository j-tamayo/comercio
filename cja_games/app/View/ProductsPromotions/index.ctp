<div class="productsPromotions index">
	<h2><?php echo __('Products Promotions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('promotion_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($productsPromotions as $productsPromotion): ?>
	<tr>
		<td><?php echo h($productsPromotion['ProductsPromotion']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($productsPromotion['Promotion']['name'], array('controller' => 'promotions', 'action' => 'view', $productsPromotion['Promotion']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($productsPromotion['Product']['name'], array('controller' => 'products', 'action' => 'view', $productsPromotion['Product']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $productsPromotion['ProductsPromotion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $productsPromotion['ProductsPromotion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $productsPromotion['ProductsPromotion']['id']), null, __('Are you sure you want to delete # %s?', $productsPromotion['ProductsPromotion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Products Promotion'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Promotions'), array('controller' => 'promotions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promotion'), array('controller' => 'promotions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="productsUsers form">
<?php echo $this->Form->create('ProductsUser'); ?>
	<fieldset>
		<legend><?php echo __('Buy Product'); ?></legend>
	<?php
		
		echo '<label><h1> Datos De Envio </h1></label>';
		echo $this->Form->input('telephone' ,array('type'=>'tel'));
		echo $this->Form->input('direccion', array('type'=>'textarea', 'rows' => 3, 'cols' => 3));
		echo $this->Form->input('Pais');
		echo $this->Form->input('Ciudad');
		echo $this->Form->input('zip');

		echo '<label><h1> Datos De Tarjeta </h1></label>';
		echo $this->Form->input('Number CreditCard');
		echo $this->Form->input('cvc',array('type'=>'password'));
		echo $this->Form->input('vencimiento CreditCard');

		echo '<label><h1> Datos De Producto </h1></label>';
		echo '<label><h2> Product: '.$producto['Product']['name'].'</h2></label>';
		echo '<label><h3>Price : '.$producto['Product']['price'].'$</h3></label>';
		echo $this->Html->image($producto['Product']['image'],array('class'=>'thumbnail'));
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="productsUsers form">
<?php echo $this->Form->create('ProductsUser'); ?>
	<fieldset>
		<legend><?php echo __('Buy Product'); ?></legend>
	<?php
		echo '<label><h1> Datos De Envio</h1></label>';
		echo '<label><h4> Costo adicional de envio: '.$costo.'</h4></label>';
		echo '<label><h4> Fecha Entrega: '.$fecha.'</h4></label>';

		echo '<label><h1> Datos De Tarjeta </h1></label>';
		echo $this->Form->input('creditCard',array('label'=>'Number CreditCard'));
		echo $this->Form->input('cvc',array('type'=>'password'));
		echo $this->Form->input('vencimiento',array('label'=>'vencimiento CreditCard'));

		echo '<label><h2> Total a Pagar: </h2> <h3>$'.$valor.'</h3> </label>';

		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

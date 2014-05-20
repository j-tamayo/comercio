<div class="productsUsers form">
<?php echo $this->Form->create('ProductsUser'); ?>
	<fieldset>
		<legend><?php echo __('Buy Product'); ?></legend>
	<?php

		echo '<label><h1> Datos del Producto </h1></label>';
		echo '<label><h3> Juego: '.$producto['Product']['name'].'</h3></label>';
		echo '<label><h3>Precio: Bs '.$producto['Product']['price'].'</h3></label>';
		echo $this->Html->image($producto['Product']['image'],array('class'=>'thumbnail'));
		echo $this->Form->input('Cantidad',array('default'=>1,'onchange'=>'price(event,'.$producto['Product']['price'].')'));
		echo '<label><h3> Precio Total: </h3> <h3><div id="priceP1">$'.$valor.'</h3></div> </label>';

		echo '<label><h1> Datos De Envio </h1></label>';
		echo '<label><h3> Name : '.$this->Session->read('Auth.User.name').' '.$this->Session->read('Auth.User.lastname').'</h3></label>';
		echo $this->Form->input('tel&eacute;fono' ,array('type'=>'tel'));
		echo $this->Form->input('direcci&oacute;n', array('type'=>'textarea', 'rows' => 3, 'cols' => 3));
		echo $this->Form->input('Pa&iacute;s');
		echo $this->Form->input('Ciudad');
		echo $this->Form->input('zip');

		echo '<label><h1> Datos De Tarjeta </h1></label>';
		echo $this->Form->input('N&uacute;mero');
		echo $this->Form->input('cvc',array('type'=>'password'));
		echo $this->Form->input('vencimiento');

		echo '<label><h2> Total a Pagar: </h2> 
		<h3><div id="priceP">
			<p>Juegos     Bs '.$valor.' </p>
			<p  style="margin-left:5px"></p>
			<span class="glyphicon glyphicon-plus"></span>
		
		</h3></div> </label>';

		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

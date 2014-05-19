<div class="users form">
<?php echo $this->Form->create('User', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('lastname');
		echo $this->Form->input('sexo',array(
   			 'options' => array('Hombre','Mujer'),
   			 'empty' => 'Elige'
		));
		echo $this->Form->input('email');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('confirm_password', array('type' => 'password'));
		echo $this->Form->input('mailing_address');
		echo $this->Form->input('city_id');
	
	echo $this->Form->input('img_perfil',array('type' => 'file','onchange'=>'cargar(event)')); ?>
	<div class="input" id="vacio" style='visibility:hidden;'>
		<label>Imagen Perfil</label>

		<?php
			echo $this->Html->image("#", array('id'=>'img'));
		?>
	</div>

	

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cities'), array('controller' => 'cities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City'), array('controller' => 'cities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carts'), array('controller' => 'carts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cart'), array('controller' => 'carts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Credit Cards'), array('controller' => 'credit_cards', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit Card'), array('controller' => 'credit_cards', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>

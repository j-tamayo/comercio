<div class="users form">
<?php echo $this->Form->create('User', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Register'); ?></legend>
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
		echo $this->Form->input('mailing_address', array('type'=>'textarea', 'rows' => 10, 'cols' => 35));
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

<?php echo $this-> element('categorias');?>
<div class="col-md-9">	

<?php
	echo '<div class="thumbnail">';
		echo $this->Html->image($productos[$i]['Product']['image'],'class'=>'slide-image');
		//<img class="img-responsive" src="http://placehold.it/800x300" alt="">
		echo'<div class="caption-full">
			<h4 class="pull-right"> $'.$productos[$i]['Product']['price'].'</h4>
			<h4><a href="#">'.$productos[$i]['Product']['name'].'</a>
			</h4>
			<p>'.$productos[$i]['Product']['description'].'</p>
		</div>
	</div>';
?>
	<div class="well">

		<div class="text-right">
			<button type="button" class="btn btn-success">
				Agregar al carro <span class="glyphicon glyphicon-shopping-cart"></span>
			</button>
		</div>

	</div>
</div>
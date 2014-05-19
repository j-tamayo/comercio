  <div class="col-md-3">
                <p class="lead">Categor&iacute;as</p>
                <div class="list-group">
                	<?php foreach ($categorias as $categoria):
                	echo $this->Html->link($categoria['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoria['Category']['id']),array('class'=>'list-group-item')); 
                	endforeach; ?>
				</div>
 </div>
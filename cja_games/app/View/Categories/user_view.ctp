<?php echo $this-> element('categorias');?>
<div class="col-md-9" id="content">
	<div class="row">
	
		
		<?php foreach ($products as $product): ?>

			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">'
					<?php echo $this->Html->image($product['Product']['image']);?>
					<div class="caption">
						<h4 class="pull-right"> Bs <?php echo $product['Product']['price']?></h4>
						<h4><a href="#"><?php echo $product['Product']['name']?></a></h4>
						<p><?php echo $product['Product']['description']?></p>
						<div class="ratings">
                            <!--<p class="pull-right">100 reviews</p>-->
                           <p>
                           		<span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                            </p>
                        </div>
					</div>
				</div>
			</div>

			
		    
		<?php endforeach; ?>
	
	</div>
</div>
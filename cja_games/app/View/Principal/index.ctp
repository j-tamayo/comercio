<?php echo $this-> element('categorias');?>
<div class="col-md-9" id="content">
<div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                            <?php
                           	 	echo '<div class="item active">';
                                  	echo $this->Html->image('bienvenidos.jpg', array('class'=>array('thumb','slide-image')));
                                echo "</div>"; 
                        		for ($i=0; $i<=5; $i++) {
									 echo  '<div class="item">';
									 echo $this->Html->image($productos[$i]['Product']['image'], array('class'=>'slide-image'));
                               		echo '</div>';
									} 
							?>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

                	  <?php
                		for ($i=0; $i<=5; $i++) {
                			echo '<div class="col-sm-4 col-lg-4 col-md-4">
		                        <div class="thumbnail">';
		                           echo $this->Html->image($productos[$i]['Product']['image']);
		                           echo'<div class="caption">
		                                <h4 class="pull-right"> $'.$productos[$i]['Product']['price'].'</h4>
		                                <h4><a href="#">'.$productos[$i]['Product']['name'].'</a>
		                                </h4>
		                                <p>'.$productos[$i]['Product']['description'].'</p>';
									echo '
		                            </div>';
		                             if($this->Session->check('Auth.User')){
									  echo $this->Html->link('Buy', array('controller' => 'ProductsUsers', 'action' => 'buy',$productos[$i]['Product']['id']));
									  } 
		                            
		                            echo '
		                            <div class="ratings">
		                                <p class="pull-right">100 reviews</p>
		                                <p>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                    <span class="glyphicon glyphicon-star"></span>
		                                </p>
		                            </div>
		                        </div>
		                    </div>'
								;
							} 
					?>

	</div>
</div>

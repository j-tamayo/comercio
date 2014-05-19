<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo "CJA_GAMES " ?>
		<?php echo $title_for_layout; ?>
	</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php
		echo $this->Html->meta('icon','cja.ico');

		echo $this->Html->css(array('bootstrap',
									'bootstrap.min',
									'shop-homepage'));
	
	
	 echo $this->Html->script(array('jquery.min','bootstrap.min',
										 'cja',
										 'js_debug_toolbar'
										 ));


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body>

	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="header">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>  
           <?php  echo $this->Html->link('CJA-Games',"/principal",array('class'=>'navbar-brand') );?>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                	<li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        	<?php if(!$this->Session->check('Auth.User')){
							  echo 'Account';
							}else
							{
							 $var=$this->Session->read();
							 echo $var['Auth']['User']['username'];

							}
                        	?>
                        	<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                        	<?php
                        	if(!$this->Session->check('Auth.User')){
							  echo '<li>'.$this->Html->link('Register', array('controller' => 'Users', 'action' => 'register',)).'</li>';
							}
                        	echo $this-> element('login_menu');
                        	 ?>
                        </ul>
                    </li>
					<li><a href="#about">About</a>
                    </li>
                    <li><a href="#services">Services</a>
                    </li>
                    <li><a href="#contact">Contact</a>
                    </li>
				
                </ul>

            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>

 <!-- /.container -->
	<div class="container" id="container">
		<div class="row">
		
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
					
			
		</div>
	</div>
	<!-- /.container -->
	
	<div class="container" id="footer">
        <hr>
		<footer>
			<div class="row">
				<div class="col-lg-12">
					<p>Copyright &copy; Company 2014 - CJA-Games</p>
				</div>
			</div>
		</footer>
	</div>
	
	
	
</body>
</html>

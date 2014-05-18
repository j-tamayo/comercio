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

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#home">CJA-Games</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
					<li><?php echo $this-> element('login_menu'); ?>
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

            <div class="col-md-3">
                <p class="lead">Categor&iacute;as</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Acci&oacute;n</a>
                    <a href="#" class="list-group-item">Aventura</a>
                    <a href="#" class="list-group-item">Carreras</a>
					<a href="#" class="list-group-item">Deportivos</a>
					<a href="#" class="list-group-item">Educativos</a>
					<a href="#" class="list-group-item">Estrategia</a>
					<a href="#" class="list-group-item">Horror</a>
					<a href="#" class="list-group-item">Lucha</a>
					<a href="#" class="list-group-item">RPG</a>
				</div>
            </div>

            <div class="col-md-9" id="content">
		
				<?php echo $this->Session->flash(); ?>

				<?php echo $this->fetch('content'); ?>
					
			</div>
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
	
	<!-- /.JavaScript -->
	
	<?php echo $this->Html->script(array('cja',
										 'jquery',
										 'js_debug_toolbar',
										 'jquery-1.10.2',
										 'bootstrap',
										 'bootstrap.min'
										 ));
	?>
	
</body>
</html>

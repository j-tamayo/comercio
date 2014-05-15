<?php
  # /app/views/elements/email/text/user_confirm.ctp
  ?>
  Hola <?= $username ?>,ya casi tenemos configurada la cuenta, pero primero sólo tienes que confirmar tu cuenta de usuario haciendo clic en el enlace de abajo:
<?= $activate_url?>


<?php echo $html->link('Link Text', 'http://www.google.com'); ?>



<?php
  # /app/views/elements/email/text/user_confirm.ctp
  ?>

 <p> Hola <?= $user['User']['name'] ?> Bienvenido a CJA_GAMES. Ya casi tenemos configurada la cuenta, pero sólo tienes que confirmar tu cuenta de usuario haciendo clic en el enlace de abajo: </p>

<p>
		<a href=<?= $activate_url?>>Activa Tu Cuenta CJA_GAMES Aqui</a>
</p>
<p>
Tu Cuenta :<?= $user['User']['username'] ?>
</p>
<p>
Tu Clave : <?= $user['User']['confirm_password'] ?>
</p>


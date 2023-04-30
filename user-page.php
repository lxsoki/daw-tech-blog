<?php

include('server/authentication.php');
?>
<div>user page works? :D</div>

<h5>username: <?= $_SESSION['auth_user']['name'] ?></h5>
<h5>username: <?= $_SESSION['auth_user']['email'] ?></h5>
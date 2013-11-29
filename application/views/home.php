
<?php if (isset($user)): ?>
<h1>Hi <?= $user->name ?>, you're now logged :), <a href="<?= site_url('logout') ?>">Logout</a></h1>
<?php else: ?>
<h1>You're not logged, <a href="<?= site_url('login') ?>">Login</a>.</h1>
<?php endif ?>


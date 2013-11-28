<div class="grid-container">
  <div class="grid-100">
    <h1>Login</h1>
    <?= form_open('login/submit') ?>
    <?= form_label('Your email', 'email') ?>
    <?= form_input(array(
      'name'  => 'email',
      'value' => isset($email) ? $email : null
    )) ?>
    <?= form_label('Your password', 'password') ?>
    <?= form_input(array(
      'name'  => 'password',
      'type'  => 'password'
    )) ?>
    <?= form_submit('submit', 'Login') ?>
    <?= form_close() ?>
  </div>
</div>


<div class="grid-container">
  <div class="grid-100">
    <h1>Install the blog</h1>
    <?= form_open('install/submit') ?>
    <?= form_label('Add your email', 'email') ?>
    <?= form_input(array(
      'name'  => 'email',
      'value' => isset($email) ? $email : null
    )) ?>
    <?= form_label('Your password', 'password') ?>
    <?= form_input(array(
      'name'  => 'password',
      'type'  => 'password'
    )) ?>
    <?= form_submit('submit', 'Add this admin') ?>
    <?= form_close() ?>
  </div>
</div>


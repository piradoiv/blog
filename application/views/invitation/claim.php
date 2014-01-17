
<div class="grid-container">
  <div class="grid-50 push-25">
    <?= form_open('invitation/register') ?>
    <?= form_hidden('token', $token) ?>
    <p>
      <?= form_label('Email:', 'email') ?><br />
      <?= form_input('email') ?>
    </p>
    <p>
      <?= form_label('Password:', 'password') ?><br />
      <?= form_password('password') ?>
    </p>
    <?= form_submit('submit', 'Register') ?>
    <?= form_close() ?>
  </div>
</div>


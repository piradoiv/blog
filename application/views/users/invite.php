
<div class="grid-container">
  <div class="grid-50 push-25">
    <h1>Invite an user</h1>
    <?= form_open("users/send_invitation") ?>
    <p>
      <?= form_label('Email:', 'email') ?><br />
      <?= form_input('email') ?>
    </p>
    <?= form_submit('submit', 'Send invitation') ?>
    <?= form_close() ?>
  </div>
</div>

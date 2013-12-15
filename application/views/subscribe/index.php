
<div class="grid-container">
  <div class="grid-50 push-25 subscribe" style="text-align: center">
    <?= form_open('subscribe/submit') ?>
    <?= form_input('email', null, 'placeholder="Email"') ?><br />
    <?= form_submit('submit', 'Subscribe') ?>
    <?= form_close() ?>
  </div>
</div>


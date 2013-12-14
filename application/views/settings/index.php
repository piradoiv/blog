
<div class="grid-container">
  <?= form_open('settings/update') ?>
    <div class="grid-50 push-25">
      <p>
        <div class="grid-50">
          <?= form_label('Name:', 'name') ?>
          <?= form_input('name', $user->name) ?>
        </div>
        <div class="grid-50">
          <?= form_label('Last name:', 'surname') ?>
          <?= form_input('surname', $user->surname) ?>
        </div>
      </p>
      <p>
        <div class="grid-100">
          <?= form_label('Bio:', 'bio') ?><br />
          <?= form_textarea('bio', $user->bio) ?>
        </div>
      </p>

      <p>
        <?= form_submit('submit', 'Update profile') ?>
      </p>
    </div>
  <?= form_close() ?>
</div>


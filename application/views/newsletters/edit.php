
<div class="grid-container">
  <div class="row">
    <div class="grid-50 push-25">
      <h1>Newsletters edit</h1>
      <?= form_open("newsletters/edit_submit/{$newsletter->id}") ?>
      <p>
        <?= form_label('Subject:', 'subject') ?><br />
        <?= form_input('subject', $newsletter->subject) ?>
      </p>
      <p>
        <?= form_label('Plain text email:', 'contents') ?><br />
        <?= form_textarea('contents', $newsletter->contents) ?>
      </p>
      <?= form_submit('action', 'Save') ?>
      <?= form_submit('action', 'Publish') ?>
      <?= form_submit('action', 'Delete') ?>
      <?= form_close() ?>
    </div>
  </div>
</div>


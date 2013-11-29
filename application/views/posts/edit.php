
<div class="grid-container">
  <div class="grid-50">
    <?= form_open("posts/update/{$post->id}") ?>
    <?= form_input('title', $post->title) ?>
    <?= form_input('subtitle', $post->subtitle) ?>
    <?= form_input('slug', $post->slug) ?>
    <?= form_textarea('contents', $post->contents) ?>
    <?= form_dropdown('published',
      array('no' => 'No', 'yes' => 'Yes'), $post->published)
    ?>
    <?= form_submit('submit', 'Save') ?>
    <?= form_close() ?>
  </div>
  <div class="grid-50">

  </div>
</div>


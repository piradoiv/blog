
<div class="grid-container">
  <div class="grid-50">
    <?= form_open("posts/update/{$post->id}") ?>
    <p>
      <?= form_label('Title', 'title') ?>
      <?= form_input('title', $post->title) ?>
    </p>
    <p>
      <?= form_label('Subtitle', 'subtitle') ?>
      <?= form_input('subtitle', $post->subtitle) ?>
    </p>
    <p>
      <?= form_label(site_url('p').'/', 'slug') ?>
      <?= form_input('slug', $post->slug) ?>
    </p>
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


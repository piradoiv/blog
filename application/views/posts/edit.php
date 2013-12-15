
<div class="grid-container">
  <div class="grid-50">
    <div class="article-editor">
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
        <?= form_label(base_url(), 'slug') ?>
        <?= form_input('slug', $post->slug) ?>
      </p>
      <?= form_textarea('contents', $post->contents, 'class="article-contents"') ?>

      <p>
        <?= form_label('Tags', 'tags') ?>
        <?= form_input('tags', $post->implodeTags()) ?>
      </p>

      <p>
        <?= form_label('Published') ?>
        <?= form_dropdown('published',
          array('no' => 'No', 'yes' => 'Yes'), $post->published)
        ?>
        <?= form_submit('submit', 'Save') ?>
        <?php if (isset($post->id)): ?>
          <a href="<?= $post->permalink() ?>">View post</a>
          <a href="<?= $post->permalink('delete') ?>" onclick="return confirm('Are you sure?')">Delete</a>
        <?php endif ?>
      </p>
      <?= form_close() ?>
    </div>
    &nbsp;
  </div>
  <div class="grid-50 article-preview">
  </div>
</div>
<script>
  var articleId  = '<?= $post->id ?>';
  var previewUrl = '<?= site_url("posts/preview/{$post->id}") ?>';
</script>


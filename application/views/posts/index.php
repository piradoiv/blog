
<div class="grid-container">
  <div class="grid-50 push-25">
  <?php foreach ($posts as $current): ?>
    <div class="post" style="margin-bottom: 25px;">
      <div class="title">
        <a href="<?= $current->permalink() ?>">
          <?= $current->title ?>
        </a>
      </div>
      <div class="subtitle">
        <?= $current->subtitle ?>
      </div>
    </div>
  <?php endforeach ?>
  </div>
</div>


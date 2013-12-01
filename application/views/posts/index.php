
<div class="grid-container">
  <div class="grid-50 push-25">
  <?php foreach ($posts as $current): ?>
    <div class="post" style="margin-bottom: 25px;">
      <h2 class="title">
        <a href="<?= $current->permalink() ?>">
          <?= $current->title ?>
        </a>
      </h2>
      <div class="subtitle">
        <?= $current->subtitle ?>
      </div>
    </div>
  <?php endforeach ?>
  </div>
</div>


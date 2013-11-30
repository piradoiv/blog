
<ul>
<?php foreach ($posts as $current): ?>
  <li>
    <a href="<?= $current->permalink() ?>">
      #<?= $current->id ?> <?= $current->title ?>
    </a>
  </li>
<?php endforeach ?>
</ul>


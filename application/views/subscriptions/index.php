
<div class="grid-container">
  <div class="grid-50 push-25">
    <h1>Subscriptions</h1>
    <p>
      You have <strong><?= $subscriptionsCounter ?>
      </strong> loyal subscribers awaiting for your lovely
      newsletters. Don't disappoint them! :)
    </p>

    <h2>Drafts (<a href="<?= site_url('newsletters/create') ?>">Add one</a>)</h2>
    <?php if (!$drafts->result_count()): ?>
      <p>Nope.</p>
    <?php else: ?>
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($drafts as $current): ?>
        <tr>
          <td><?= $current->subject ?></td>
          <td>
            <a href="<?= site_url("newsletters/edit/{$current->id}") ?>">
              Edit
            </a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <?php endif ?>

    <h2>Recently sent</h2>
    <?php if (!$recent->result_count()): ?>
      <p>Nope.</p>
    <?php else: ?>
    <ul>
      <?php foreach ($recent as $current): ?>
        <li>
          <?= $current->subject ?>
       </li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
  </div>
</div>



<div class="grid-container">
  <div class="grid-50 push-25">
    <h1>Users</h1>
    <p>
      There are <strong><?= $usersCount ?></strong>
      active users, <strong><?= $inviteCount ?></strong>
      invitations are pending to be accepted.
    </p>

    <a href="<?= site_url('users/invite') ?>">Invite</a>.
  </div>
</div>

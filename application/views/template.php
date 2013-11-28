<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<title><?= isset($pageTitle) ? $pageTitle : null ?></title>
<!--[if lt IE 9]>
  <script src="<?= base_url() ?>/unsemantic/javascripts/html5.js"></script>
<![endif]-->
<!--[if (gt IE 8) | (IEMobile)]><!-->
  <link rel="stylesheet" href="<?= base_url() ?>/unsemantic/stylesheets/unsemantic-grid-responsive.css" />
<!--<![endif]-->
<!--[if (lt IE 9) & (!IEMobile)]>
  <link rel="stylesheet" href="<?= base_url() ?>/unsemantic/stylesheets/ie.css" />
<![endif]-->
</head>
<body>

  <?= isset($yield) ? $yield : null ?>

  <script src="<?= base_url() ?>/unsemantic/javascripts/jquery.js"></script>
</body>
</html>


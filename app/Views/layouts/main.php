<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= esc($title ?? 'mazehunt') ?></title>
  <link rel="stylesheet" href="<?= asset('assets/css/app.css') ?>">
  <?= $this->renderSection('styles') ?>
</head>
<body>
  <?= $this->renderSection('content') ?>
  <script src="<?= asset('assets/js/app.js') ?>"></script>
  <?= $this->renderSection('scripts') ?>
</body>
</html>

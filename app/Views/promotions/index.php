<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>MazeHunt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->extend('layouts/main') ?>
    <?= $this->section('content') ?>
</head>
<body>
  <div class="toolbar">
    <h1>Promoções</h1>
    <a class="btn" href="<?= site_url('promotions/create') ?>">Nova promoção</a>
  </div>

  <?php if (session()->getFlashdata('msg')): ?>
    <p><?= esc(session()->getFlashdata('msg')) ?></p>
  <?php endif; ?>

    <div class="grid">
    <?php foreach ($promotions as $p): ?>
      <?php
        $img       = $p['image_url']   ?? $p['image_url2'] ?? null;
        $title     = $p['title']       ?? 'Sem título';
        $srcLabel  = strtoupper($p['source'] ?? $p['store'] ?? 'manual');
        $isPrime   = !empty($p['is_prime']) && filter_var($p['is_prime'], FILTER_VALIDATE_BOOLEAN);
        $currency  = $p['currency']    ?? 'BRL';
        // preferir price_text; se não tiver, usa price numérico formatado
        $priceText = $p['price_text']  ?? (isset($p['price']) ? (string) $p['price'] : null);
        // link pode estar em affiliate_url ou em url
        $link      = $p['affiliate_url'] ?? $p['url'] ?? '#';
        $id        = $p['id'] ?? null;
      ?>
      <div class="card">
        <?php if (!empty($img)): ?>
          <img src="<?= esc($img) ?>" alt="<?= esc($title) ?>">
        <?php endif; ?>

        <div class="content">
          <div class="muted"><?= esc($srcLabel) ?> <?= $isPrime ? ' · Prime' : '' ?></div>
          <h3><?= esc($title) ?></h3>

          <?php if (!empty($priceText)): ?>
            <div class="price"><?= esc($priceText) ?> <?= esc($currency) ?></div>
          <?php endif; ?>

          <p><a class="btn" href="<?= esc($link) ?>" target="_blank" rel="nofollow sponsored noopener">Ir para a oferta</a></p>

          <?php if ($id): ?>
          <form method="post" action="<?= site_url('admin/promotions/delete/'.$id) ?>">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-danger">Desativar</button>
          </form>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <?= $this->endSection() ?>
</body>
</html>

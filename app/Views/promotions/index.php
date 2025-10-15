<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>mazehunt — promoções</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->extend('layouts/main') ?>
    <?= $this->section('content') ?>
</head>
<body>
  <div class="wrap">
    <h1>mazehunt — promoções (últimos 7 dias)</h1>

    <?php if (empty($promos)): ?>
      <p class="empty">Sem promoções por enquanto. Rode <code>php spark promotions:fetch 10</code>.</p>
    <?php else: ?>
      <div class="grid">
        <?php foreach ($promos as $p): ?>
          <article class="card">
            <?php if (!empty($p['image'])): ?>
              <img class="thumb" src="<?= esc($p['image']) ?>" alt="">
            <?php endif; ?>
            <div class="box">
              <h2 class="title"><?= esc($p['title']) ?></h2>
              <div class="meta">
                Fonte: <?= esc(strtoupper($p['source'])) ?>
                <?php if (!is_null($p['price'])): ?> • R$ <?= number_format($p['price'], 2, ',', '.') ?><?php endif; ?>
              </div>
              <a class="btn" href="<?= esc($p['url']) ?>" target="_blank" rel="noopener nofollow">Ver na loja</a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>

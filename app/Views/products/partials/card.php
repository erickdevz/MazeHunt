<?php
// $p : array
$image = $p['image'] ?? base_url('assets/img/placeholder.png');
?>
<article class="product-card" tabindex="0" role="article" aria-labelledby="p-<?= esc($p['id']) ?>-title">
    <div class="card-media">
        <img src="<?= esc($image) ?>" alt="<?= esc($p['title']) ?>">
    </div>
    <div class="card-body">
        <h3 id="p-<?= esc($p['id']) ?>-title" class="product-title"><?= esc($p['title']) ?></h3>
        <div class="price">R$ <span><?= esc(number_format((float)$p['price'], 2, ',', '.')) ?></span></div>
        <a class="btn-offer" href="<?= site_url('produto/' . $p['id']) ?>" role="button">VER OFERTA</a>
        <div class="meta-row">
        <span class="meta-item"><?= esc($p['scheduled_day'] ?? '') ?></span>
        </div>
    </div>
</article>

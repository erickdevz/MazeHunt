<section class="grid" aria-label="Lista de produtos">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $p): ?>
        <?= view('products/partials/card', ['p' => $p]) ?>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="empty">Nenhum produto encontrado.</div>
    <?php endif; ?>
</section>

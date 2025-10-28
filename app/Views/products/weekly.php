<h2 class="page-title">Produtos da Semana (máx. 10 por dia)</h2>

<section class="week-table" aria-label="Produtos por dia da semana">
    <div class="week-grid">
        <?php foreach ($weekly as $day => $dataDay): ?>
        <div class="day-col" data-day="<?= esc($day) ?>">
            <h3><?= ucfirst(esc($day)) ?></h3>
            <ul class="day-list">
            <?php if (!empty($dataDay['items'])): ?>
                <?php foreach ($dataDay['items'] as $item): ?>
                <li class="product-mini">
                    <a href="<?= site_url('produto/' . $item['id']) ?>">
                    <?= esc($item['title']) ?> — R$ <?= esc(number_format((float)$item['price'], 2, ',', '.')) ?>
                    </a>
                </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li class="product-mini">Nenhum produto.</li>
            <?php endif; ?>
            </ul>

            <?php if ($dataDay['total'] > 10): ?>
            <div class="day-more">Mostrando 10 de <?= esc($dataDay['total']) ?>.</div>
            <a class="nav-pill" href="<?= site_url('produtos/semana?day=' . urlencode($day)) ?>">Ver todos</a>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</section>

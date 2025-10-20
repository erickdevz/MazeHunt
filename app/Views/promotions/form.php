<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Promoção manual</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body{font-family:system-ui,Arial;margin:20px;background:#0f1115;color:#eaeaea}
        label{display:block;margin:10px 0 6px}
        input[type=text], input[type=url]{width:100%;padding:10px;border-radius:8px;border:1px solid #22283a;background:#151922;color:#eaeaea}
        .row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
        button{background:#6c5ce7;color:#fff;padding:10px 14px;border-radius:10px;border:0;margin-top:14px;cursor:pointer}
        a{color:#9fd2ff}
        .error{color:#ff8a8a}
    </style>
    </head>
    <body>
    <h1>Promoção manual</h1>

    <?php if ($errors = session()->get('errors')): ?>
        <div class="error">
        <?php foreach ($errors as $e): ?>
            <div><?= esc($e) ?></div>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= esc($action) ?>">
        <?= csrf_field() ?>

        <label>Título *</label>
        <input type="text" name="title" value="<?= esc(old('title', $values['title'] ?? '')) ?>" required>

        <label>URL de afiliado (SiteStripe) *</label>
        <input type="url" name="affiliate_url" value="<?= esc(old('affiliate_url', $values['affiliate_url'] ?? '')) ?>" placeholder="https://amazon.com/...tag=seu-tag-20" required>

        <label>URL da imagem (do embed SiteStripe)</label>
        <input type="url" name="image_url" value="<?= esc(old('image_url', $values['image_url'] ?? '')) ?>">

        <div class="row">
        <div>
            <label>Preço (texto livre)</label>
            <input type="text" name="price_text" value="<?= esc(old('price_text', $values['price_text'] ?? '')) ?>" placeholder="R$ 199,90">
        </div>
        <div>
            <label>Moeda</label>
            <input type="text" name="currency" value="<?= esc(old('currency', $values['currency'] ?? 'BRL')) ?>">
        </div>
        </div>

        <div class="row">
        <div>
            <label>Marca (opcional)</label>
            <input type="text" name="brand" value="<?= esc(old('brand', $values['brand'] ?? '')) ?>">
        </div>
        <div>
            <label><input type="checkbox" name="is_prime" value="1" <?= (old('is_prime', $values['is_prime'] ?? 0) ? 'checked' : '') ?>> Produto elegível a Prime</label>
        </div>
        </div>

        <button type="submit">Salvar</button>
        <a href="<?= site_url('promotions') ?>">Voltar</a>
    </form>
</body>
</html>

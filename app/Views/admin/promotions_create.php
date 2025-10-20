<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Nova promoção (Amazon via SiteStripe)</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style>
        body{font-family:system-ui,Arial,sans-serif;max-width:860px;margin:24px auto;padding:0 16px}
        textarea,input,button,select{width:100%;padding:10px;margin:6px 0}
        .row{display:grid;grid-template-columns:1fr 1fr;gap:16px}
        .alert{padding:10px;border-radius:8px;margin:8px 0}
        .ok{background:#e6ffef;border:1px solid #b6f2c6}
        .err{background:#ffecec;border:1px solid #f5b5b5}
    </style>
</head>
<body>
    <h1>Adicionar promoção (Amazon / SiteStripe)</h1>

    <?php if(session('success')): ?><div class="alert ok"><?= esc(session('success')) ?></div><?php endif; ?>
    <?php if(session('error')): ?><div class="alert err"><?= esc(session('error')) ?></div><?php endif; ?>

    <form method="post" action="/admin/promotions/store">
        <?= csrf_field() ?>

        <label>HTML “Texto+Imagem” ou “Imagem” (SiteStripe) – principal</label>
        <textarea name="embed1" rows="6" required placeholder='Cole aqui o snippet HTML gerado pelo SiteStripe'></textarea>

        <label>HTML “Imagem” (SiteStripe) – segunda imagem (opcional)</label>
        <textarea name="embed2" rows="4" placeholder='Opcional: cole um segundo snippet para ter 2 imagens'></textarea>

        <div class="row">
        <div>
            <label>Título (opcional – se vazio uso o alt do snippet)</label>
            <input type="text" name="title" placeholder="Título do produto">
        </div>
        <div>
            <label>Preço (opcional)</label>
            <input type="text" name="price" placeholder="Ex.: 199.90">
        </div>
        </div>

        <label>Moeda</label>
        <select name="currency">
        <option value="BRL">BRL</option>
        <option value="USD">USD</option>
        </select>

        <button type="submit">Salvar promoção</button>
    </form>

    <p style="margin-top:16px;color:#666;font-size:14px">
        Dicas: use apenas URLs de imagem do SiteStripe (não baixe/localize).  
        Se exibir preço, atualize com frequência (≤24h) para ficar conforme a Amazon.
    </p>
</body>
</html>

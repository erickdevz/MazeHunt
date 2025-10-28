<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos do Dia - MAZEHUNT</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="logo">
                <h1>MAZEHUNT</h1>
                <div class="logo-icon">🐺</div>
            </div>
        </header>

        <!-- Filter Buttons -->
        <nav class="filter-nav">
            <a href="index.php" class="filter-btn">ALL</a>
            <a href="produtos-dia.php" class="filter-btn active">PRODUTOS DO DIA</a>
            <a href="produtos-semana.php" class="filter-btn">PRODUTOS DA SEMANA</a>
        </nav>

        <!-- Daily Products Section -->
        <section class="products-section">
            <div class="daily-header">
                <h2>🔥 Ofertas Especiais de Hoje</h2>
                <p class="daily-date"><?php echo date('d/m/Y'); ?></p>
            </div>

            <div class="products-grid">
                <?php
                // Simulação de dados - depois será do banco de dados
                $produtos_dia = [
                    [
                        'id' => 1,
                        'nome' => 'MAX TITANIUM CREATINA 300 GR MONOHIDRATADA',
                        'preco' => '23,00',
                        'imagem' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
                        'loja' => 'Loja Oficial',
                        'categoria' => 'Creatina',
                        'desconto' => '35%'
                    ],
                    [
                        'id' => 2,
                        'nome' => 'WHEY PROTEIN CONCENTRADO 900G',
                        'preco' => '89,90',
                        'imagem' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
                        'loja' => 'Suplementos BR',
                        'categoria' => 'Proteína',
                        'desconto' => '25%'
                    ],
                    [
                        'id' => 3,
                        'nome' => 'BCAA 2:1:1 120 CÁPSULAS',
                        'preco' => '45,00',
                        'imagem' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
                        'loja' => 'Nutri Shop',
                        'categoria' => 'Aminoácidos',
                        'desconto' => '20%'
                    ],
                    [
                        'id' => 4,
                        'nome' => 'PRÉ-TREINO EXTREME 300G',
                        'preco' => '67,50',
                        'imagem' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
                        'loja' => 'Fitness Store',
                        'categoria' => 'Pré-Treino',
                        'desconto' => '30%'
                    ],
                    [
                        'id' => 5,
                        'nome' => 'GLUTAMINA 300G PURA',
                        'preco' => '52,00',
                        'imagem' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
                        'loja' => 'Loja Oficial',
                        'categoria' => 'Aminoácidos',
                        'desconto' => '15%'
                    ],
                    [
                        'id' => 6,
                        'nome' => 'MULTIVITAMÍNICO COMPLETO 60 CAPS',
                        'preco' => '38,90',
                        'imagem' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
                        'loja' => 'Vita Plus',
                        'categoria' => 'Vitaminas',
                        'desconto' => '40%'
                    ]
                ];

                foreach ($produtos_dia as $produto):
                ?>
                <div class="product-card" data-category="<?php echo $produto['categoria']; ?>">
                    <div class="discount-badge"><?php echo $produto['desconto']; ?> OFF</div>
                    <div class="product-image">
                        <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><?php echo $produto['nome']; ?></h3>
                        <p class="product-price">R$ <?php echo $produto['preco']; ?></p>
                        <button class="btn-offer">VER OFERTA</button>
                        <div class="product-meta">
                            <span class="meta-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                </svg>
                                <?php echo $produto['loja']; ?>
                            </span>
                            <span class="meta-item">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <?php echo $produto['categoria']; ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>

<?php
// Simulação de dados de produtos
$products = [
    [
        'id' => 1,
        'title' => 'MAX TITANIUM CREATINA 300 GR MONOHIDRATADA',
        'price' => 23.00,
        'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
        'store' => 'QUAL LOJA PROM',
        'category' => 'QUAL É A CATEGORIA',
        'type' => 'dia'
    ],
    [
        'id' => 2,
        'title' => 'MAX TITANIUM CREATINA 300 GR MONOHIDRATADA',
        'price' => 23.00,
        'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
        'store' => 'QUAL LOJA PROM',
        'category' => 'QUAL É A CATEGORIA',
        'type' => 'semana'
    ],
    [
        'id' => 3,
        'title' => 'MAX TITANIUM CREATINA 300 GR MONOHIDRATADA',
        'price' => 23.00,
        'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
        'store' => 'QUAL LOJA PROM',
        'category' => 'QUAL É A CATEGORIA',
        'type' => 'dia'
    ],
    [
        'id' => 4,
        'title' => 'MAX TITANIUM CREATINA 300 GR MONOHIDRATADA',
        'price' => 23.00,
        'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
        'store' => 'QUAL LOJA PROM',
        'category' => 'QUAL É A CATEGORIA',
        'type' => 'semana'
    ],
    [
        'id' => 5,
        'title' => 'MAX TITANIUM CREATINA 300 GR MONOHIDRATADA',
        'price' => 23.00,
        'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
        'store' => 'QUAL LOJA PROM',
        'category' => 'QUAL É A CATEGORIA',
        'type' => 'dia'
    ],
    [
        'id' => 6,
        'title' => 'MAX TITANIUM CREATINA 300 GR MONOHIDRATADA',
        'price' => 23.00,
        'image' => 'https://hebbkx1anhila5yf.public.blob.vercel-storage.com/PROTMAZEHUNTCSS-ULHF10u60obqWUnJHOLyUwnN35gcL1.png',
        'store' => 'QUAL LOJA PROM',
        'category' => 'QUAL É A CATEGORIA',
        'type' => 'semana'
    ]
];

$title = 'MAZEHUNT - Produtos em Oferta';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <?= $this->extend('layouts/main') ?>
    <?= $this->section('content') ?>
</head>
<body>
    <div class="background-gradient"></div>
    
    <header class="site-header">
        <div class="header-container">
            <div class="logo-wrapper">
                <h1 class="logo">
                    <span class="logo-text">MAZEHUNT</span>
                    <img src="<?= asset('assets/images/mz.png') ?>" alt="some text" width=120 height=80>
                </h1>
            </div>
        </div>
    </header>

    <main class="main-content">
        <nav class="filter-nav">
            <a href="produtos" class="filter-btn active">ALL</a>
            <a href="produtos/dia" class="filter-btn">PRODUTOS DO DIA</a>
            <a href="produtos/semana" class="filter-btn">PRODUTOS DA SEMANA</a>
        </nav>

        <section class="products-grid" aria-label="Lista de produtos">
            <?php foreach ($products as $product): ?>
            <article class="product-card" data-type="<?= htmlspecialchars($product['type']) ?>" data-id="<?= $product['id'] ?>">
                <div class="card-inner">
                    <div class="product-image-wrapper">
                        <img 
                            src="<?= htmlspecialchars($product['image']) ?>" 
                            alt="<?= htmlspecialchars($product['title']) ?>"
                            class="product-image"
                        >
                    </div>
                    
                    <div class="product-info">
                        <h2 class="product-title"><?= htmlspecialchars($product['title']) ?></h2>
                        
                        <div class="product-price">
                            R$ <?= number_format($product['price'], 2, ',', '.') ?>
                        </div>
                        
                        <a href="#" class="btn-offer">VER OFERTA</a>
                        
                        <div class="product-meta">
                            <div class="meta-item">
                                <svg class="meta-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M8 0L10 6H16L11 10L13 16L8 12L3 16L5 10L0 6H6L8 0Z" fill="currentColor"/>
                                </svg>
                                <span><?= htmlspecialchars($product['store']) ?></span>
                            </div>
                            <div class="meta-item">
                                <svg class="meta-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M2 4H14V14H2V4ZM4 0H12V2H4V0Z" fill="currentColor"/>
                                </svg>
                                <span><?= htmlspecialchars($product['category']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>

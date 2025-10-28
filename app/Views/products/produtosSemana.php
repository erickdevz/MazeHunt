<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos da Semana - MAZEHUNT</title>
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
            <a href="produtos-dia.php" class="filter-btn">PRODUTOS DO DIA</a>
            <a href="produtos-semana.php" class="filter-btn active">PRODUTOS DA SEMANA</a>
        </nav>

        <!-- Weekly Products Section -->
        <section class="weekly-section">
            <div class="weekly-header">
                <h2>📅 Ofertas da Semana</h2>
                <p class="week-range">
                    <?php 
                    $inicio_semana = date('d/m', strtotime('monday this week'));
                    $fim_semana = date('d/m/Y', strtotime('sunday this week'));
                    echo "$inicio_semana - $fim_semana";
                    ?>
                </p>
            </div>

            <?php
            // Simulação de dados por dia da semana - depois será do banco de dados
            $dias_semana = [
                'Segunda-feira' => [
                    ['nome' => 'CREATINA MAX 300G', 'preco' => '23,00', 'loja' => 'Loja A', 'categoria' => 'Creatina'],
                    ['nome' => 'WHEY PROTEIN 900G', 'preco' => '89,90', 'loja' => 'Loja B', 'categoria' => 'Proteína'],
                    ['nome' => 'BCAA 120 CAPS', 'preco' => '45,00', 'loja' => 'Loja C', 'categoria' => 'Aminoácidos']
                ],
                'Terça-feira' => [
                    ['nome' => 'PRÉ-TREINO 300G', 'preco' => '67,50', 'loja' => 'Loja D', 'categoria' => 'Pré-Treino'],
                    ['nome' => 'GLUTAMINA 300G', 'preco' => '52,00', 'loja' => 'Loja A', 'categoria' => 'Aminoácidos'],
                    ['nome' => 'OMEGA 3 120 CAPS', 'preco' => '42,90', 'loja' => 'Loja E', 'categoria' => 'Vitaminas']
                ],
                'Quarta-feira' => [
                    ['nome' => 'MULTIVITAMÍNICO 60 CAPS', 'preco' => '38,90', 'loja' => 'Loja F', 'categoria' => 'Vitaminas'],
                    ['nome' => 'ALBUMINA 500G', 'preco' => '35,00', 'loja' => 'Loja B', 'categoria' => 'Proteína'],
                    ['nome' => 'CAFEÍNA 90 CAPS', 'preco' => '28,50', 'loja' => 'Loja C', 'categoria' => 'Termogênico']
                ],
                'Quinta-feira' => [
                    ['nome' => 'HIPERCALÓRICO 3KG', 'preco' => '125,00', 'loja' => 'Loja A', 'categoria' => 'Hipercalórico'],
                    ['nome' => 'ZMA 90 CAPS', 'preco' => '48,00', 'loja' => 'Loja D', 'categoria' => 'Vitaminas'],
                    ['nome' => 'ARGININA 120 CAPS', 'preco' => '39,90', 'loja' => 'Loja E', 'categoria' => 'Aminoácidos']
                ],
                'Sexta-feira' => [
                    ['nome' => 'TERMOGÊNICO 60 CAPS', 'preco' => '55,00', 'loja' => 'Loja F', 'categoria' => 'Termogênico'],
                    ['nome' => 'COLÁGENO 300G', 'preco' => '45,90', 'loja' => 'Loja B', 'categoria' => 'Saúde'],
                    ['nome' => 'VITAMINA D 60 CAPS', 'preco' => '32,00', 'loja' => 'Loja C', 'categoria' => 'Vitaminas']
                ],
                'Sábado' => [
                    ['nome' => 'BARRA PROTEICA CX 12UN', 'preco' => '68,00', 'loja' => 'Loja A', 'categoria' => 'Snacks'],
                    ['nome' => 'PASTA AMENDOIM 500G', 'preco' => '22,90', 'loja' => 'Loja D', 'categoria' => 'Alimentos'],
                    ['nome' => 'MALTODEXTRINA 1KG', 'preco' => '29,90', 'loja' => 'Loja E', 'categoria' => 'Carboidratos']
                ],
                'Domingo' => [
                    ['nome' => 'COQUETELEIRA PREMIUM', 'preco' => '18,90', 'loja' => 'Loja F', 'categoria' => 'Acessórios'],
                    ['nome' => 'LUVAS TREINO PAR', 'preco' => '35,00', 'loja' => 'Loja B', 'categoria' => 'Acessórios'],
                    ['nome' => 'FAIXA ELÁSTICA KIT', 'preco' => '42,00', 'loja' => 'Loja C', 'categoria' => 'Acessórios']
                ]
            ];

            foreach ($dias_semana as $dia => $produtos):
            ?>
            <div class="day-section">
                <h3 class="day-title"><?php echo $dia; ?></h3>
                <div class="table-container">
                    <table class="products-table">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Preço</th>
                                <th>Loja</th>
                                <th>Categoria</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto): ?>
                            <tr class="table-row">
                                <td class="product-name"><?php echo $produto['nome']; ?></td>
                                <td class="product-price">R$ <?php echo $produto['preco']; ?></td>
                                <td class="product-store"><?php echo $produto['loja']; ?></td>
                                <td class="product-category">
                                    <span class="category-badge"><?php echo $produto['categoria']; ?></span>
                                </td>
                                <td>
                                    <button class="btn-table-offer">VER OFERTA</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>

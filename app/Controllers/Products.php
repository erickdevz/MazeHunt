<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Products extends BaseController
{
    public function index()
    {
        // instância do model (crie app/Models/ProductModel.php se ainda não tiver)
        $model = new ProductModel();

        // busca todos (ou limite)
        $data['products'] = $model->findAll();

        // carrega a view (app/Views/products/index.php)
        echo view('layouts/header', ['title' => 'Produtos']);
        echo view('products/index', $data);
    }
}

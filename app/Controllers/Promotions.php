<?php

namespace App\Controllers;

use App\Models\PromotionModel;

class Promotions extends BaseController
{
    public function index()
    {
        $model = new PromotionModel();

        $promos = $model->where('expires_at >=', date('Y-m-d H:i:s'))
                        ->orderBy('created_at','DESC')
                        ->findAll(30);

        return view('promotions/index', ['promos' => $promos]);
    }
}

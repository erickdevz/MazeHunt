<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PromotionModel;

class PromotionsController extends BaseController
{
    private PromotionModel $model;

    public function __construct()
    {
        $this->model = new PromotionModel();
        helper(['form', 'url', 'text']);
    }

    public function index()
    {
        $data['promotions'] = $this->model
            ->where('is_active', true)
            ->orderBy('created_at', 'DESC')
            ->findAll(30);

        return view('promotions/index', $data);
    }

    public function create()
    {
        return view('promotions/form', [
            'action' => site_url('admin/promotions/store'),
            'method' => 'post',
            'values' => [
                'title'         => '',
                'affiliate_url' => '',
                'image_url'     => '',
                'price_text'    => '',
                'currency'      => 'BRL',
                'is_prime'      => false,
                'brand'         => '',
            ]
        ]);
    }

    public function store()
    {
        $rules = [
            'title'         => 'required|min_length[3]',
            'affiliate_url' => 'required|valid_url',
            'image_url'     => 'permit_empty|valid_url',
            'price_text'    => 'permit_empty|max_length[64]',
            'currency'      => 'permit_empty|alpha|min_length[3]|max_length[3]',
            'is_prime'      => 'permit_empty|in_list[0,1]',
            'brand'         => 'permit_empty|max_length[80]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'source'         => 'manual',
            'source_id'      => null,
            'title'          => $this->request->getPost('title'),
            'affiliate_url'  => $this->request->getPost('affiliate_url'),
            'image_url'      => $this->request->getPost('image_url'),
            'price_text'     => $this->request->getPost('price_text'),
            'currency'       => strtoupper($this->request->getPost('currency') ?: 'BRL'),
            'is_prime'  => (bool) ($this->request->getPost('is_prime') ?? false),
            'is_active' => true,
            'source_payload' => null,
            'last_checked_at'=> date('Y-m-d H:i:s'),
        ];

        $this->model->insert($data);
        return redirect()->to(site_url('promotions'))->with('msg', 'Promoção criada!');
    }

    public function edit(int $id)
    {
        $row = $this->model->find($id);
        if (!$row) return redirect()->to(site_url('admin/promotions'));

        return view('promotions/form', [
            'action' => site_url("promotions/update/{$id}"),
            'method' => 'post',
            'values' => $row,
        ]);
    }

    public function update(int $id)
    {
        $rules = [
            'title'         => 'required|min_length[3]',
            'affiliate_url' => 'required|valid_url',
            'image_url'     => 'permit_empty|valid_url',
            'price_text'    => 'permit_empty|max_length[64]',
            'currency'      => 'permit_empty|alpha|min_length[3]|max_length[3]',
            'is_prime' => (bool) ($this->request->getPost('is_prime') ?? false),
            'brand'         => 'permit_empty|max_length[80]',
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'         => $this->request->getPost('title'),
            'affiliate_url' => $this->request->getPost('affiliate_url'),
            'image_url'     => $this->request->getPost('image_url'),
            'price_text'    => $this->request->getPost('price_text'),
            'currency'      => strtoupper($this->request->getPost('currency') ?: 'BRL'),
            'is_prime'      => (int) ($this->request->getPost('is_prime') ?? false),
            'brand'         => $this->request->getPost('brand'),
        ];

        $this->model->update($id, $data);
        return redirect()->to(site_url('admin/promotions'))->with('msg', 'Promoção atualizada!');
    }

    public function delete(int $id)
    {
        // “soft delete” simples via flag
        $this->model->update($id, ['is_active' => false]);
        return redirect()->to(site_url('admin/promotions'))->with('msg', 'Promoção desativada.');
    }
}

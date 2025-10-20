<?php
namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends \CodeIgniter\Model
{
    protected $table = 'promotions';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'source','source_id','title','affiliate_url','image_url',
        'price_text','currency','is_prime','source_payload',
        'cache_expires_at','last_checked_at','is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_prime'  => 'boolean',
        'cache_expires_at' => 'datetime',
        'last_checked_at'  => 'datetime',
    ];

    protected $validationRules = [
        'title'         => 'required|min_length[3]',
        'affiliate_url' => 'required|valid_url',
        'image_url'     => 'permit_empty|valid_url',
        'price_text'    => 'permit_empty|max_length[64]',
        'currency'      => 'permit_empty|exact_length[3]',
        'source'        => 'required|in_list[manual,amazon,impact]',
    ];

    protected $validationMessages = [
        'affiliate_url' => ['valid_url' => 'URL de afiliado inválida.'],
        'image_url'     => ['valid_url' => 'URL da imagem inválida.'],
    ];
}

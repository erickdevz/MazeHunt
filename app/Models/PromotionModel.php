<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends Model
{
    protected $table         = 'promotions';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = [
    'source','source_id','title','affiliate_url','url','image_url','image_url2',
    'price_text','price','currency','is_prime','store','brand','product_url',
    'source_payload','cache_expires_at','last_checked_at','is_active',
    ];

}

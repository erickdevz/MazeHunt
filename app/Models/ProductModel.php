<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title','price','image','description','scheduled_day','is_featured','created_at','updated_at'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'product';
    protected $allowedFields = ['name', 'description', 'updated_at'];
    protected $primaryKey       = 'id';

    public function countProducts()
    {
        $product = $this
        ->table('product')
        ->select('product.name,product.description, product.updated_at, product.created_at')
        ->selectCount('product.name', 'stock')
        ->groupBy('product.name')
        ->findall();

        if(!$product){
            throw new \Exception('Error');
        }

        return $product;
    }
}

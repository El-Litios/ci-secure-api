<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'product';
    protected $allowedFields = ['name', 'description', 'price', 'updated_at','categoryid','stateid'];
    protected $primaryKey       = 'id';

    public function countProducts()
    {
        $product = $this
        ->table('product')
        ->select('product.id, product.name, product.description, product.price, product.updated_at, product.created_at')
        ->selectCount('product.name', 'stock')
        ->where('product.stateid = 2')
        ->groupBy('product.name')
        ->findall();

/*         if(!$product){
            throw new \Exception('No hay productos');
        } */

        return $product;
    }
}

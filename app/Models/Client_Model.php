<?php

namespace App\Models;
use CodeIgniter\Model;

class Client_Model extends Model
{
    protected $table = 'client';
    protected $allowedFields = ['name', 'email', 'retainer_fee', 'updated_at'];
    protected $updatedField = 'updated_at';
    
    /* protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate']; */

    public function findClientById($id)
    {
        $client = $this->asArray()->Where('id', $id)->first();

        if(!$client){
            throw new \Exception('Client does not exist for specific id');
        }

        return $client;
    }

    public function getClientsInfo()
    {
        $client = $this
        ->table('client')
        ->select('client.id, client.name')
        ->findall();
        return $client;
    }
}
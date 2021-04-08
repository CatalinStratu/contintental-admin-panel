<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table="users";

    /**
     * Clients Count
     */
    public function ClientsCount(){
        return $this->count();
    }
    /**
     * Client emails
     */
    public function ClientMails(){
        return $this->select('email')->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'total', 'note', 'time', 'location', 'withPerson', 'category_id', 'user_id'];

    public $timestamps = false;
}

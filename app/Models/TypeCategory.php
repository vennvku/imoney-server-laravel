<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCategory extends Model
{
    use HasFactory;

    protected $table = 'typecategorys';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name_typeCategory', 'type'];
}
 
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey= 'userId';

    // Columns: userId, userFirstname, userSurname, userEmail,
}
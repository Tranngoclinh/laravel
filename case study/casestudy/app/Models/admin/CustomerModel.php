<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $guard = 'carshop';
    use Notifiable,
        SoftDeletes;
}

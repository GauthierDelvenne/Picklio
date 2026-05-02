<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'phone', 'email', 'address', 'country', 'postal_code', 'opening_time', 'closing_time', 'id'])]
class Warehouse extends Model
{
    use HasFactory;
}

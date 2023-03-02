<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as AccessSpatie;

class Access extends AccessSpatie
{
    use HasFactory;
}

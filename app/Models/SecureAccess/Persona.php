<?php

namespace App\Models\SecureAccess;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Persona extends Authenticatable
{
    use Notifiable;
    protected   $table = 'personas';
}

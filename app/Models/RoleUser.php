<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_user';

    protected $primaryKey = 'role_id'; // Definir la clave primaria personalizada

    // Si es necesario, definir el nombre del campo que representa la relación
    protected $foreignKey = 'role_id';

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}

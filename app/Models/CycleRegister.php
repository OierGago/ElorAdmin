<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CycleRegister extends Model
{
    use HasFactory;

    protected $table = 'cycle_register';

    // Definir la clave primaria personalizada
    protected $primaryKey = 'user_id';

    public function users()
    {
        // Definir la relación con la clave foránea 'user_id'
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cycles()
    {
        // Definir la relación con la clave foránea 'cycle_id'
        return $this->belongsTo(Cycle::class, 'cycle_id');
    }

    public function modules()
    {
        // Definir la relación con la clave foránea 'module_id'
        return $this->hasMany(Module::class, 'module_id');
    }
}

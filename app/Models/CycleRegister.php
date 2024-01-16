<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CycleRegister extends Model
{
    use HasFactory;

    protected $table = 'cycle_register';

    // Definir la clave primaria personalizada
    protected $primaryKey = ['user_id', 'cycle_id', 'module_id', 'year'];

    public function users()
    {
        // Definir la relación con la clave foránea 'user_id'
        return $this->belongsTo(User::class, 'users', 'user_id', 'id');
    }

    public function cycles()
    {
        // Definir la relación con la clave foránea 'cycle_id'
        return $this->belongsTo(Cycle::class, 'cycles', 'cycle_id', 'id');
    }

    public function modules()
    {
        // Definir la relación con la clave foránea 'module_id'
        return $this->belongsTo(Module::class, 'modules', 'module_id', 'id');
    }

}

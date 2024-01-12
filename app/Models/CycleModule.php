<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CycleModule extends Model
{
    use HasFactory;

    protected $table = 'cycle_module';

    protected $primaryKey = 'cycle_id'; // Definir la clave primaria personalizada

    // Si es necesario, definir el nombre del campo que representa la relación
    protected $foreignKey = 'module_id';
    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}

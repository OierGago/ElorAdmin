<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorCycle extends Model
{
    use HasFactory;

    protected $table = 'professor_cycle';

    protected $primaryKey = ['user_id', 'cycle_id', 'module_id']; // Definir la clave primaria personalizada

    // Si es necesario, definir el nombre del campo que representa la relación
    protected $foreignKey = ['user_id', 'cycle_id', 'module_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}

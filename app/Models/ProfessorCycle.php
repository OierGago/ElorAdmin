<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorCycle extends Model
{
    use HasFactory;

    protected $table = 'professor_cycle';

    // Definir la clave primaria personalizada como un array asociativo
    protected $primaryKey = ['user_id', 'cycle_id', 'module_id'];

    // Si es necesario, definir el nombre del campo que representa la relación
    protected $foreignKey = ['user_id', 'cycle_id', 'module_id'];

    public $incrementing = false; // Desactivar la autoincrementación de la clave primaria

    // Si tus relaciones son de muchos a muchos, usa belongsToMany
    public function cycle()
    {
        return $this->belongsTo(Cycle::class, 'cycle_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id', 'id');
    }
}

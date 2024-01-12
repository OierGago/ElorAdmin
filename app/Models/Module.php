<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function cycles()
    {
        return $this->belongsToMany(Cycle::class);
    }

    public function cycleRegisters()
    {
        return $this->belongsToMany(CycleRegister::class);
    }

    public function professorCycles()
    {
        return $this->hasMany(ProfessorCycle::class);
        // Puedes agregar una relación adicional con CycleModule si es necesario
        // return $this->hasMany(CycleModule::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function cycleRegistersModulo()
    {
        return $this->belongsToMany(CycleRegister::class, 'cycle_register', 'id', 'module_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'cycle_register');
    }

    public function professorCycles() {
        return $this->hasMany(ProfessorCycle::class, 'module_id');
    }
}

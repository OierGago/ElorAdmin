<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cycle extends Model
{
    use HasFactory;

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'cycle_module');
    }
    // public function modules()
    // {
    //     return $this->belongsToMany(Module::class, 'cycle_module');
    // }

    public function profesores()
    {
        return $this->belongsToMany(User::class, 'professor_cycle')->distinct();
    }

    public function alumnos()
    {
        return $this->belongsToMany(User::class, 'cycle_register')->distinct();
    }

    public function alumnos_modulos()
    {
        return $this->belongsToMany(User::class, 'cycle_register');
    }

    public function usersCycleRegister()

    {
        return $this->belongsToMany(User::class, 'cycle_register');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function cycleRegisters()
    {
        return $this->belongsToMany(CycleRegister::class, 'cycle_id');
    }

    
}

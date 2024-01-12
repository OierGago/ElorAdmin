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
        return $this->belongsToMany(Module::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
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

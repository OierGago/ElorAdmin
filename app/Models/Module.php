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
}

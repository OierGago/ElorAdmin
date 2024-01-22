<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function cycles()
    {
        return $this->belongsToMany(Cycle::class, 'cycle_register')->distinct();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    public function cycleRegisters()
    {
        return $this->hasMany(CycleRegister::class, 'user_id');
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function scopeStudentsNotInCycleRegister($query)
    {
        $currentYear = now()->year;

    return $query->whereHas('roles', function ($query) {
        $query->where('name', 'estudiante');
    })->where(function ($query) use ($currentYear) {
        $query->doesntHave('cycleRegisters')
            ->orWhereHas('cycleRegisters', function ($query) use ($currentYear) {
                $query->where('year', '<>', $currentYear);
            });
    })
    ->orderBy('surname');
    }

    public function professorCycles() {
        return $this->hasMany(ProfessorCycle::class, 'user_id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'surname',
        'email',
        'password',
        'address',
        'phone',
        'dni',
        'birthdate',
        'department_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        
    }
    public static function obtenerUsuariosPorRolYCiclo($rol, $cycle)
    {
        // Obtener todos los usuarios que tienen un rol específico y pertenecen al ciclo dado
        return User::whereHas('roles', function ($query) use ($rol) {
                $query->where('name', $rol);
            })
            ->whereHas('cycle', function ($query) use ($cycle) {
                $query->where('name', $cycle);
            })
            ->get();
    }
    public static function obtenerUsuariosPorRol($rol)
    {
        // Obtener todos los usuarios que tienen un rol específico
        return User::whereHas('roles', function ($query) use ($rol) {
            $query->where('name', $rol);
        })->get();
    }

    public static function esUsuarioDeRol(User $usuario, $rol)
    {
        // Verificar si el usuario tiene un rol específico
        return $usuario->hasRole($rol);
    }

    public static function asignarRolAUsuario(User $usuario, $rol)
    {
        // Asignar un rol específico al usuario
        $usuario->roles()->attach(Role::where('name', $rol)->first());
    }

    public static function countUsersWithoutRole()
{
    $usersWithoutRole = DB::table('users')
        ->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
        ->whereNull('role_user.role_id')
        ->count();

    return $usersWithoutRole;
}
}

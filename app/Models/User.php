<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function cycle(): BelongsTo
    {
        return $this->belongsTo(Cycle::class);
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function cycleRegisters()
{
    return $this->hasMany(CycleRegister::class);
}

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'address',
        'phone',
        'dni',
        'curso',
        'fct',
        'department_id',
        'cycle_id'
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

        static::saving(function ($user) {
            $alumnoRole = 1;

            $hasAlumnoRole = $user->roles()->where('role_id', $alumnoRole)->exists();

            if ($hasAlumnoRole && count($user->roles) > 0) {
                throw new \Exception('El usuario ya tiene el rol de alumno y no puede tener más roles.');
            }
        });
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
}

<?php

namespace App\Entities;

use App\Illuminate\Custom\Database\Eloquent\Concerns\HasUuid;
use App\Illuminate\Custom\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $uuid
 * @property bool $deleted
 * @property DateTime $created_at
 * @property DateTime $updated_at
 * @property string $first_name
 * @property string $last_name
 * @property string $fullName
 * @property string $email
 * @property ?string $cpf
 * @property ?string $prettyCpfOrCnpj
 * @property ?DateTime $birth_date
 * @property ?DateTime $prettyBirthDate
 * @property ?DateTime $email_verified_at
 * @property bool $email_verified
 * @property ?string $picture_link
 * @property bool $has_password
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'picture_link',
        'email_verified',
        'email_verified_at',
        'has_password',
        'connected_account_id',
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

    public function prettyCpfOrCnpj(): Attribute
    {
        return Attribute::make(
            get: function ($_, $attr): ?string
            {
                if (empty($attr['cpf'])) {
                    return null;
                }

                $cpfLength = 11;
                $cnpjCpf = preg_replace("/\D/", '', $attr['cpf']);

                if (strlen($cnpjCpf) === $cpfLength) {
                    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpjCpf);
                }

                return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpjCpf);
            }
        );
    }

    public function prettyBirthDate(): Attribute
    {
        return Attribute::make(
            get: fn ($_, $attr) => (!empty($attr['birth_date']))
                ? Carbon::parse($attr['birth_date'])->format('d/m/Y')
                : null
        );
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($_, $attr) => "{$attr['first_name']} {$attr['last_name']}"
        );
    }

    public function connectedAccounts(): HasMany
    {
        return $this->hasMany(ConnectedAccount::class, 'id', 'connected_account_id');
    }

    public function status(): HasOne
    {
        return $this->hasOne(UserStatus::class, 'id', 'user_status_id');
    }
}

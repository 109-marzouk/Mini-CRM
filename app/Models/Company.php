<?php

namespace App\Models;

use Database\Factories\CompanyFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\CompanyResource
 *
 * @method static paginate(int $int)
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $logo
 * @property string $website_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Employee[] $employees
 * @property-read int|null $employees_count
 * @method static CompanyFactory factory(...$parameters)
 * @method static Builder|Company newModelQuery()
 * @method static Builder|Company newQuery()
 * @method static Builder|Company query()
 * @method static Builder|Company whereCreatedAt($value)
 * @method static Builder|Company whereEmail($value)
 * @method static Builder|Company whereId($value)
 * @method static Builder|Company whereLogo($value)
 * @method static Builder|Company whereName($value)
 * @method static Builder|Company whereUpdatedAt($value)
 * @method static Builder|Company whereWebsiteUrl($value)
 * @mixin Eloquent
 */
class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website_url'
    ];

    /**
     * Get company employees.
    */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}

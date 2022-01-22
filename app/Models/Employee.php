<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\EmployeeResource
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $company_id
 * @property string $email
 * @property string $phone
 * @property string|null $linkedin_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company $company
 * @method static Builder|Employee newModelQuery()
 * @method static Builder|Employee newQuery()
 * @method static Builder|Employee query()
 * @method static Builder|Employee whereCompanyId($value)
 * @method static Builder|Employee whereCreatedAt($value)
 * @method static Builder|Employee whereEmail($value)
 * @method static Builder|Employee whereFirstName($value)
 * @method static Builder|Employee whereId($value)
 * @method static Builder|Employee whereLastName($value)
 * @method static Builder|Employee whereLinkedinUrl($value)
 * @method static Builder|Employee wherePhone($value)
 * @method static Builder|Employee whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone',
        'linkedin_url'
    ];

    /**
     * Get company employees.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

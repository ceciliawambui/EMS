<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyUser extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory;
    protected $table = 'company_users';
    protected $fillable = ['name'];

    // a company has many company users
    public function company()
    {
        return $this->hasMany(Company::class);
    }
}

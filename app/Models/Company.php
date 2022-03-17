<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use HasFactory;
    protected $fillable = ['name', 'phone', 'email', 'address', 'location', 'contact_person', 'company_user_id'];

    // a company user belongs to a comapny
    public function companyUser()
    {
        return $this->belongsTo(CompanyUser::class, 'company_user_id', 'id');
    }



}

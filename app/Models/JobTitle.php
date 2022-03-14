<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobTitle extends Model
{
    use HasFactory;
    protected $table = 'jobtitles';
    protected $fillable = ['job_title_no','name'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

     // relationship, one to many
    // one job title hads many employees
    public function employs()
    {
        return $this->hasMany(Employee::class);
    }
}

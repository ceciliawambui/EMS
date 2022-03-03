<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    protected $table = 'department';

    protected $fillable = ['name'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    // relationship, one to many
    // one department hads many employees
    public function emps()
    {
        return $this->hasMany(Employee::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'department';
    
    protected $fillable = ['name'];

    // relationship, one to many
    // one department hads many employees
    public function emps()
    {
        return $this->hasMany(Employee::class);
    }
}

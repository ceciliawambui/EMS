<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTitle extends Model
{
    use HasFactory;
    protected $table = 'jobtitles';
    protected $fillable = ['name'];

     // relationship, one to many
    // one job title hads many employees
    public function employs()
    {
        return $this->hasMany(Employee::class);
    }
}

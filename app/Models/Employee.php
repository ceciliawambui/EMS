<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    use Notifiable;
    protected $fillable = ['id','job_title_id', 'department_id', 'first_name', 'last_name', 'email', 'salary'];

    // employee belongs to a department and a job title
    public function dep()
    {
        return $this->belongsTo(Department::class);
    }

    public function job()
    {
        return $this->belongsTo(JobTitle::class);
    }
    

    
}

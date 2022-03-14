<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    // email notifications
    use Notifiable;
    // soft deleting
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['job_title_id', 'department_id', 'first_name', 'last_name', 'email', 'salary', 'nssf', 'nhif', 'account_number', 'bank', 'kra_pin'];

    // relationships
    // employee belongs to a department and a job title
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class, 'job_title_id', 'id');
    }



}

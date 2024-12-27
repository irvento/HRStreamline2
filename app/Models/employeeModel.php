<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employeeModel extends Model
{
    protected $table = "tbl_employee";
    protected $primaryKey = 'employee_id';
    public $timestamps = false;

    // Add the fillable attributes for mass assignment
    protected $fillable = [
        'birthdate',
        'gender',
        'user_id',
        'image',
        'employee_fname',
        'employee_lname',
        'employee_mname',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'postal_code',
        'country',
        'contact1'
    ];

    // Relationship to the user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function certificates()
    {
        return $this->hasMany(certificateModel::class, 'employee_id', 'employee_id');
    }

    public function skills()
    {
        return $this->hasMany(skillsModel::class, 'employee_id', 'employee_id');
    }

    public function education()
    {
        return $this->hasMany(educationModel::class, 'employee_id', 'employee_id');
    }

    public function languages()
    {
        return $this->hasMany(languagesModel::class, 'employee_id', 'employee_id');
    }


    public function employeeInfo()
    {
        return $this->hasOne(employee_infoModel::class, 'employee_id', 'employee_id');
    }

    public function job()
    {
        return $this->hasOneThrough(
            jobModel::class,
            employee_infoModel::class,
            'employee_id', // Foreign key on tbl_employee_info
            'job_id', // Foreign key on tbl_job
            'employee_id', // Local key on tbl_employee
            'job_id' // Local key on tbl_employee_info
        );
    }

    public function salary()
    {
        return $this->hasOneThrough(
            Salary::class,
            jobModel::class,
            'job_id', // Foreign key on tbl_job
            'salary_id', // Foreign key on tbl_salary
            'employee_id', // Local key on tbl_employee
            'salary_id' // Local key on tbl_job
        );
    }
}

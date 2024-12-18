<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee_infoModel extends Model
{
    protected $table = 'tbl_employee_info';
    protected $primaryKey = 'info_id'; 
    protected $fillable = ['department_id', 'job_id', 'performance_id', 'employee_id'];

    public $timestamps = false;

    public function department()
{
    return $this->belongsTo(departmentModel::class, 'department_id');
}

public function job()
{
    return $this->belongsTo(jobModel::class, 'job_id');
}

public function performance()
{
    return $this->belongsTo(performanceModel::class, 'performance_id');
}

public function employee()
{
    return $this->belongsTo(employeeModel::class, 'employee_id');
}
}

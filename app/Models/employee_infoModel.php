<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee_infoModel extends Model
{
    protected $table = 'tbl_employee_info';
    protected $fillable = ['department_id', 'job_id', 'performance_id', 'employee_id'];
}

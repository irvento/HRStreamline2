<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employeeModel extends Model
{
    protected $table = "tbl_employee";

    protected $primaryKey = 'employee_id';
}

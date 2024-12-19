<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class departmentModel extends Model
{
    protected $table = 'tbl_department';
    protected $primaryKey = 'department_id'; 
    protected $fillable = ['department_name', 'department_head'];
    public $timestamps = false;

}

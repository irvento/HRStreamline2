<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class leavesModel extends Model
{
protected $table = "tbl_leaves";
protected $primaryKey = 'leave_id';
protected $fillable = ['employee_id', 'start_date', 'end_date', 'leave_status', 'remarks'];
public $timestamps = false;

}

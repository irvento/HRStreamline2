<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendanceModel extends Model
{

    protected $table = 'tbl_attendance';
    protected $primaryKey = 'attendance_id';
    protected $fillable = [
        'employee_id',
        'attendance_date',
        'time_in',
        'time_out',
        'remarks',
    ];

    public $timestamps = false;

    // Relationship to employee
    public function employee()
    {
        return $this->belongsTo(employeeModel::class, 'employee_id');
    }

}


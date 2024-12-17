<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class performanceModel extends Model
{
    protected $table = 'tbl_performance';
    protected $primaryKey = 'performance_id';
    public $timestamps = false;
    protected $fillable = [
        'employee_id',
        'total_days_present',
        'total_days_absent',
        'leave_days_taken',
        'review_date',
        'review_score',
        'reviewer_id',
    ];

    // Define relationship with employeeModel
    public function employee()
    {
        return $this->belongsTo(employeeModel::class, 'employee_id', 'employee_id');
    }
}

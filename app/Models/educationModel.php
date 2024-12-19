<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class educationModel extends Model
{
    protected $table = 'tbl_education'; // Specify the table name
    protected $primaryKey = 'education_id'; // Primary key column
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'degree',
        'field_of_study',
        'institution_name',
        'start_date',
        'end_date'
    ];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }
}

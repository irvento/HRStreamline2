<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class skillsModel extends Model
{
    protected $table = 'tbl_skills'; // Specify the table name

    protected $primaryKey = 'skill_id'; // Primary key column
    public $timestamps = false;

    protected $fillable = [
        'employee_id', 'skill_name', 'proficiency_level',
    ];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }
}

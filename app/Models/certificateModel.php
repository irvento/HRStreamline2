<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificateModel extends Model
{

    protected $table = 'tbl_certificate'; // Specify the table name

    protected $primaryKey = 'certificate_id'; // Primary key column
    public $timestamps = false; // If you don't have created_at and updated_at columns

    protected $fillable = [
        'employee_id', 'certificate_name', 'issued_by', 'issue_date', 'expiry_date'
    ];

    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }
}


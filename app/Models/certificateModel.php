<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificateModel extends Model
{
    // Table associated with the model (Laravel will automatically pluralize the name if you don't specify this)
    protected $table = 'tbl_certificate';

    // Primary key for the model
    protected $primaryKey = 'certificate_id';

    // Disable timestamps if the table doesn't have `created_at` and `updated_at`
    public $timestamps = false;

    // Fields that can be mass assigned
    protected $fillable = ['employee_id', 'certificate_name', 'issued_by', 'issue_date', 'expiry_date'];

    // Define the relationship with the Employee model// In your Certificate model:
    public function employee()
    {
        return $this->belongsTo(employeeModel::class, foreignKey: 'employee_id');
    }
}

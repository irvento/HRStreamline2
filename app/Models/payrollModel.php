<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payrollModel extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional, if the table name is different from the default)
    protected $table = 'tbl_payroll';
    protected $primaryKey = 'payroll_id';

    public $timestamps = false;

    // Define the fillable properties for mass assignment

    protected $fillable = [
        'employee_id',
        'payroll_status',
        'pay_period',
        'payroll_amount', 
        'payment_date',
    ];
}

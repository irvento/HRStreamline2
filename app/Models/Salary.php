<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'tbl_salary';
    // Specify the primary key column
    protected $primaryKey = 'salary_id';

    // If the primary key is not auto-incrementing, set this to false
    public $incrementing = true; // Or false if not auto-incrementing

    // Optionally, you can specify the table name if it's not the default
    protected $fillable = ['salary_grade', 'salary_amount', 'payment_frequency_id'];

    public $timestamps = false;

    // Define the relationship to the payment_frequencyModel model
    public function paymentFrequency()
    {
        return $this->belongsTo(paymentFrequencyModel::class, 'payment_frequency_id');
    }
}
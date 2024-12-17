<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'tbl_salary';

    protected $fillable = ['salary_grade', 'salary_amount', 'payment_frequency_id'];

    public $timestamps = false;

    // Define the relationship to the payment_frequencyModel model
    public function paymentFrequency()
    {
        return $this->belongsTo(payment_frequencyModel::class, 'payment_frequency_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'tbl_salary';

    protected $fillable = ['salary_grade', 'salary_amount', 'payment_frequency_id'];

    public $timestamps = false;
}

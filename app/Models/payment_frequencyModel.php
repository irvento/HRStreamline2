<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment_frequencyModel extends Model
{
    protected $table = 'tbl_payment_frequency_type'; // Table name
    protected $primaryKey = 'payment_frequency_id'; // PK
    public $timestamps = false;
    protected $fillable = ['payment_name'];

    // inverse relationship
    public function salaries()
    {
        return $this->hasMany(Salary::class, 'payment_frequency_id');
    }
}
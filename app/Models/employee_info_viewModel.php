<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee_info_viewModel extends Model
{
    protected $table = 'employee_info_view';
    public $timestamps = false;
    
    public function employee()
    {
        return $this->belongsTo(employeeModel::class, 'employee_id', 'employee_id');
    }
}

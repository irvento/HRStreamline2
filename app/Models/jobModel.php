<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jobModel extends Model
{
    protected $table = 'tbl_job';
    protected $primaryKey = 'job_id';
    protected $fillable = ['job_title', 'job_description', 'salary_id'];
    public $timestamps = false;
    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id');
    }
}

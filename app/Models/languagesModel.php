<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class languagesModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_languages'; // Specify the table name

    protected $primaryKey = 'language_id'; // Primary key column
    public $timestamps = false;

    protected $fillable = [
        'employee_id', 'languagesetup_id', 'proficiency_level'
    ];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }

    // Define the relationship with the LanguageSetupModel
    public function languageSetup()
    {
        return $this->belongsTo(languagesSetupModel::class, 'languagesetup_id');
    }
}

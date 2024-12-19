<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class languagesModel extends Model
{

    // Define the table name (optional if it follows Laravel's default convention)
    protected $table = 'tbl_languages';

    // Define the primary key column name (since it’s not the default 'id')
    protected $primaryKey = 'language_id';

    public $timestamps = false;

    // Other attributes as needed
    protected $fillable = [
        'employee_id',
        'languagesetup_id',
        'proficiency_level',
    ];

    // Relationships
    public function employee()
    {
        return $this->belongsTo(employeeModel::class, 'employee_id');
    }

    // Corrected method name to 'languagesSetup' (as used in your model)
    public function languagesetup()
    {
        return $this->belongsTo(languagesSetupModel::class, 'languagesetup_id');
    }
}

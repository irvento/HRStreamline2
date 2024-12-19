<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class languagesSetupModel extends Model
{
    use HasFactory;

    protected $table = 'languagesetup'; // Specify the table name

    protected $primaryKey = 'languagesetup_id'; // Primary key column
    public $timestamps = false;

    protected $fillable = [
        'name', 'description'
    ];

    // Define the relationship with the tbl_languages table
    public function languages()
    {
        return $this->hasMany(languagesModel::class, 'languagesetup_id');
    }
}

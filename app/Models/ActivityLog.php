<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    // Define the table name if it's different from the default model name
    protected $table = 'activity_logs';

    // Define the fillable attributes
    protected $fillable = [
        'user_id',
        'table_name',
        'row_id',
        'action',
        'created_at',
        'updated_at'
    ];
}
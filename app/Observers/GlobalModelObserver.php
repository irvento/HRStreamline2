<?php
namespace App\Observers;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;

class GlobalModelObserver
{
    /**
     * Handle the "created" event for any model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function created(Model $model)
    {
        // Skip logging for the activity_logs table to prevent recursion
        if ($model instanceof ActivityLog) {
            return;
        }

        // Get the model's primary key name (could be 'id' or anything else)
        $primaryKey = $model->getKeyName();

        // Log the creation action
        ActivityLog::create([
            'user_id' => auth()->id(), // Or use any other method to get the user
            'table_name' => $model->getTable(),
            'row_id' => $model->{$primaryKey}, // Dynamically get the primary key value
            'action' => 'created', // Action name for created
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Handle the "updated" event for any model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function updated(Model $model)
    {
        // Skip logging for the activity_logs table
        if ($model instanceof ActivityLog) {
            return;
        }

        // Get the model's primary key name (could be 'id' or anything else)
        $primaryKey = $model->getKeyName();

        // Log the update action with a specific description
        $action = 'updated';
        if ($model->isDirty()) {
            $changedAttributes = implode(', ', array_keys($model->getDirty()));
            $action = "updated: changed fields -> {$changedAttributes}";
        }

        // Log the update action
        ActivityLog::create([
            'user_id' => auth()->id(), // Or use any other method to get the user
            'table_name' => $model->getTable(),
            'row_id' => $model->{$primaryKey}, // Dynamically get the primary key value
            'action' => $action, // Detailed action description
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Handle the "deleted" event for any model.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function deleted(Model $model)
    {
        // Skip logging for the activity_logs table
        if ($model instanceof ActivityLog) {
            return;
        }

        // Get the model's primary key name (could be 'id' or anything else)
        $primaryKey = $model->getKeyName();

        // Log the deletion action
        ActivityLog::create([
            'user_id' => auth()->id(), // Or use any other method to get the user
            'table_name' => $model->getTable(),
            'row_id' => $model->{$primaryKey}, // Dynamically get the primary key value
            'action' => 'deleted', // Action name for deleted
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

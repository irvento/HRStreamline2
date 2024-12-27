<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Observers\GlobalModelObserver;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // You can register other services here if needed
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Automatically register the observer for all models in the 'app/Models' directory
        $models = File::allFiles(app_path('Models'));

        foreach ($models as $model) {
            $modelClass = 'App\Models\\' . $model->getFilenameWithoutExtension();

            // Ensure the class exists and is a subclass of Eloquent\Model
            if (class_exists($modelClass) && is_subclass_of($modelClass, Model::class)) {
                $modelClass::observe(GlobalModelObserver::class);
            }
        }
    }
}

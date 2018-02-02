<?php

namespace App\Providers;
use DB;
use Log;
use Validator;
use Illuminate\Support\Carbon;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Validator::extend('older', function($attribute, $value, $parameters)
        {
            $minAge = 17;
            $now = Carbon::now('Asia/Jakarta');
            $birth = Carbon::parse($value);
            return $now->diff($birth)->y >= $minAge;
        });


        DB::listen(function($query) {
            Log::info(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

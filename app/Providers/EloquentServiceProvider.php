<?php

namespace App\Providers;

use App\Denomination;
use App\Hod;
use App\Contact;
use App\Minister;
use App\Program;
use App\Commission;
use Illuminate\Support\ServiceProvider;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Denomination::deleting( function($denomination) {
            Contact::where('denomination_id', $denomination->id)->delete();
            Hod::where('denomination_id', $denomination->id)->delete();
            Minister::where('denomination_id', $denomination->id)->delete();
            Program::where('denomination_id', $denomination->id)->delete();
            Commission::where('denomination_id', $denomination->id)->delete();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

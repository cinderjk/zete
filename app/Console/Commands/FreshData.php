<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class FreshData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fresh:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command run artisan migrate, seed, and etc.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        $this->info('Running artisan migrate:fresh');
        try {
            Artisan::call('migrate:fresh');
            $this->info('Artisan migrate:fresh ran successfully.');
        } catch (\Exception $e) {
            $this->error('Artisan migrate:fresh could not be run.');
            $this->error($e->getMessage());
        }
        $this->info('Running artisan db:seed');
        try {
            Artisan::call('db:seed');
            $this->info('Artisan db:seed ran successfully.');
        } catch (\Exception $e) {
            $this->error('Artisan db:seed could not be run.');
            $this->error($e->getMessage());
        }
        // regenerate app key
        $this->info('Running artisan key:generate');
        try {
            Artisan::call('key:generate');
            $this->info('Artisan key:generate ran successfully.');
        } catch (\Exception $e) {
            $this->error('Artisan key:generate could not be run.');
            $this->error($e->getMessage());
        }
    }
}

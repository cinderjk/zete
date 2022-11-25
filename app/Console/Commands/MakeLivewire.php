<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeLivewire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mklv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will create a livewire component';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('What is the name of the component?');
        try {
            Artisan::call('make:livewire', [
                'name' => $name
            ]);
            $this->info('Livewire component created successfully.');
        } catch (\Exception $e) {
            $this->error('Livewire component could not be created.');
            $this->error($e->getMessage());
        }
    }
}

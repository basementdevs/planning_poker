<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeTrait extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a trait';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $name = $this->argument('name');
        $traitPath = app_path("Traits/{$name}.php");
        if(!File::isDirectory(app_path('Traits'))){
            File::makeDirectory(app_path('Traits'), 0777, true, true);
        }
        if (File::exists($traitPath)) {
            $this->error("Trait {$name} already exists!");
            return;
        }

        File::put($traitPath, $this->traitStub($name));

        $this->info("Trait <fg=yellow>{$name}</> created successfully!");
    }

    /**
     * Get the stub content for the trait.
     *
     * @param  string  $name
     * @return string
     */
    protected function traitStub(string $name)
    {
        return "<?php
namespace App\Traits;

trait {$name}
{
    // Add your trait methods here
}
";
    }
}

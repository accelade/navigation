<?php

declare(strict_types=1);

namespace Accelade\Navigation\Commands;

use Illuminate\Console\Command;

class InstallNavigationCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'navigation:install
                            {--force : Overwrite existing files}';

    /**
     * The console command description.
     */
    protected $description = 'Install the Navigation plugin';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Installing Navigation...');

        // Publish config
        $this->call('vendor:publish', [
            '--tag' => 'accelade-navigation-config',
            '--force' => $this->option('force'),
        ]);

        $this->info('Navigation installed successfully!');

        return self::SUCCESS;
    }
}

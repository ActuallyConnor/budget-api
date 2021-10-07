<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class IdeHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'help:ide';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run all ide-helper commands';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $generate = Artisan::call('ide-helper:generate');
        $models = Artisan::call('ide-helper:models --write');
        $meta = Artisan::call('ide-helper:meta');

        $exitCodes = $generate + $models + $meta;

        if ($exitCodes == 0) {
            $this->info('All commands run successfully');
        } else {
            if ($generate != 0) {
                $this->error('ide-helper:generate errored');
            }

            if ($models != 0) {
                $this->error('ide-helper:models errored');
            }

            if ($meta != 0) {
                $this->error('ide-helper:meta errored');
            }
        }

        return 0;
    }
}

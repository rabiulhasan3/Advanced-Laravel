<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class rename extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bitfumes:rename {form : form table name} {to : to table name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Table Rename';

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
     * @return mixed
     */
    public function handle()
    {
        $form = $this->argument('form');
        $to = $this->argument('to');
        DB::statement("ALTER TABLE $form RENAME TO $to");
        $this->info('successfully table name rename');
    }
}

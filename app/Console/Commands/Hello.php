<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Hello {name} {--L|lastname=Hasan}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command create by command';

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
    // public function handle()
    // {
    //     $name = $this->argument('name');
    //     $lastname = $this->option('lastname');
    //     $this->info($name.' '.$lastname);
    // }

    // public function handle(){
    //     $name = $this->ask('What is your name ?');
    //     $this->error($name);
    // }

    // public function handle(){
    //     $name = $this->secret('Whatas your name ?');
    //     $confirm = $this->confirm('Are you sure, you want to print your name ?');
    //     if ($confirm){
    //         $this->info($name);
    //     }
    // }

    public function handle(){
        $header = ["Name","Email"];
        $user = User::select('name','email')->get();
        $this->table($header,$user);
    }
}

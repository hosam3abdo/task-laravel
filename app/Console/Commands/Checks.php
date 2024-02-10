<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class Checks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'print:checks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'print changed emails';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
    
        $users = User::where('email', 'like', '%test%')->get();
        $count = 0;
    
        foreach ($users as $user) {
            $user->status = 'notActive';
            $user->save();
            $count++;
        }
    
        $this->info("{$count} users changed to not active");
    }
}

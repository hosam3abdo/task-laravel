<?php

namespace App\Console\Commands;
use App\Models\User;
use Illuminate\Console\Command;

class Delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'print:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'deleted email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('status', 'notActive')->get();
    $count = 0;

    foreach ($users as $user) {
        $user->delete();
        $count++;
    }

    $this->info("{$count} users deleted");
    }
}

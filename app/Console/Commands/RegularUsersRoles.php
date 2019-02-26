<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class RegularUsersRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'role:regular';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Balances roles to users';

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
        foreach (User::has('doctor')->get() as $user) {
            $user->role = 'ROLE_DOCTOR';
            $user->save();
        }

        foreach (User::has('clinic')->get() as $user) {
            $user->role = 'ROLE_DOCTOR';
            $user->save();
        }
    }
}

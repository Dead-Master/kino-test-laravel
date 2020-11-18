<?php

namespace App\Console\Commands;

use App\Models\User;
use Cache;
use Illuminate\Console\Command;

class Stats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sum all request';

    public function handle(): void
    {
        $total = 0;
        foreach ($this->getUser() as $value){
            $total += $value;
        }
        Cache::store('redis')->put('api-total-request', $total);
    }

    public function getUser(): ?\Generator
    {
        foreach(User::all() as $user) {
            yield Cache::store('redis')->get("api:users:{$user->id}") ?? 0;
        }
    }
}

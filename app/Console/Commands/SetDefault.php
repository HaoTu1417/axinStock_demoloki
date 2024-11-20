<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class SetDefault extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setDefaultabcxyz:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set default database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $defaultConnection = Config::get('database.default');
        $databaseName = Config::get("database.connections.{$defaultConnection}.database");

        // Drop the database
        DB::statement("DROP DATABASE IF EXISTS {$databaseName}");
        $this->info("Dropped database: {$databaseName}");

        // Recreate the database
        DB::statement("CREATE DATABASE {$databaseName}");
        $this->info("Recreated database: {$databaseName}");

        // Select the newly created database
        DB::statement("USE {$databaseName}");

        $this->info('The database has been dropped and recreated.');
    }
}
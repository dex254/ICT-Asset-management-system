<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateDatabaseDump extends Command
{
    protected $signature = 'db:dump {--database= : The database to dump}';
    protected $description = 'Generate a SQL dump of the specified database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $database = $this->option('database') ?? env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST', '127.0.0.1');

        $filename = 'database_dump_' . now()->format('Ymd_His') . '.sql';
        $path = storage_path('app/' . $filename);

        // Generate the SQL dump using `mysqldump`
        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s %s > %s',
            escapeshellarg($username),
            escapeshellarg($password),
            escapeshellarg($host),
            escapeshellarg($database),
            escapeshellarg($path)
        );

        exec($command);

        $this->info('SQL dump generated: ' . $filename);
    }
}

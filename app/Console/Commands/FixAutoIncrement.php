<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixAutoIncrement extends Command
{
    protected $signature = 'db:fix-auto-increment {--database=}';
    protected $description = 'Fix AUTO_INCREMENT on all primary key columns that are missing it';

    public function handle()
    {
        $database = $this->option('database') ?? config('database.connections.mysql.database');

        $rows = DB::select("
            SELECT TABLE_NAME, COLUMN_NAME, COLUMN_TYPE
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_SCHEMA = ?
              AND COLUMN_KEY = 'PRI'
              AND EXTRA NOT LIKE '%auto_increment%'
        ", [$database]);

        if (empty($rows)) {
            $this->info("All primary keys already have AUTO_INCREMENT.\n\nBest regards, 👨‍💻 Eng. Abdelrahman abu Eisha");
            return;
        }

        foreach ($rows as $row) {
            // Clean type (remove duplicate UNSIGNED if exists)
            $columnType = strtoupper($row->COLUMN_TYPE);
            $columnType = str_replace(' UNSIGNED', '', $columnType);

            $sql = "ALTER TABLE {$row->TABLE_NAME} 
            MODIFY {$row->COLUMN_NAME} {$columnType} NOT NULL AUTO_INCREMENT";

            try {
                DB::statement($sql);
                $this->info("AUTO_INCREMENT fixed on {$row->TABLE_NAME}.{$row->COLUMN_NAME}\nBest regards, 👨‍💻 Eng. Abdelrahman abu Eisha");
            } catch (\Exception $e) {
                $this->error("Failed on {$row->TABLE_NAME}.{$row->COLUMN_NAME}: " . $e->getMessage());
            }
        }
    }
}

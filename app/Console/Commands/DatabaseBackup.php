<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use File;

class DatabaseBackup extends Command
{
    //30일 지난 파일 삭제
    const __DELETE_30_DAYS__ = 3600 * 24 * 30;

    //5년 지난 파일 삭제
    const __DELETE_5_YEARS__ = 3600 * 24 * 365 * 5;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create copy of mysql dump for existing database.';

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
    
        $this->bakupLogTables();
        $this->bakupDatabase();

    }

    //----------------------------------------------------------
    public static function bakupDatabase()
    {
        $filename = "backup-".Carbon::now()->format('Y-m-d').".gz";

        // Create backup folder and set permission if not exist.
        $storageAt = storage_path()."/app/backup/database/";
        if(!File::exists($storageAt))
        {
            File::makeDirectory($storageAt, 0777, true, true);
        }

        $command = "mysqldump --user=".
                    env('DB_USERNAME').
                    " --password=".
                    env('DB_PASSWORD').
                    " --host=".
                    env('DB_HOST').
                    " ".
                    env('DB_DATABASE').
                    " | gzip > ".
                    $storageAt.
                    $filename;

        $returnVar = NULL;
        $output = NULL;
        exec($command, $output, $returnVar);

        //old file delete
        static::deleteOldFiles($storageAt, self::__DELETE_30_DAYS__);
    }

    //----------------------------------------------------------
    public static function bakupLogTables()
    {
        $filename = "log_tables-".Carbon::now()->format('Y-m-d').".gz";

        // Create backup folder and set permission if not exist.
        $storageAt = storage_path()."/app/backup/logs/";
        if(!File::exists($storageAt))
        {
            File::makeDirectory($storageAt, 0777, true, true);
        }

        $command = "mysqldump --user=".
                    env('DB_USERNAME').
                    " --password=".
                    env('DB_PASSWORD').
                    " --host=".
                    env('DB_HOST').
                    " ".
                    env('DB_DATABASE').
                    " loginmenus logins accesshistories | gzip > ".
                    $storageAt.
                    $filename;

        $returnVar = NULL;
        $output = NULL;
        exec($command, $output, $returnVar);

        //old file delete
        static::deleteOldFiles($storageAt, self::__DELETE_5_YEARS__);
    }

    //----------------------------------------------------------
    public static function createPathDiretory($path_dir, $abs = true)
    {
        if (!is_dir($path_dir))
        {
            //create the path with permission to read and write
            mkdir($path_dir, 0777, true);
        }

        return ($abs ? $path_dir : $path_dir);
    }

    //----------------------------------------------------------
    public static function deleteOldFiles($storePath, $time)
    {
        foreach(glob($storePath."*") as $file)
        {
            if (time() - filectime($file) > $time)
            {
                unlink($file);
            }
        }
    }
}
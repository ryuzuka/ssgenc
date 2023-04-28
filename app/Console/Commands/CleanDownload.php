<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CleanDownload extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean all file inside download folder';

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
        $this->cleanDirectory('download');
    }

    private function cleanDirectory($path, $recursive = false)
    {
        File::cleanDirectory( public_path($path) );
    }
}
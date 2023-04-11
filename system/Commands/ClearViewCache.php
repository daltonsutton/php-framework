<?php

namespace System\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ClearViewCache extends Command {
    protected $signature = 'clear:view-cache';
    protected $description = 'Clear the view cache';

    public function handle() {
        $filesystem = new Filesystem;
        $filesystem->cleanDirectory('app/storage/cache/views');
        
        $this->info('View cache cleared!');
    }
}
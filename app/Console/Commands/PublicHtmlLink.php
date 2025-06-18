<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PublicHtmlLink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'public_html:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a symbolic link from public_html to public';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $target = base_path('public');
        $link = base_path('public_html');

        if (!file_exists($link)) {
            symlink($target, $link);
            $this->info("The [public_html] link has been connected to [public].");
        } else {
            $this->info("The [public_html] link already exists.");
        }
    }
}

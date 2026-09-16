<?php

namespace App\Console\Commands;

use App\Services\Frontend\SitemapService;
use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the XML sitemap for Medvion platform';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('Generating sitemap for Medvion (https://medvion.org)...');

        try {
            $path = SitemapService::generateToFile();
            $this->info("✓ Sitemap successfully generated at: {$path}");
            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error("Failed to generate sitemap: {$e->getMessage()}");
            return self::FAILURE;
        }
    }
}

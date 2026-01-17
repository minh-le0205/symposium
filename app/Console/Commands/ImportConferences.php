<?php

namespace App\Console\Commands;

use App\Models\Conference;
use App\Services\CallingAllPaper;
use Illuminate\Console\Command;

class ImportConferences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-conferences';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(CallingAllPaper $callingAllPaper): int
    {
        $cfps = $callingAllPaper->getCallForPapers();

        if ($cfps) {
            $total = count($cfps['cfps']);
            $this->info("Found {$total} conferences to import.");

            $progressBar = $this->output->createProgressBar($total);
            $progressBar->start();

            foreach ($cfps['cfps'] as $cfp) {
                $this->saveConference($cfp);
                $progressBar->advance();
            }

            $progressBar->finish();
            $this->newLine(2);
            $this->info("Successfully imported {$total} conferences.");
        } else {
            $this->error('Failed to fetch call for papers.');
        }

        return Command::SUCCESS;
    }

    private function saveConference(array $cfp): void
    {
        Conference::updateOrCreate(
            ['cla_id' => $cfp['_rel']['cfp_uri']],
            [
                'title' => $cfp['name'],
                'location' => $cfp['location'],
                'description' => $cfp['description'],
                'url' => $cfp['eventUri'],
                'starts_at' => $cfp['dateEventStart'],
                'ends_at' => $cfp['dateEventEnd'],
                'cfp_starts_at' => $cfp['dateCfpStart'],
                'cfp_ends_at' => $cfp['dateCfpEnd'],
            ]
        );
    }
}

<?php

namespace App\Console\Commands;

use App\Singletons\FacebookApi;
use Illuminate\Console\Command;

class FetchFacebook extends Command
{
    protected $signature = 'app:fetch-facebook';
    protected $description = 'Fetches Facebook posts';

    public function handle(FacebookApi $fb) {
        $response = $fb
            ->getFb()
            ->get("/" . config("facebook.fetch_page_id") . "/feed");
        $this->info($response->getBody());
    }
}

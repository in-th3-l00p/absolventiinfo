<?php

namespace App\Singletons;

use Facebook\Exception\SDKException;
use Facebook\Facebook;
use Illuminate\Support\Facades\Log;

class FacebookApi {
    private Facebook $fb;

    public function __construct() {
        try {
            $this->fb = new Facebook([
                'app_id' => config("facebook.app_id"),
                'app_secret' => config("facebook.app_secret"),
                'default_graph_version' => config("facebook.default_graph_version"),
                'default_access_token' => config("facebook.default_access_token")
            ]);
        } catch (SDKException $e) {
            Log::error("Facebook SDK Exception: " . $e->getMessage());
        }
    }

    public function getFb(): Facebook {
        return $this->fb;
    }
};

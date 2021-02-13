<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class GitHubService
{
    use ConsumesExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.github.base_uri');
    }

    public function searchRepositories($uri){
        return $this->performRequest('GET', 'search/repositories'.$uri);
    }

}

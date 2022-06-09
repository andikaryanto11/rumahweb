<?php

namespace App\Controllers;

use Ci4Common\Services\ViewCollectionService;

class Home extends BaseController
{

    /**
     * @var ViewCollectionService $viewCollectionService
     */
    protected ViewCollectionService $viewCollectionService;
    
    /**
     * Undocumented function
     *
     * @param ViewCollectionService $viewCollectionService
     */
    public function __construct(
        ViewCollectionService $viewCollectionService
    )
    {
        $this->viewCollectionService = $viewCollectionService;
    }

    public function index()
    {
        $this->viewCollectionService->addView(view('welcome_message'));
        return $this->viewCollectionService;
    }
}

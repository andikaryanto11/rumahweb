<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Eloquents\M_banners;
use App\Eloquents\M_branches;
use App\Eloquents\M_cities;
use App\Eloquents\M_popups;
use App\Eloquents\M_vehicletypes;
use Ci4Common\Libraries\SessionLib;

class Error404 extends BaseController
{
    public function index()
    {
      
        echo view('errors/html/error_404');
    }
}

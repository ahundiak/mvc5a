<?php
declare(strict_types=1);

namespace App\Controllers;

use System\Web\Mvc\ActionResult;
use System\Web\Mvc\Controller;

class HomeController extends Controller
{
    public function Index() : ActionResult
    {
        return $this->View();
    }
}
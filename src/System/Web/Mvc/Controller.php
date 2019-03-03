<?php
declare(strict_types = 1);

namespace System\Web\Mvc;

class Controller
{
    protected function View() : ViewResult
    {
        return new ViewResult();
    }
}
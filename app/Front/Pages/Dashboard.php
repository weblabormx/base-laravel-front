<?php

namespace App\Front\Pages;

use WeblaborMx\Front\Components\Welcome;
use WeblaborMx\Front\Components\Line;

class Dashboard extends Page
{
    public function fields()
    {
        return [
            Welcome::make(),
            Line::make(),
        ];
    }
}

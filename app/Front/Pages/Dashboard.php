<?php

namespace App\Front\Pages;

use App\Front\Inputs\WireInput;
use Spatie\Html\Elements as Html;
use WeblaborMx\Front\Components\Welcome;

class Dashboard extends Page
{
    public function fields()
    {


        return [
            Welcome::make(),

            Html\Div::create()->class('border-b-2 my-7'),

            WireInput::make('modal')
                ->addAttribute('name', 'my-modal')
                ->addAttribute('blurness', true)
                ->children([
                    WireInput::make('card')
                        ->addAttribute('title', 'Wenas')
                        ->class('w-full')
                        ->children([
                            Html\Img::create()
                                ->src('//placekitten.com/1000/1000')
                        ])
                ]),

            WireInput::make('button', [
                'label' => 'Abre el modal',
                'x-on:click' => "\$openModal('my-modal')",
                'full' => true
            ]),
        ];
    }
}

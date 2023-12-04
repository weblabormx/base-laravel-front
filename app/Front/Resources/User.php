<?php

namespace App\Front\Resources;

use WeblaborMx\Front\Inputs;
use App\Models\User as Model;
use App\Front\Resources\Resource;

class User extends Resource
{
    public $base_url = '/admin/users';
    public $model = Model::class;
    public $title = 'name';
    public $icon = 'users';

    public function fields()
    {
        return [
            Inputs\ID::make(),
            Inputs\Text::make('Name')->rules('required'),
            Inputs\Text::make('Email')->rules(['required', 'email']),
            Inputs\Password::make('New Password')->rules(['string', 'min:8', 'nullable'])->creationRules('required'),
        ];
    }
}

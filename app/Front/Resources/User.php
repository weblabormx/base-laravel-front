<?php

namespace App\Front\Resources;

use WeblaborMx\Front\Inputs\ID;
use WeblaborMx\Front\Inputs\Text;
use WeblaborMx\Front\Inputs\Password;
use App\Models\User as Model;
use App\Front\Resources\Resource;

class User extends Resource
{
    public $base_url = '/admin/users';
    public $model = Model::class;
    public $title = 'name';

    public function fields()
    {
        return [
            ID::make(),
            Text::make('Name')->rules('required'),
            Text::make('Email')->rules(['required', 'email']),
            Password::make('New Password')->rules(['string', 'min:8', 'nullable'])->creationRules('required'),
        ];
    }
}

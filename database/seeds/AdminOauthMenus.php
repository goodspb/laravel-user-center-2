<?php

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Menu;

class AdminOauthMenus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::insert([
            [
                'parent_id' => 0,
                'order'     => 8,
                'title'     => 'Oauth',
                'icon'      => 'fa-server',
                'uri'       => '',
            ],
            [
                'parent_id' => 8,
                'order'     => 9,
                'title'     => 'Oauth Clients',
                'icon'      => 'fa-list-alt',
                'uri'       => 'oauth/client',
            ],
            [
                'parent_id' => 8,
                'order'     => 10,
                'title'     => 'Oauth Auth Codes',
                'icon'      => 'fa-toggle-off',
                'uri'       => 'oauth/code',
            ],
        ]);
    }
}

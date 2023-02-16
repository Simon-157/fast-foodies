<?php

namespace App\Controllers;

use App\Models\Menu;
use Core\View;

class Menus extends \Core\Controller

{

    public function _construct()
    {

        return true;
    }

    public function indexAction()
    {
        $data = [
            'title' => 'some value',
        ];

        View::render('Menu/index.php', $data);
    }

    public function allmenusAction()
    {
        $data = Menu::getAllMenus();
        return $data;
    }
}

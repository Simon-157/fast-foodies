<?php

namespace App\Controllers;

use \Core\View;

class Admin extends \Core\Controller

{

    /**
     * Show the index page
     *
     * @return void
     */
    public function adminAction()
    {
        View::render('Admin/index.php', [
        'data' => \App\Models\User::getAll()
    ]);
    }
}

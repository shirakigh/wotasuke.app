<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

class HtmlController extends AppController {

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];
        if (in_array($action, ['board'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    public function board()
    {
    }
}

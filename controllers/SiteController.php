<?php

namespace app\controllers;

use app\components\yii\web\AppController;

/**
 * Class SiteController
 * Index site controller
 *
 * @package   app\controllers
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   13.09.2017 20:00
 */
class SiteController extends AppController
{
    /**
     * Displays dashboard.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}

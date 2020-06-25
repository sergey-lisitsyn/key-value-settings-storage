<?php

namespace sergeylisitsyn\settingsStorage\controllers;

use yii\web\Controller;

/**
 * Default controller for the `settingsStorage` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $foo = \Yii::$app->settingsStorage->getValue('foo');
        return $this->render('index');
    }
}

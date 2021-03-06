<?php

namespace sergeylisitsyn\settingsStorage\controllers;

use yii\web\Controller;
use cebe\markdown\Markdown;

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
        $readme = null;
        
        $text = @file_get_contents(dirname(__DIR__) . '/README.md');
        $parser = new Markdown();
        $readme = $parser->parse($text);
        
        return $this->render('index', ['readme' => $readme]);
    }
    
    public function actionTest()
    {
        return $this->render('test');
    }
}

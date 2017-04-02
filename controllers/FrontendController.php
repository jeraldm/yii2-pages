<?php
/**
 */

namespace execut\pages\controllers;


use execut\actions\Action;
use execut\actions\action\adapter\Delete;
use execut\actions\action\adapter\Edit;
use execut\actions\action\adapter\GridView;
use execut\crud\fields\Field;
use execut\pages\action\adapter\ShowPage;
use execut\pages\models\Page;
use execut\navigation\Behavior;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class FrontendController extends Controller
{
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'navigation' => [
                'class' => Behavior::class,
            ],
        ]);
    }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'class' => Action::class,
                'adapter' => [
                    'class' => ShowPage::class,
                    'modelClass' => Page::class,
                ],
                'view' => 'index',
            ],
        ]); // TODO: Change the autogenerated stub
    }
}
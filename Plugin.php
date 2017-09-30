<?php
/**
 */

namespace execut\pages;


use execut\navigation\Page;
use yii\db\ActiveQuery;

interface Plugin
{
    public function getPageFieldsPlugins();
    public function getCacheKeyQueries();
    public function initCurrentNavigationPage(Page $navigationPage, \execut\pages\models\Page $pageModel);
    public function applyCurrentPageScopes(ActiveQuery $q);
}
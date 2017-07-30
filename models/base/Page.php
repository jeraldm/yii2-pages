<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace execut\pages\models\base;

use Yii;

/**
 * This is the base-model class for table "pages_pages".
 *
 * @property integer $id
 * @property string $created
 * @property string $updated
 * @property string $name
 * @property boolean $visible
 * @property integer $pages_page_id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $header
 * @property string $text
 * @property string $alias
 *
 * @property \execut\pages\models\MenuItem[] $menuItems
 * @property \execut\pages\models\Page $pagesPage
 * @property \execut\pages\models\Page[] $pages
 * @property string $aliasModel
 */
abstract class Page extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages_pages';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created', 'updated'], 'safe'],
            [['name'], 'required'],
            [['visible'], 'boolean'],
            [['pages_page_id'], 'default', 'value' => null],
            [['pages_page_id'], 'integer'],
            [['name', 'title', 'description', 'keywords', 'header', 'text', 'alias'], 'string', 'max' => 255],
            [['pages_page_id'], 'exist', 'skipOnError' => true, 'targetClass' => \execut\pages\models\Page::className(), 'targetAttribute' => ['pages_page_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('execut/pages', 'ID'),
            'created' => Yii::t('execut/pages', 'Created'),
            'updated' => Yii::t('execut/pages', 'Updated'),
            'name' => Yii::t('execut/pages', 'Name'),
            'visible' => Yii::t('execut/pages', 'Visible'),
            'pages_page_id' => Yii::t('execut/pages', 'Pages Page ID'),
            'title' => Yii::t('execut/pages', 'Title'),
            'description' => Yii::t('execut/pages', 'Description'),
            'keywords' => Yii::t('execut/pages', 'Keywords'),
            'header' => Yii::t('execut/pages', 'Header'),
            'text' => Yii::t('execut/pages', 'Text'),
            'alias' => Yii::t('execut/pages', 'Alias'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuItems()
    {
        return $this->hasMany(\execut\pages\models\MenuItem::className(), ['pages_page_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagesPage()
    {
        return $this->hasOne(\execut\pages\models\Page::className(), ['id' => 'pages_page_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(\execut\pages\models\Page::className(), ['pages_page_id' => 'id']);
    }


    
    /**
     * @inheritdoc
     * @return \execut\pages\models\queries\PageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \execut\pages\models\queries\PageQuery(get_called_class());
    }


}
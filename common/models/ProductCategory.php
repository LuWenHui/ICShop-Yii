<?php

namespace common\models;

use Yii;
use common\components\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

class ProductCategory extends ActiveRecord {
    public static function tableName() {
        return "{{%product_category}}";
    }
    
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    public function rules() {
        return [
            ['status', 'default', 'value' => self::STATUS_DEFAULT],
            ['parent_id', 'number', 'integerOnly' => true],
            ['parent_id', 'default', 'value' => 0],
            [['name', 'status'], 'required'],
            [['name', 'slug', 'icon_class'], 'string'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'Id'),
            'name' => Yii::t('app', 'Product Category Name'),
            'parent_id' => Yii::t('app', 'Product Category Parent'),
            'slug' => Yii::t('app', 'Slug'),
            'icon_class' => Yii::t('app', 'Icon Class'),
            'display_order' => Yii::t('app', 'Display Order'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
    
    public function getParent() {
        return $this->hasOne(static::className(), ['id' => 'parent_id']);
    }
    
    public static function getTreeIdNameList($refresh = false) {
        static $_treeList;
        if (!isset($_treeList) || $refresh) {
            $_treeList = ArrayHelper::merge([0 => ''], static::buildSelectTree(static::getList()));
        }
        return $_treeList;
    }
    
    protected static function buildSelectTree($childrens, $level = 0, $parent_id = 0) {
        static $_tree;
        foreach($childrens as $index => $children) {
            if ($parent_id == $children->parent_id) {
                $_tree[$children->id] = str_repeat('-', $level * 4) . $children->name;
                unset($childrens[$index]);
                static::buildSelectTree($childrens, $level + 1, $children->id);
            }
        }
        return $_tree;
    }
    
    public static function getList($refresh = false) {
        static $_list;
        if (!isset($_list) || $refresh) {
            $_list = static::softFind()->all();
        }
        return $_list;
    }
}

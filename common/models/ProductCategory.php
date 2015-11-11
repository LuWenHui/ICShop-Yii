<?php

namespace common\models;

use Yii;
use common\components\ActiveRecord;
use yii\behaviors\TimestampBehavior;

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
            [['name', 'status', 'parent_id'], 'required'],
            [['name', 'slug'], 'string'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'Id'),
            'name' => Yii::t('app', 'ProductCategoryName'),
            'parent_id' => Yii::t('app', 'ProductCategoryParent'),
            'slug' => Yii::t('app', 'Slug'),
            'display_order' => Yii::t('app', 'DisplayOrder'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'CreatedAt'),
            'updated_at' => Yii::t('app', 'UpdatedAt'),
        ];
    }
    
    public function getParent() {
        return $this->hasOne(static::className(), ['id' => 'parent_id']);
    }
    
    public static function getTreeIdNameList($refresh = false) {
        static $_treeList;
        if (!isset($_treeList) || $refresh) {
            $_treeList = static::buildSelectTree(static::getList());
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

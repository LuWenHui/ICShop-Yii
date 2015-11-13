<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%product_attribute}}".
 *
 * @property integer $category_id
 * @property string $name
 * @property integer $type
 * @property string $option
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class ProductAttribute extends \common\components\ActiveRecord
{
    const TYPE_UNIQUE = 1;
    const TYPE_MULTIPLE = 2;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_attribute}}';
    }
    
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'type'], 'required'],
            [['category_id', 'type', 'created_at', 'updated_at', 'status'], 'integer'],
            [['name'], 'string', 'max' => 16],
            [['option'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app', 'Category ID'),
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Product Attribute Type'),
            'option' => Yii::t('app', 'Product Attribute Option'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    
    public static function getTypeLabels() {
        return [
            self::TYPE_UNIQUE => '唯一',
            self::TYPE_MULTIPLE => '可多选',
        ];
    }
}

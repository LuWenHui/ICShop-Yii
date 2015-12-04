<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use common\models\ProductCategory;
use common\models\ProductPicture;
use common\models\ProductAttributeAssignment;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property integer $inventory
 * @property string $description
 * @property string $logo
 * @property string $our_price
 * @property string $market_price
 * @property string $promotion_price
 * @property integer $promotion_start_time
 * @property integer $promotion_end_time
 * @property integer $is_new
 * @property integer $is_hot
 * @property integer $is_best
 * @property integer $display_order
 * @property integer $score
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 */
class Product extends \common\components\ActiveRecord
{
    const IS_NEW_NEW = 1;
    const IS_NEW_NOT_NEW = 0;
    
    const IS_HOT_HOT = 1;
    const IS_HOT_NOT_HOT = 0;
    
    const IS_BEST_BEST = 1;
    const IS_BEST_NOT_BEST = 0;
    
    protected $_attributeAssignmentsIdMap;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['name'], 'unique'],
            [['category_id', 'inventory', 'promotion_start_time', 'promotion_end_time', 'is_new', 'is_hot', 'is_best', 'display_order', 'score', 'created_at', 'updated_at', 'status'], 'integer'],
            [['description'], 'string'],
            [['our_price', 'market_price', 'promotion_price'], 'number'],
            [['name'], 'string', 'max' => 32],
            [['logo'], 'string', 'max' => 128],
            [['is_new', 'is_best', 'is_hot'], 'default', 'value' => 0],
            ['status', 'default', 'value' => self::STATUS_DEFAULT],
            [['display_order', 'score'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'name' => Yii::t('app', 'Name'),
            'inventory' => Yii::t('app', 'Inventory'),
            'description' => Yii::t('app', 'Description'),
            'logo' => Yii::t('app', 'Logo'),
            'our_price' => Yii::t('app', 'Our Price'),
            'market_price' => Yii::t('app', 'Market Price'),
            'promotion_price' => Yii::t('app', 'Promotion Price'),
            'promotion_start_time' => Yii::t('app', 'Promotion Start Time'),
            'promotion_end_time' => Yii::t('app', 'Promotion End Time'),
            'is_new' => Yii::t('app', 'Is New'),
            'is_hot' => Yii::t('app', 'Is Hot'),
            'is_best' => Yii::t('app', 'Is Best'),
            'display_order' => Yii::t('app', 'Display Order'),
            'score' => Yii::t('app', 'Score'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
        ];
    }
    
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    public function getCategory() {
        return $this->hasOne(ProductCategory::className(), ['id' => 'category_id'])->andWhere(['!=', 'status', self::STATUS_DELETE]);
    }
    
    public function getPictures() {
        return $this->hasMany(ProductPicture::className(), ['product_id' => 'id'])->andWhere(['!=', 'status', self::STATUS_DELETE]);
    }
    
    public function getAttributeAssignments() {
        return $this->hasMany(ProductAttributeAssignment::className(), ['product_id' => 'id'])->andWhere(['!=', 'status', self::STATUS_DELETE]);
    }
    
    public function getAttributeAssignmentsAttributeIdMap() {
        if (!isset($this->_attributeAssignmentsIdMap)) {
            $this->_attributeAssignmentsIdMap = [];
            foreach($this->attributeAssignments as $productAttributeAssignment) {
                if (!isset($this->_attributeAssignmentsIdMap[$productAttributeAssignment->attribute_id])) {
                    $this->_attributeAssignmentsIdMap[$productAttributeAssignment->attribute_id] = [];
                }
                $this->_attributeAssignmentsIdMap[$productAttributeAssignment->attribute_id][] = $productAttributeAssignment;
            }
        }
        return $this->_attributeAssignmentsIdMap;
    }
    
    public function getAttributeCategory() {
        return ProductAttributeCategory::softFind()
            ->select('product_attribute_category.*')
            ->leftJoin(ProductAttribute::tableName(), '`product_attribute_category`.`id` = `product_attribute`.`category_id`')
            ->leftJoin(ProductAttributeAssignment::tableName(), '`product_attribute_assignment`.`attribute_id` = `product_attribute`.`id`')
            ->leftJoin(static::tableName(), '`product`.`id` = `product_attribute_assignment`.`product_id`')
            ->where(['product.id' => $this->id]);
    }
    
    public static function getIsNewLabels() {
        return [
            self::IS_NEW_NEW => '新品',
            self::IS_NEW_NOT_NEW => '非新品',
        ];
    }
    
    public function getIsNewLabel() {
        return ArrayHelper::getValue(static::getIsNewLabels(), $this->is_new);
    }
    
    public static function getIsHotLabels() {
        return [
            self::IS_HOT_HOT => '热卖',
            self::IS_HOT_NOT_HOT => '非热卖',
        ];
    }
    
    public function getIsHotLabel() {
        return ArrayHelper::getValue(static::getIsHotLabels(), $this->is_hot);
    }
    
    public static function getIsBestLabels() {
        return [
            self::IS_BEST_BEST => '推荐',
            self::IS_BEST_NOT_BEST => '非推荐',
        ];
    }
    
    public function getIsBestLabel() {
        return ArrayHelper::getValue(static::getIsBestLabels(), $this->is_best);
    }
    
    public function getLogoAccessUrl() {
        return $this->logo ? Yii::$app->params['uploadweb'] . '/' . $this->logo : '';
    }
}

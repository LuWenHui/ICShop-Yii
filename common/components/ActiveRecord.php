<?php

namespace common\components;

use yii\helpers\ArrayHelper;

class ActiveRecord extends \yii\db\ActiveRecord {
    const STATUS_DELETE = 0;
    const STATUS_DEFAULT = 1;
    
    public static function softFind() {
        return static::find()->andWhere(['!=', 'status', self::STATUS_DELETE]);
    }
    
    public function softDelete() {
        $this->status = self::STATUS_DELETE;
        return $this->update(false, ['status']);
    }
    
    protected static function findByCondition($condition)
    {
        $query = static::softFind();

        if (!ArrayHelper::isAssociative($condition)) {
            // query by primary key
            $primaryKey = static::primaryKey();
            if (isset($primaryKey[0])) {
                $condition = [$primaryKey[0] => $condition];
            } else {
                throw new InvalidConfigException('"' . get_called_class() . '" must have a primary key.');
            }
        }

        return $query->andWhere($condition);
    }
}

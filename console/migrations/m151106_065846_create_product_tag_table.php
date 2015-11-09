<?php

use yii\db\Schema;
use yii\db\Migration;

class m151106_065846_create_product_tag_table extends Migration
{
    const PRODUCT_TAG_TABLE = '{{%product_tag}}';
    public function up()
    {
        $this->createTable(self::PRODUCT_TAG_TABLE, [
            'product_id' => $this->integer()->notNull(),
            'value' => $this->string(8)->notNull(),
            'count' => $this->integer()->notNull()->defaultValue(0),
            
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_time' => $this->integer()->notNull(),
            'updated_time' => $this->integer()->notNull(),
        ], $this->db->driverName == 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB' : '');
    }

    public function down()
    {
        $this->dropTable(self::PRODUCT_TAG_TABLE);
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sgbv_type}}`.
 */
class m210331_055117_create_sgbv_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sgbv_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'desc' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sgbv_type}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%plea_status}}`.
 */
class m210627_205333_create_plea_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%plea_status}}', [
            'id' => $this->primaryKey(),
            'status' => $this->string(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%plea_status}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%training_attachment_lines}}`.
 */
class m210520_193050_create_training_attachment_lines_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%training_attachment_lines}}', [
            'id' => $this->primaryKey(),
            'training_id' => $this->integer(),
            'description' => $this->string(250),
            'filename' => $this->string(),
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
        $this->dropTable('{{%training_attachment_lines}}');
    }
}

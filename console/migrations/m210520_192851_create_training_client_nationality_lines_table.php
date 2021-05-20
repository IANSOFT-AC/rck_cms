<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%training_client_nationality_lines}}`.
 */
class m210520_192851_create_training_client_nationality_lines_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%training_client_nationality_lines}}', [
            'id' => $this->primaryKey(),
            'training_id' => $this->integer(),
            'nationality' => $this->integer(),
            'number' => $this->integer(),
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
        $this->dropTable('{{%training_client_nationality_lines}}');
    }
}

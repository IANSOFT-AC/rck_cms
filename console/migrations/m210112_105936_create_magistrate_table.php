<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%magistrate}}`.
 */
class m210112_105936_create_magistrate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%magistrate}}', [
            'id' => $this->primaryKey(),
            'names' => $this->string(),
            'code' => $this->string(),
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
        $this->dropTable('{{%magistrate}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%counsellors}}`.
 */
class m210112_110707_create_counsellors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%counsellors}}', [
            'id' => $this->primaryKey(),
            'counsellor' => $this->string(),
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
        $this->dropTable('{{%counsellors}}');
    }
}

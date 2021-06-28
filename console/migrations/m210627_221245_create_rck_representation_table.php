<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rck_representation}}`.
 */
class m210627_221245_create_rck_representation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rck_representation}}', [
            'id' => $this->primaryKey(),
            'representation' => $this->string(60)->unique()->notNull(),
            'case_category' => $this->string(50),
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
        $this->dropTable('{{%rck_representation}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%case_referer}}`.
 */
class m210622_110634_create_case_referer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%case_referer}}', [
            'id' => $this->primaryKey(),
            'referer' => $this->string()->unique()->notNull(),
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
        $this->dropTable('{{%case_referer}}');
    }
}

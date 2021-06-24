<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nature_of_sentence}}`.
 */
class m210621_220139_create_nature_of_sentence_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nature_of_sentence}}', [
            'id' => $this->primaryKey(),
            'nature' => $this->string()->notNull()->unique(),
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
        $this->dropTable('{{%nature_of_sentence}}');
    }
}

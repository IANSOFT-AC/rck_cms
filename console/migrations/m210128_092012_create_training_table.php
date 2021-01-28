<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%training}}`.
 */
class m210128_092012_create_training_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%training}}', [
            'id' => $this->primaryKey(),
            'organizer' => $this->string(),
            'date' => $this->integer(),
            'topic' => $this->string(),
            'venue' => $this->string(),
            'facilitators' => $this->text(),
            'no_of_participants' => $this->string(),
            'participants_scan' => $this->string(),
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
        $this->dropTable('{{%training}}');
    }
}

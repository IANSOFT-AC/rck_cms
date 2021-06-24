<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%case_outcome}}`.
 */
class m210621_215819_create_case_outcome_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%case_outcome}}', [
            'id' => $this->primaryKey(),
            'outcome' => $this->string()->notNull()->unique(),
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
        $this->dropTable('{{%case_outcome}}');
    }
}

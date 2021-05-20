<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%intervention_progress_lines}}`.
 */
class m210520_193616_create_intervention_progress_lines_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%intervention_progress_lines}}', [
            'id' => $this->primaryKey(),
            'intervention_id' => $this->integer(),
            'progress_update' => $this->text(),
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
        $this->dropTable('{{%intervention_progress_lines}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%intervention_budget_lines}}`.
 */
class m210520_193417_create_intervention_budget_lines_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%intervention_budget_lines}}', [
            'id' => $this->primaryKey(),
            'intervention_id' => $this->integer(),
            'year' => $this->integer(),
            'amount' => $this->float(),
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
        $this->dropTable('{{%intervention_budget_lines}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%training}}`.
 */
class m210414_142711_add_group_and_family_column_to_training_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%training}}', 'session_goals', $this->text());
        $this->addColumn('{{%training}}', 'key_tasks_achieved', $this->text());
        $this->addColumn('{{%training}}', 'challenges_emerging', $this->text());
        $this->addColumn('{{%training}}', 'interventions_by_facilitator', $this->text());
        $this->addColumn('{{%training}}', 'achievement_of_goals', $this->text());
        $this->addColumn('{{%training}}', 'stage', $this->text());
        $this->addColumn('{{%training}}', 'remarks', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%training}}', 'session_goals');
        $this->dropColumn('{{%training}}', 'key_tasks_achieved');
        $this->dropColumn('{{%training}}', 'challenges_emerging');
        $this->dropColumn('{{%training}}', 'interventions_by_facilitator');
        $this->dropColumn('{{%training}}', 'achievement_of_goals');
        $this->dropColumn('{{%training}}', 'stage');
        $this->dropColumn('{{%training}}', 'remarks');
    }
}

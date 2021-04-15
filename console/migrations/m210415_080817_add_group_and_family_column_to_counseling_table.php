<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%counseling}}`.
 */
class m210415_080817_add_group_and_family_column_to_counseling_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%counseling}}', 'session_goals', $this->text());
        $this->addColumn('{{%counseling}}', 'key_tasks_achieved', $this->text());
        $this->addColumn('{{%counseling}}', 'challenges_emerging', $this->text());
        $this->addColumn('{{%counseling}}', 'interventions_by_facilitator', $this->text());
        $this->addColumn('{{%counseling}}', 'achievement_of_goals', $this->text());
        $this->addColumn('{{%counseling}}', 'stage', $this->text());
        $this->addColumn('{{%counseling}}', 'remarks', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%counseling}}', 'session_goals');
        $this->dropColumn('{{%counseling}}', 'key_tasks_achieved');
        $this->dropColumn('{{%counseling}}', 'challenges_emerging');
        $this->dropColumn('{{%counseling}}', 'interventions_by_facilitator');
        $this->dropColumn('{{%counseling}}', 'achievement_of_goals');
        $this->dropColumn('{{%counseling}}', 'stage');
        $this->dropColumn('{{%counseling}}', 'remarks');
    }
}

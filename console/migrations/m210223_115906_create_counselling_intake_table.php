<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%counselling_intake}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%intervention}}`
 */
class m210223_115906_create_counselling_intake_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%counselling_intake}}', [
            'id' => $this->primaryKey(),
            'ic_presenting_problem' => $this->text(),
            'observation_of_ic_behaviour' => $this->text(),
            'other_interventions_given_elsewhere' => $this->text(),
            'how_you_supported_the_client' => $this->text(),
            'skills_used' => $this->text(),
            'next_appointment_if_any' => $this->string(),
            'counselor_comment' => $this->text(),
            'referred_to' => $this->string(),
            'counsellor_id' => $this->integer(),
            'intervention_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `intervention_id`
        $this->createIndex(
            '{{%idx-counselling_intake-intervention_id}}',
            '{{%counselling_intake}}',
            'intervention_id'
        );

        // add foreign key for table `{{%intervention}}`
        $this->addForeignKey(
            '{{%fk-counselling_intake-intervention_id}}',
            '{{%counselling_intake}}',
            'intervention_id',
            '{{%intervention}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%intervention}}`
        $this->dropForeignKey(
            '{{%fk-counselling_intake-intervention_id}}',
            '{{%counselling_intake}}'
        );

        // drops index for column `intervention_id`
        $this->dropIndex(
            '{{%idx-counselling_intake-intervention_id}}',
            '{{%counselling_intake}}'
        );

        $this->dropTable('{{%counselling_intake}}');
    }
}

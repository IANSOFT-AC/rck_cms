<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%security_interview}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%intervention}}`
 */
class m210223_114206_create_security_interview_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%security_interview}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'sex' => $this->integer(),
            'unhcr_case_no' => $this->string(),
            'refugee_no' => $this->string(),
            'nationality' => $this->integer(),
            'telephone' => $this->string(),
            'dob' => $this->integer(),
            'education_level' => $this->string(),
            'place_of_birth' => $this->string(),
            'religion' => $this->string(),
            'names_of_parents' => $this->text(),
            'siblings' => $this->string(),
            'ethnicity' => $this->string(),
            'marital_status' => $this->string(),
            'dependants' => $this->text(),
            'reason_for_flight' => $this->text(),
            'flight' => $this->string(),
            'life_in_country_of_asylum' => $this->text(),
            'assessment' => $this->text(),
            'intervention_id' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `intervention_id`
        $this->createIndex(
            '{{%idx-security_interview-intervention_id}}',
            '{{%security_interview}}',
            'intervention_id'
        );

        // add foreign key for table `{{%intervention}}`
        $this->addForeignKey(
            '{{%fk-security_interview-intervention_id}}',
            '{{%security_interview}}',
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
            '{{%fk-security_interview-intervention_id}}',
            '{{%security_interview}}'
        );

        // drops index for column `intervention_id`
        $this->dropIndex(
            '{{%idx-security_interview-intervention_id}}',
            '{{%security_interview}}'
        );

        $this->dropTable('{{%security_interview}}');
    }
}

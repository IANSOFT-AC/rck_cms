<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%court_cases}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%offence}}`
 */
class m210210_065405_add_legal_counselor_column_to_court_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%court_cases}}', 'legal_officer', $this->string());
        $this->addColumn('{{%court_cases}}', 'counsellor', $this->string());
        $this->addColumn('{{%court_cases}}', 'offence_id', $this->integer());

        // creates index for column `offence_id`
        $this->createIndex(
            '{{%idx-court_cases-offence_id}}',
            '{{%court_cases}}',
            'offence_id'
        );

        // add foreign key for table `{{%offence}}`
        $this->addForeignKey(
            '{{%fk-court_cases-offence_id}}',
            '{{%court_cases}}',
            'offence_id',
            '{{%offence}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%offence}}`
        $this->dropForeignKey(
            '{{%fk-court_cases-offence_id}}',
            '{{%court_cases}}'
        );

        // drops index for column `offence_id`
        $this->dropIndex(
            '{{%idx-court_cases-offence_id}}',
            '{{%court_cases}}'
        );

        $this->dropColumn('{{%court_cases}}', 'legal_officer');
        $this->dropColumn('{{%court_cases}}', 'counsellor');
        $this->dropColumn('{{%court_cases}}', 'offence_id');
    }
}

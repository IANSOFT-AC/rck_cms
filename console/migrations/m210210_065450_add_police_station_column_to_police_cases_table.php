<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%police_cases}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%offence}}`
 */
class m210210_065450_add_police_station_column_to_police_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%police_cases}}', 'policestation', $this->string());
        $this->addColumn('{{%police_cases}}', 'offence_id', $this->integer());

        // creates index for column `offence_id`
        $this->createIndex(
            '{{%idx-police_cases-offence_id}}',
            '{{%police_cases}}',
            'offence_id'
        );

        // add foreign key for table `{{%offence}}`
        $this->addForeignKey(
            '{{%fk-police_cases-offence_id}}',
            '{{%police_cases}}',
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
            '{{%fk-police_cases-offence_id}}',
            '{{%police_cases}}'
        );

        // drops index for column `offence_id`
        $this->dropIndex(
            '{{%idx-police_cases-offence_id}}',
            '{{%police_cases}}'
        );

        $this->dropColumn('{{%police_cases}}', 'policestation');
        $this->dropColumn('{{%police_cases}}', 'offence_id');
    }
}

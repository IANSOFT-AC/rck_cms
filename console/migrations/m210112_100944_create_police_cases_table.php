<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%police_cases}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%policestation}}`
 */
class m210112_100944_create_police_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%police_cases}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'gender' => $this->string(),
            'contacts' => $this->string(),
            'age' => $this->string(),
            'police_station_id' => $this->integer(),
            'investigating_officer' => $this->string(255),
            'investigating_officer_contacts' => $this->string(100),
            'ob_number' => $this->string(),
            'ob_details' => $this->string(255),
            'offence' => $this->string()->notNull(),
            'complainant' => $this->string()->notNull(),
            'first_instance_interview' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `police_station_id`
        $this->createIndex(
            '{{%idx-police_cases-police_station_id}}',
            '{{%police_cases}}',
            'police_station_id'
        );

        // add foreign key for table `{{%policestation}}`
        $this->addForeignKey(
            '{{%fk-police_cases-police_station_id}}',
            '{{%police_cases}}',
            'police_station_id',
            '{{%policestation}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%policestation}}`
        $this->dropForeignKey(
            '{{%fk-police_cases-police_station_id}}',
            '{{%police_cases}}'
        );

        // drops index for column `police_station_id`
        $this->dropIndex(
            '{{%idx-police_cases-police_station_id}}',
            '{{%police_cases}}'
        );

        $this->dropTable('{{%police_cases}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%police_case_proceeding}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%police_cases}}`
 */
class m210122_125536_create_police_case_proceeding_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%police_case_proceeding}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'desc' => $this->text(),
            'police_case_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `police_case_id`
        $this->createIndex(
            '{{%idx-police_case_proceeding-police_case_id}}',
            '{{%police_case_proceeding}}',
            'police_case_id'
        );

        // add foreign key for table `{{%police_cases}}`
        $this->addForeignKey(
            '{{%fk-police_case_proceeding-police_case_id}}',
            '{{%police_case_proceeding}}',
            'police_case_id',
            '{{%police_cases}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%police_cases}}`
        $this->dropForeignKey(
            '{{%fk-police_case_proceeding-police_case_id}}',
            '{{%police_case_proceeding}}'
        );

        // drops index for column `police_case_id`
        $this->dropIndex(
            '{{%idx-police_case_proceeding-police_case_id}}',
            '{{%police_case_proceeding}}'
        );

        $this->dropTable('{{%police_case_proceeding}}');
    }
}

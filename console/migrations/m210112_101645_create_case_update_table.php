<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%case_update}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%police_cases}}`
 */
class m210112_101645_create_case_update_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%case_update}}', [
            'id' => $this->primaryKey(),
            'police_case_id' => $this->integer()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `police_case_id`
        $this->createIndex(
            '{{%idx-case_update-police_case_id}}',
            '{{%case_update}}',
            'police_case_id'
        );

        // add foreign key for table `{{%police_cases}}`
        $this->addForeignKey(
            '{{%fk-case_update-police_case_id}}',
            '{{%case_update}}',
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
            '{{%fk-case_update-police_case_id}}',
            '{{%case_update}}'
        );

        // drops index for column `police_case_id`
        $this->dropIndex(
            '{{%idx-case_update-police_case_id}}',
            '{{%case_update}}'
        );

        $this->dropTable('{{%case_update}}');
    }
}

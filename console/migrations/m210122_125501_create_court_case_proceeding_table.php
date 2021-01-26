<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%court_case_proceeding}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%court_cases}}`
 */
class m210122_125501_create_court_case_proceeding_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%court_case_proceeding}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'desc' => $this->text(),
            'court_case_id' => $this->integer()->notNull(),
            'case_status' => $this->string(),
            'next_court_date' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `court_case_id`
        $this->createIndex(
            '{{%idx-court_case_proceeding-court_case_id}}',
            '{{%court_case_proceeding}}',
            'court_case_id'
        );

        // add foreign key for table `{{%court_cases}}`
        $this->addForeignKey(
            '{{%fk-court_case_proceeding-court_case_id}}',
            '{{%court_case_proceeding}}',
            'court_case_id',
            '{{%court_cases}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%court_cases}}`
        $this->dropForeignKey(
            '{{%fk-court_case_proceeding-court_case_id}}',
            '{{%court_case_proceeding}}'
        );

        // drops index for column `court_case_id`
        $this->dropIndex(
            '{{%idx-court_case_proceeding-court_case_id}}',
            '{{%court_case_proceeding}}'
        );

        $this->dropTable('{{%court_case_proceeding}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%court_cases}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%refugee}}`
 */
class m210122_074328_add_refugee_id_column_to_court_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%court_cases}}', 'refugee_id', $this->integer());

        // creates index for column `refugee_id`
        $this->createIndex(
            '{{%idx-court_cases-refugee_id}}',
            '{{%court_cases}}',
            'refugee_id'
        );

        // add foreign key for table `{{%refugee}}`
        $this->addForeignKey(
            '{{%fk-court_cases-refugee_id}}',
            '{{%court_cases}}',
            'refugee_id',
            '{{%refugee}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%refugee}}`
        $this->dropForeignKey(
            '{{%fk-court_cases-refugee_id}}',
            '{{%court_cases}}'
        );

        // drops index for column `refugee_id`
        $this->dropIndex(
            '{{%idx-court_cases-refugee_id}}',
            '{{%court_cases}}'
        );

        $this->dropColumn('{{%court_cases}}', 'refugee_id');
    }
}

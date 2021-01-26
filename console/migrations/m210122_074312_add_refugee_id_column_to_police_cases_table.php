<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%police_cases}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%refugee}}`
 */
class m210122_074312_add_refugee_id_column_to_police_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%police_cases}}', 'refugee_id', $this->integer());

        // creates index for column `refugee_id`
        $this->createIndex(
            '{{%idx-police_cases-refugee_id}}',
            '{{%police_cases}}',
            'refugee_id'
        );

        // add foreign key for table `{{%refugee}}`
        $this->addForeignKey(
            '{{%fk-police_cases-refugee_id}}',
            '{{%police_cases}}',
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
            '{{%fk-police_cases-refugee_id}}',
            '{{%police_cases}}'
        );

        // drops index for column `refugee_id`
        $this->dropIndex(
            '{{%idx-police_cases-refugee_id}}',
            '{{%police_cases}}'
        );

        $this->dropColumn('{{%police_cases}}', 'refugee_id');
    }
}

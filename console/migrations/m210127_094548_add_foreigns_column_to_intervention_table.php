<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%intervention}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%court_cases}}`
 * - `{{%police_cases}}`
 */
class m210127_094548_add_foreigns_column_to_intervention_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%intervention}}', 'court_case', $this->integer());
        $this->addColumn('{{%intervention}}', 'police_case', $this->integer());

        // creates index for column `court_case`
        $this->createIndex(
            '{{%idx-intervention-court_case}}',
            '{{%intervention}}',
            'court_case'
        );

        // add foreign key for table `{{%court_cases}}`
        $this->addForeignKey(
            '{{%fk-intervention-court_case}}',
            '{{%intervention}}',
            'court_case',
            '{{%court_cases}}',
            'id',
            'CASCADE'
        );

        // creates index for column `police_case`
        $this->createIndex(
            '{{%idx-intervention-police_case}}',
            '{{%intervention}}',
            'police_case'
        );

        // add foreign key for table `{{%police_cases}}`
        $this->addForeignKey(
            '{{%fk-intervention-police_case}}',
            '{{%intervention}}',
            'police_case',
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
        // drops foreign key for table `{{%court_cases}}`
        $this->dropForeignKey(
            '{{%fk-intervention-court_case}}',
            '{{%intervention}}'
        );

        // drops index for column `court_case`
        $this->dropIndex(
            '{{%idx-intervention-court_case}}',
            '{{%intervention}}'
        );

        // drops foreign key for table `{{%police_cases}}`
        $this->dropForeignKey(
            '{{%fk-intervention-police_case}}',
            '{{%intervention}}'
        );

        // drops index for column `police_case`
        $this->dropIndex(
            '{{%idx-intervention-police_case}}',
            '{{%intervention}}'
        );

        $this->dropColumn('{{%intervention}}', 'court_case');
        $this->dropColumn('{{%intervention}}', 'police_case');
    }
}

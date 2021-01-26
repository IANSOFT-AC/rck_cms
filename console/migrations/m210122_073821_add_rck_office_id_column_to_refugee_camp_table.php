<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%refugee_camp}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%rck_offices}}`
 */
class m210122_073821_add_rck_office_id_column_to_refugee_camp_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%refugee_camp}}', 'rck_office', $this->integer()->notNull());

        // creates index for column `rck_office`
        $this->createIndex(
            '{{%idx-refugee_camp-rck_office}}',
            '{{%refugee_camp}}',
            'rck_office'
        );

        // add foreign key for table `{{%rck_offices}}`
        $this->addForeignKey(
            '{{%fk-refugee_camp-rck_office}}',
            '{{%refugee_camp}}',
            'rck_office',
            '{{%rck_offices}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%rck_offices}}`
        $this->dropForeignKey(
            '{{%fk-refugee_camp-rck_office}}',
            '{{%refugee_camp}}'
        );

        // drops index for column `rck_office`
        $this->dropIndex(
            '{{%idx-refugee_camp-rck_office}}',
            '{{%refugee_camp}}'
        );

        $this->dropColumn('{{%refugee_camp}}', 'rck_office');
    }
}

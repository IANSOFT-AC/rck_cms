<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%training}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%rck_offices}}`
 */
class m210421_101210_add_rck_office_column_to_training_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%training}}', 'rck_office_id', $this->integer());

        // creates index for column `rck_office_id`
        $this->createIndex(
            '{{%idx-training-rck_office_id}}',
            '{{%training}}',
            'rck_office_id'
        );

        // add foreign key for table `{{%rck_offices}}`
        $this->addForeignKey(
            '{{%fk-training-rck_office_id}}',
            '{{%training}}',
            'rck_office_id',
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
            '{{%fk-training-rck_office_id}}',
            '{{%training}}'
        );

        // drops index for column `rck_office_id`
        $this->dropIndex(
            '{{%idx-training-rck_office_id}}',
            '{{%training}}'
        );

        $this->dropColumn('{{%training}}', 'rck_office_id');
    }
}

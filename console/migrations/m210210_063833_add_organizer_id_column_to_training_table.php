<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%training}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%organizer}}`
 */
class m210210_063833_add_organizer_id_column_to_training_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%training}}', 'organizer_id', $this->integer());

        // creates index for column `organizer_id`
        $this->createIndex(
            '{{%idx-training-organizer_id}}',
            '{{%training}}',
            'organizer_id'
        );

        // add foreign key for table `{{%organizer}}`
        $this->addForeignKey(
            '{{%fk-training-organizer_id}}',
            '{{%training}}',
            'organizer_id',
            '{{%organizer}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%organizer}}`
        $this->dropForeignKey(
            '{{%fk-training-organizer_id}}',
            '{{%training}}'
        );

        // drops index for column `organizer_id`
        $this->dropIndex(
            '{{%idx-training-organizer_id}}',
            '{{%training}}'
        );

        $this->dropColumn('{{%training}}', 'organizer_id');
    }
}

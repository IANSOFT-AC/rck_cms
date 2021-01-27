<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%intervention_attachment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%intervention_upload}}`
 */
class m210127_100916_add_path_column_to_intervention_attachment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%intervention_attachment}}', 'doc_path', $this->string());
        $this->addColumn('{{%intervention_attachment}}', 'upload_id', $this->integer());

        // creates index for column `upload_id`
        $this->createIndex(
            '{{%idx-intervention_attachment-upload_id}}',
            '{{%intervention_attachment}}',
            'upload_id'
        );

        // add foreign key for table `{{%intervention_upload}}`
        $this->addForeignKey(
            '{{%fk-intervention_attachment-upload_id}}',
            '{{%intervention_attachment}}',
            'upload_id',
            '{{%intervention_upload}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%intervention_upload}}`
        $this->dropForeignKey(
            '{{%fk-intervention_attachment-upload_id}}',
            '{{%intervention_attachment}}'
        );

        // drops index for column `upload_id`
        $this->dropIndex(
            '{{%idx-intervention_attachment-upload_id}}',
            '{{%intervention_attachment}}'
        );

        $this->dropColumn('{{%intervention_attachment}}', 'doc_path');
        $this->dropColumn('{{%intervention_attachment}}', 'upload_id');
    }
}

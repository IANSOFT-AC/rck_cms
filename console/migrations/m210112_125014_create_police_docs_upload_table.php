<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%police_docs_upload}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%police_cases}}`
 * - `{{%police_uploads}}`
 */
class m210112_125014_create_police_docs_upload_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%police_docs_upload}}', [
            'id' => $this->primaryKey(),
            'doc_path' => $this->text(),
            'filename' => $this->text(),
            'police_case_id' => $this->integer()->notNull(),
            'police_uploads_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `police_case_id`
        $this->createIndex(
            '{{%idx-police_docs_upload-police_case_id}}',
            '{{%police_docs_upload}}',
            'police_case_id'
        );

        // add foreign key for table `{{%police_cases}}`
        $this->addForeignKey(
            '{{%fk-police_docs_upload-police_case_id}}',
            '{{%police_docs_upload}}',
            'police_case_id',
            '{{%police_cases}}',
            'id',
            'CASCADE'
        );

        // creates index for column `police_uploads_id`
        $this->createIndex(
            '{{%idx-police_docs_upload-police_uploads_id}}',
            '{{%police_docs_upload}}',
            'police_uploads_id'
        );

        // add foreign key for table `{{%police_uploads}}`
        $this->addForeignKey(
            '{{%fk-police_docs_upload-police_uploads_id}}',
            '{{%police_docs_upload}}',
            'police_uploads_id',
            '{{%police_uploads}}',
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
            '{{%fk-police_docs_upload-police_case_id}}',
            '{{%police_docs_upload}}'
        );

        // drops index for column `police_case_id`
        $this->dropIndex(
            '{{%idx-police_docs_upload-police_case_id}}',
            '{{%police_docs_upload}}'
        );

        // drops foreign key for table `{{%police_uploads}}`
        $this->dropForeignKey(
            '{{%fk-police_docs_upload-police_uploads_id}}',
            '{{%police_docs_upload}}'
        );

        // drops index for column `police_uploads_id`
        $this->dropIndex(
            '{{%idx-police_docs_upload-police_uploads_id}}',
            '{{%police_docs_upload}}'
        );

        $this->dropTable('{{%police_docs_upload}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%refugee_docs_upload}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%refugee}}`
 * - `{{%refugee_uploads}}`
 */
class m210121_093059_create_refugee_docs_upload_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%refugee_docs_upload}}', [
            'id' => $this->primaryKey(),
            'doc_path' => $this->text(),
            'filename' => $this->string(),
            'model_id' => $this->integer(),
            'upload_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `model_id`
        $this->createIndex(
            '{{%idx-refugee_docs_upload-model_id}}',
            '{{%refugee_docs_upload}}',
            'model_id'
        );

        // add foreign key for table `{{%refugee}}`
        $this->addForeignKey(
            '{{%fk-refugee_docs_upload-model_id}}',
            '{{%refugee_docs_upload}}',
            'model_id',
            '{{%refugee}}',
            'id',
            'CASCADE'
        );

        // creates index for column `upload_id`
        $this->createIndex(
            '{{%idx-refugee_docs_upload-upload_id}}',
            '{{%refugee_docs_upload}}',
            'upload_id'
        );

        // add foreign key for table `{{%refugee_uploads}}`
        $this->addForeignKey(
            '{{%fk-refugee_docs_upload-upload_id}}',
            '{{%refugee_docs_upload}}',
            'upload_id',
            '{{%refugee_uploads}}',
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
            '{{%fk-refugee_docs_upload-model_id}}',
            '{{%refugee_docs_upload}}'
        );

        // drops index for column `model_id`
        $this->dropIndex(
            '{{%idx-refugee_docs_upload-model_id}}',
            '{{%refugee_docs_upload}}'
        );

        // drops foreign key for table `{{%refugee_uploads}}`
        $this->dropForeignKey(
            '{{%fk-refugee_docs_upload-upload_id}}',
            '{{%refugee_docs_upload}}'
        );

        // drops index for column `upload_id`
        $this->dropIndex(
            '{{%idx-refugee_docs_upload-upload_id}}',
            '{{%refugee_docs_upload}}'
        );

        $this->dropTable('{{%refugee_docs_upload}}');
    }
}

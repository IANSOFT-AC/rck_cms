<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%court_docs_uploads}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%court_cases}}`
 * - `{{%court_uploads}}`
 */
class m210112_130800_create_court_docs_uploads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%court_docs_uploads}}', [
            'id' => $this->primaryKey(),
            'doc_path' => $this->text(),
            'court_case_id' => $this->integer()->notNull(),
            'court_uploads_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `court_case_id`
        $this->createIndex(
            '{{%idx-court_docs_uploads-court_case_id}}',
            '{{%court_docs_uploads}}',
            'court_case_id'
        );

        // add foreign key for table `{{%court_cases}}`
        $this->addForeignKey(
            '{{%fk-court_docs_uploads-court_case_id}}',
            '{{%court_docs_uploads}}',
            'court_case_id',
            '{{%court_cases}}',
            'id',
            'CASCADE'
        );

        // creates index for column `court_uploads_id`
        $this->createIndex(
            '{{%idx-court_docs_uploads-court_uploads_id}}',
            '{{%court_docs_uploads}}',
            'court_uploads_id'
        );

        // add foreign key for table `{{%court_uploads}}`
        $this->addForeignKey(
            '{{%fk-court_docs_uploads-court_uploads_id}}',
            '{{%court_docs_uploads}}',
            'court_uploads_id',
            '{{%court_uploads}}',
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
            '{{%fk-court_docs_uploads-court_case_id}}',
            '{{%court_docs_uploads}}'
        );

        // drops index for column `court_case_id`
        $this->dropIndex(
            '{{%idx-court_docs_uploads-court_case_id}}',
            '{{%court_docs_uploads}}'
        );

        // drops foreign key for table `{{%court_uploads}}`
        $this->dropForeignKey(
            '{{%fk-court_docs_uploads-court_uploads_id}}',
            '{{%court_docs_uploads}}'
        );

        // drops index for column `court_uploads_id`
        $this->dropIndex(
            '{{%idx-court_docs_uploads-court_uploads_id}}',
            '{{%court_docs_uploads}}'
        );

        $this->dropTable('{{%court_docs_uploads}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%court_docs_uploads}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%court_case_subcategory}}`
 */
class m210210_124625_add_subcat_id_column_to_court_docs_uploads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%court_docs_uploads}}', 'subcat_id', $this->integer());

        // creates index for column `subcat_id`
        $this->createIndex(
            '{{%idx-court_docs_uploads-subcat_id}}',
            '{{%court_docs_uploads}}',
            'subcat_id'
        );

        // add foreign key for table `{{%court_case_subcategory}}`
        $this->addForeignKey(
            '{{%fk-court_docs_uploads-subcat_id}}',
            '{{%court_docs_uploads}}',
            'subcat_id',
            '{{%court_case_subcategory}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%court_case_subcategory}}`
        $this->dropForeignKey(
            '{{%fk-court_docs_uploads-subcat_id}}',
            '{{%court_docs_uploads}}'
        );

        // drops index for column `subcat_id`
        $this->dropIndex(
            '{{%idx-court_docs_uploads-subcat_id}}',
            '{{%court_docs_uploads}}'
        );

        $this->dropColumn('{{%court_docs_uploads}}', 'subcat_id');
    }
}

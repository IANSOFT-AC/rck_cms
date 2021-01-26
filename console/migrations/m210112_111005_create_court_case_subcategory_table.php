<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%court_case_subcategory}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%court_case_category}}`
 */
class m210112_111005_create_court_case_subcategory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%court_case_subcategory}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'category_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-court_case_subcategory-category_id}}',
            '{{%court_case_subcategory}}',
            'category_id'
        );

        // add foreign key for table `{{%court_case_category}}`
        $this->addForeignKey(
            '{{%fk-court_case_subcategory-category_id}}',
            '{{%court_case_subcategory}}',
            'category_id',
            '{{%court_case_category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%court_case_category}}`
        $this->dropForeignKey(
            '{{%fk-court_case_subcategory-category_id}}',
            '{{%court_case_subcategory}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-court_case_subcategory-category_id}}',
            '{{%court_case_subcategory}}'
        );

        $this->dropTable('{{%court_case_subcategory}}');
    }
}

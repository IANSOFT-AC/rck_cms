<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%court_cases}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%magistrate}}`
 * - `{{%court_proceeding}}`
 * - `{{%lawyer}}`
 * - `{{%counsellors}}`
 * - `{{%court_case_category}}`
 * - `{{%court_case_subcategory}}`
 */
class m210112_125451_create_court_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%court_cases}}', [
            'id' => $this->primaryKey(),
            'no_of_refugees' => $this->integer(),
            'name' => $this->string(),
            'offence' => $this->string(),
            'first_instance_interview' => $this->text(),
            'magistrate' => $this->string(),
            'court_proceeding_id' => $this->integer(),
            'date_of_arrainment' => $this->integer(),
            'case_status' => $this->string(),
            'next_court_date' => $this->integer(),
            'legal_officer_id' => $this->integer(),
            'counsellor_id' => $this->integer(),
            'court_case_category_id' => $this->integer(),
            'court_case_subcategory_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `legal_officer_id`
        $this->createIndex(
            '{{%idx-court_cases-legal_officer_id}}',
            '{{%court_cases}}',
            'legal_officer_id'
        );

        // add foreign key for table `{{%lawyer}}`
        $this->addForeignKey(
            '{{%fk-court_cases-legal_officer_id}}',
            '{{%court_cases}}',
            'legal_officer_id',
            '{{%lawyer}}',
            'id',
            'CASCADE'
        );

        // creates index for column `counsellor_id`
        $this->createIndex(
            '{{%idx-court_cases-counsellor_id}}',
            '{{%court_cases}}',
            'counsellor_id'
        );

        // add foreign key for table `{{%counsellors}}`
        $this->addForeignKey(
            '{{%fk-court_cases-counsellor_id}}',
            '{{%court_cases}}',
            'counsellor_id',
            '{{%counsellors}}',
            'id',
            'CASCADE'
        );

        // creates index for column `court_case_category_id`
        $this->createIndex(
            '{{%idx-court_cases-court_case_category_id}}',
            '{{%court_cases}}',
            'court_case_category_id'
        );

        // add foreign key for table `{{%court_case_category}}`
        $this->addForeignKey(
            '{{%fk-court_cases-court_case_category_id}}',
            '{{%court_cases}}',
            'court_case_category_id',
            '{{%court_case_category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `court_case_subcategory_id`
        $this->createIndex(
            '{{%idx-court_cases-court_case_subcategory_id}}',
            '{{%court_cases}}',
            'court_case_subcategory_id'
        );

        // add foreign key for table `{{%court_case_subcategory}}`
        $this->addForeignKey(
            '{{%fk-court_cases-court_case_subcategory_id}}',
            '{{%court_cases}}',
            'court_case_subcategory_id',
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
        // drops foreign key for table `{{%magistrate}}`
        $this->dropForeignKey(
            '{{%fk-court_cases-magistrate_id}}',
            '{{%court_cases}}'
        );

        // drops index for column `magistrate_id`
        $this->dropIndex(
            '{{%idx-court_cases-magistrate_id}}',
            '{{%court_cases}}'
        );

        // drops foreign key for table `{{%court_proceeding}}`
        $this->dropForeignKey(
            '{{%fk-court_cases-court_proceeding_id}}',
            '{{%court_cases}}'
        );

        // drops index for column `court_proceeding_id`
        $this->dropIndex(
            '{{%idx-court_cases-court_proceeding_id}}',
            '{{%court_cases}}'
        );

        // drops foreign key for table `{{%lawyer}}`
        $this->dropForeignKey(
            '{{%fk-court_cases-legal_officer_id}}',
            '{{%court_cases}}'
        );

        // drops index for column `legal_officer_id`
        $this->dropIndex(
            '{{%idx-court_cases-legal_officer_id}}',
            '{{%court_cases}}'
        );

        // drops foreign key for table `{{%counsellors}}`
        $this->dropForeignKey(
            '{{%fk-court_cases-counsellor_id}}',
            '{{%court_cases}}'
        );

        // drops index for column `counsellor_id`
        $this->dropIndex(
            '{{%idx-court_cases-counsellor_id}}',
            '{{%court_cases}}'
        );

        // drops foreign key for table `{{%court_case_category}}`
        $this->dropForeignKey(
            '{{%fk-court_cases-court_case_category_id}}',
            '{{%court_cases}}'
        );

        // drops index for column `court_case_category_id`
        $this->dropIndex(
            '{{%idx-court_cases-court_case_category_id}}',
            '{{%court_cases}}'
        );

        // drops foreign key for table `{{%court_case_subcategory}}`
        $this->dropForeignKey(
            '{{%fk-court_cases-court_case_subcategory_id}}',
            '{{%court_cases}}'
        );

        // drops index for column `court_case_subcategory_id`
        $this->dropIndex(
            '{{%idx-court_cases-court_case_subcategory_id}}',
            '{{%court_cases}}'
        );

        $this->dropTable('{{%court_cases}}');
    }
}

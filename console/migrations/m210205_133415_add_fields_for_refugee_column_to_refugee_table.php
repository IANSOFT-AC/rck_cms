<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%refugee}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%source_of_info}}`
 * - `{{%source_of_income}}`
 * - `{{%form_of_torture}}`
 * - `{{%disability_type}}`
 */
class m210205_133415_add_fields_for_refugee_column_to_refugee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%refugee}}', 'source_of_info_id', $this->integer());
        $this->addColumn('{{%refugee}}', 'source_of_income_id', $this->string());
        $this->addColumn('{{%refugee}}', 'form_of_torture_id', $this->string());
        $this->addColumn('{{%refugee}}', 'disability_type_id', $this->integer());

        // creates index for column `source_of_info_id`
        $this->createIndex(
            '{{%idx-refugee-source_of_info_id}}',
            '{{%refugee}}',
            'source_of_info_id'
        );

        // add foreign key for table `{{%source_of_info}}`
        $this->addForeignKey(
            '{{%fk-refugee-source_of_info_id}}',
            '{{%refugee}}',
            'source_of_info_id',
            '{{%source_of_info}}',
            'id',
            'CASCADE'
        );

        // // creates index for column `source_of_income_id`
        // $this->createIndex(
        //     '{{%idx-refugee-source_of_income_id}}',
        //     '{{%refugee}}',
        //     'source_of_income_id'
        // );

        // // add foreign key for table `{{%source_of_income}}`
        // $this->addForeignKey(
        //     '{{%fk-refugee-source_of_income_id}}',
        //     '{{%refugee}}',
        //     'source_of_income_id',
        //     '{{%source_of_income}}',
        //     'id',
        //     'CASCADE'
        // );

        // // creates index for column `form_of_torture_id`
        // $this->createIndex(
        //     '{{%idx-refugee-form_of_torture_id}}',
        //     '{{%refugee}}',
        //     'form_of_torture_id'
        // );

        // // add foreign key for table `{{%form_of_torture}}`
        // $this->addForeignKey(
        //     '{{%fk-refugee-form_of_torture_id}}',
        //     '{{%refugee}}',
        //     'form_of_torture_id',
        //     '{{%form_of_torture}}',
        //     'id',
        //     'CASCADE'
        // );

        // creates index for column `disability_type_id`
        $this->createIndex(
            '{{%idx-refugee-disability_type_id}}',
            '{{%refugee}}',
            'disability_type_id'
        );

        // add foreign key for table `{{%disability_type}}`
        $this->addForeignKey(
            '{{%fk-refugee-disability_type_id}}',
            '{{%refugee}}',
            'disability_type_id',
            '{{%disability_type}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%source_of_info}}`
        $this->dropForeignKey(
            '{{%fk-refugee-source_of_info_id}}',
            '{{%refugee}}'
        );

        // drops index for column `source_of_info_id`
        $this->dropIndex(
            '{{%idx-refugee-source_of_info_id}}',
            '{{%refugee}}'
        );

        // drops foreign key for table `{{%source_of_income}}`
        $this->dropForeignKey(
            '{{%fk-refugee-source_of_income_id}}',
            '{{%refugee}}'
        );

        // drops index for column `source_of_income_id`
        $this->dropIndex(
            '{{%idx-refugee-source_of_income_id}}',
            '{{%refugee}}'
        );

        // drops foreign key for table `{{%form_of_torture}}`
        $this->dropForeignKey(
            '{{%fk-refugee-form_of_torture_id}}',
            '{{%refugee}}'
        );

        // drops index for column `form_of_torture_id`
        $this->dropIndex(
            '{{%idx-refugee-form_of_torture_id}}',
            '{{%refugee}}'
        );

        // drops foreign key for table `{{%disability_type}}`
        $this->dropForeignKey(
            '{{%fk-refugee-disability_type_id}}',
            '{{%refugee}}'
        );

        // drops index for column `disability_type_id`
        $this->dropIndex(
            '{{%idx-refugee-disability_type_id}}',
            '{{%refugee}}'
        );

        $this->dropColumn('{{%refugee}}', 'source_of_info_id');
        $this->dropColumn('{{%refugee}}', 'source_of_income_id');
        $this->dropColumn('{{%refugee}}', 'form_of_torture_id');
        $this->dropColumn('{{%refugee}}', 'disability_type_id');
    }
}

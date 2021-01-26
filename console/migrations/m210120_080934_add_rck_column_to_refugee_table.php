<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%refugee}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%rck_offices}}`
 * - `{{%mode_of_entry}}`
 */
class m210120_080934_add_rck_column_to_refugee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%refugee}}', 'nhcr_case_no', $this->string());
        $this->addColumn('{{%refugee}}', 'return_refugee', $this->integer());
        $this->addColumn('{{%refugee}}', 'rck_no', $this->string());
        $this->addColumn('{{%refugee}}', 'rck_office_id', $this->integer()->notNull());
        $this->addColumn('{{%refugee}}', 'arrival_date', $this->integer());
        $this->addColumn('{{%refugee}}', 'has_disability', $this->integer());
        $this->addColumn('{{%refugee}}', 'disability_desc', $this->text());
        $this->addColumn('{{%refugee}}', 'asylum_status', $this->integer());
        $this->addColumn('{{%refugee}}', 'rsd_appointment_date', $this->integer());
        $this->addColumn('{{%refugee}}', 'reason_for_rsd_appointment', $this->text());
        $this->addColumn('{{%refugee}}', 'source_of_info_abt_rck', $this->text());
        $this->addColumn('{{%refugee}}', 'mode_of_entry_id', $this->integer()->notNull());
        $this->addColumn('{{%refugee}}', 'victim_of_turture', $this->integer());
        $this->addColumn('{{%refugee}}', 'form_of_torture', $this->text());
        $this->addColumn('{{%refugee}}', 'source_of_income', $this->string());
        $this->addColumn('{{%refugee}}', 'job_details', $this->text());
        $this->addColumn('{{%refugee}}', 'has_work_permit', $this->integer());
        $this->addColumn('{{%refugee}}', 'arrested_due_to_lack_of_work_permit', $this->integer());
        $this->addColumn('{{%refugee}}', 'interested_in_work_permit', $this->integer());
        $this->addColumn('{{%refugee}}', 'interested_in_citizenship', $this->integer());

        // creates index for column `rck_office_id`
        $this->createIndex(
            '{{%idx-refugee-rck_office_id}}',
            '{{%refugee}}',
            'rck_office_id'
        );

        // add foreign key for table `{{%rck_offices}}`
        $this->addForeignKey(
            '{{%fk-refugee-rck_office_id}}',
            '{{%refugee}}',
            'rck_office_id',
            '{{%rck_offices}}',
            'id',
            'CASCADE'
        );

        // creates index for column `mode_of_entry_id`
        $this->createIndex(
            '{{%idx-refugee-mode_of_entry_id}}',
            '{{%refugee}}',
            'mode_of_entry_id'
        );

        // add foreign key for table `{{%mode_of_entry}}`
        $this->addForeignKey(
            '{{%fk-refugee-mode_of_entry_id}}',
            '{{%refugee}}',
            'mode_of_entry_id',
            '{{%mode_of_entry}}',
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
            '{{%fk-refugee-rck_office_id}}',
            '{{%refugee}}'
        );

        // drops index for column `rck_office_id`
        $this->dropIndex(
            '{{%idx-refugee-rck_office_id}}',
            '{{%refugee}}'
        );

        // drops foreign key for table `{{%mode_of_entry}}`
        $this->dropForeignKey(
            '{{%fk-refugee-mode_of_entry_id}}',
            '{{%refugee}}'
        );

        // drops index for column `mode_of_entry_id`
        $this->dropIndex(
            '{{%idx-refugee-mode_of_entry_id}}',
            '{{%refugee}}'
        );

        $this->dropColumn('{{%refugee}}', 'nhcr_case_no');
        $this->dropColumn('{{%refugee}}', 'return_refugee');
        $this->dropColumn('{{%refugee}}', 'rck_no');
        $this->dropColumn('{{%refugee}}', 'rck_office_id');
        $this->dropColumn('{{%refugee}}', 'arrival_date');
        $this->dropColumn('{{%refugee}}', 'has_disability');
        $this->dropColumn('{{%refugee}}', 'disability_desc');
        $this->dropColumn('{{%refugee}}', 'asylum_status');
        $this->dropColumn('{{%refugee}}', 'rsd_appointment_date');
        $this->dropColumn('{{%refugee}}', 'reason_for_rsd_appointment');
        $this->dropColumn('{{%refugee}}', 'source_of_info_abt_rck');
        $this->dropColumn('{{%refugee}}', 'mode_of_entry_id');
        $this->dropColumn('{{%refugee}}', 'victim_of_turture');
        $this->dropColumn('{{%refugee}}', 'form_of_torture');
        $this->dropColumn('{{%refugee}}', 'source_of_income');
        $this->dropColumn('{{%refugee}}', 'job_details');
        $this->dropColumn('{{%refugee}}', 'has_work_permit');
        $this->dropColumn('{{%refugee}}', 'arrested_due_to_lack_of_work_permit');
        $this->dropColumn('{{%refugee}}', 'interested_in_work_permit');
        $this->dropColumn('{{%refugee}}', 'interested_in_citizenship');
    }
}

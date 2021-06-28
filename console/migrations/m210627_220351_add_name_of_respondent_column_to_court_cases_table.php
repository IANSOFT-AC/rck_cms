<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%court_cases}}`.
 */
class m210627_220351_add_name_of_respondent_column_to_court_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%court_cases}}', 'name_of_respondent', $this->string(100));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%court_cases}}', 'name_of_respondent');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%court_cases}}`.
 */
class m210627_204047_add_gender_column_to_court_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%court_cases}}', 'gender', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%court_cases}}', 'gender');
    }
}

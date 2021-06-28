<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%court_cases}}`.
 */
class m210627_211408_add_asylum_status_column_to_court_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%court_cases}}', 'asylum_status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%court_cases}}', 'asylum_status');
    }
}

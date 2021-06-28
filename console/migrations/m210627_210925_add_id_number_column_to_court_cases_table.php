<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%court_cases}}`.
 */
class m210627_210925_add_id_number_column_to_court_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%court_cases}}', 'id_number', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%court_cases}}', 'id_number');
    }
}

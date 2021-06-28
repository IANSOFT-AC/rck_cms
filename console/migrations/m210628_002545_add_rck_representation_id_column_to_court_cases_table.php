<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%court_cases}}`.
 */
class m210628_002545_add_rck_representation_id_column_to_court_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%court_cases}}', 'rck_representation_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%court_cases}}', 'rck_representation_id');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%police_case_proceeding}}`.
 */
class m210301_083753_add_date_column_to_police_case_proceeding_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%police_case_proceeding}}', 'date', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%police_case_proceeding}}', 'date');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%counseling}}`.
 */
class m210302_093358_add_next_appointment_date_column_to_counseling_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%counseling}}', 'next_appointment_date', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%counseling}}', 'next_appointment_date');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%counselling_intake}}`.
 */
class m210302_092844_add_date_of_referal_column_to_counselling_intake_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%counselling_intake}}', 'date_of_referal', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%counselling_intake}}', 'date_of_referal');
    }
}

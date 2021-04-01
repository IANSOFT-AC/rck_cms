<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%police_cases}}`.
 */
class m210401_081503_add_offence_type_column_to_police_cases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%police_cases}}', 'offence_type', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%police_cases}}', 'offence_type');
    }
}

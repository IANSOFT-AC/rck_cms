<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%intervention}}`.
 */
class m210201_072236_add_counseling_intake_column_to_intervention_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%intervention}}', 'counseling_intake_form', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%intervention}}', 'counseling_intake_form');
    }
}

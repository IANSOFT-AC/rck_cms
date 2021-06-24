<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%nature_of_sentence}}`.
 */
class m210622_091202_add_fine_amount_column_to_nature_of_sentence_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%nature_of_sentence}}', 'fine_amount', $this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%nature_of_sentence}}', 'fine_amount');
    }
}

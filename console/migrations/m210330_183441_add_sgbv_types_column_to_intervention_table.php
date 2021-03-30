<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%intervention}}`.
 */
class m210330_183441_add_sgbv_types_column_to_intervention_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%intervention}}', 'sgbv', $this->string());
        $this->addColumn('{{%intervention}}', 'referal_file', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%intervention}}', 'sgbv');
        $this->dropColumn('{{%intervention}}', 'referal_file');
    }
}

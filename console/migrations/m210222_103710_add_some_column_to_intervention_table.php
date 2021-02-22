<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%intervention}}`.
 */
class m210222_103710_add_some_column_to_intervention_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%intervention}}', 'agency_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%intervention}}', 'agency_id');
    }
}

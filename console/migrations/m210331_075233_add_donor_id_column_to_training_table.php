<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%training}}`.
 */
class m210331_075233_add_donor_id_column_to_training_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%training}}', 'donor_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%training}}', 'donor_id');
    }
}

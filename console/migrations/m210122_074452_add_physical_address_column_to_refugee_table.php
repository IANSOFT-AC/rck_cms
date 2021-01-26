<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%refugee}}`.
 */
class m210122_074452_add_physical_address_column_to_refugee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%refugee}}', 'physical_address', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%refugee}}', 'physical_address');
    }
}

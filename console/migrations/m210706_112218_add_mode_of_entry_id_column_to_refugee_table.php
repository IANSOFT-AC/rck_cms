<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%refugee}}`.
 */
class m210706_112218_add_mode_of_entry_id_column_to_refugee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%refugee}}', 'mode_of_entry_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%refugee}}', 'mode_of_entry_id');
    }
}

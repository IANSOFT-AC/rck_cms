<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%refugee}}`.
 */
class m210212_073339_add_some_column_to_refugee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%refugee}}', 'languages', $this->string());
        $this->addColumn('{{%refugee}}', 'interpreter', $this->boolean());
        $this->addColumn('{{%refugee}}', 'dependants', $this->integer());
        $this->addColumn('{{%refugee}}', 'old_rck', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%refugee}}', 'languages');
        $this->dropColumn('{{%refugee}}', 'interpreter');
        $this->dropColumn('{{%refugee}}', 'dependants');
        $this->dropColumn('{{%refugee}}', 'old_rck');
    }
}

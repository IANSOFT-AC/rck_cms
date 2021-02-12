<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%refugee}}`.
 */
class m210212_082701_add_some_column_to_refugee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%refugee}}', 'custom_language', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%refugee}}', 'custom_language');
    }
}

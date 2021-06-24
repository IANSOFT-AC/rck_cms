<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%court}}`.
 */
class m210622_100052_add_updated_by_column_to_court_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%court}}', 'updated_by', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%court}}', 'updated_by');
    }
}

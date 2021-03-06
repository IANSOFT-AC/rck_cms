<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%counseling}}`.
 */
class m210305_115748_add_status_column_to_counseling_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%counseling}}', 'case_status', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%counseling}}', 'case_status');
    }
}

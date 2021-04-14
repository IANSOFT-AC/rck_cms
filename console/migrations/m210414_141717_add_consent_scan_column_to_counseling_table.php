<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%counseling}}`.
 */
class m210414_141717_add_consent_scan_column_to_counseling_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%counseling}}', 'consent_scan', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%counseling}}', 'consent_scan');
    }
}

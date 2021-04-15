<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%intervention}}`.
 */
class m210415_071810_add_consent_scan_column_to_intervention_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%intervention}}', 'consent_scan', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%intervention}}', 'consent_scan');
    }
}

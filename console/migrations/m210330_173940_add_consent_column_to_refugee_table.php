<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%refugee}}`.
 */
class m210330_173940_add_consent_column_to_refugee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%refugee}}', 'consent', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%refugee}}', 'consent');
    }
}

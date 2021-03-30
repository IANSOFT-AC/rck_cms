<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%counseling}}`.
 */
class m210330_174018_add_consent_column_to_counseling_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%counseling}}', 'consent', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%counseling}}', 'consent');
    }
}

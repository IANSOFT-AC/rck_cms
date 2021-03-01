<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%counsellors}}`.
 */
class m210301_104501_add_email_phone_column_to_counsellors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%counsellors}}', 'email', $this->string());
        $this->addColumn('{{%counsellors}}', 'phone', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%counsellors}}', 'email');
        $this->dropColumn('{{%counsellors}}', 'phone');
    }
}

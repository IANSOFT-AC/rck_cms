<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%rck_offices}}`.
 */
class m210208_092811_add_code_column_to_rck_offices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%rck_offices}}', 'code', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%rck_offices}}', 'code');
    }
}

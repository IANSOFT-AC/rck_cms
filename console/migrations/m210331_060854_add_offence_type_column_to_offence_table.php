<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%offence}}`.
 */
class m210331_060854_add_offence_type_column_to_offence_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%offence}}', 'offence_type', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%offence}}', 'offence_type');
    }
}

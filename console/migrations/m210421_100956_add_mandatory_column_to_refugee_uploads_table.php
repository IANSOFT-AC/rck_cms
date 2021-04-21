<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%refugee_uploads}}`.
 */
class m210421_100956_add_mandatory_column_to_refugee_uploads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%refugee_uploads}}', 'mandatory', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%refugee_uploads}}', 'mandatory');
    }
}

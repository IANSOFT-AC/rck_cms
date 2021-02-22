<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%intervention}}`.
 */
class m210222_092017_add_some_column_to_intervention_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%intervention}}', 'intervention_details', $this->text());
        $this->addColumn('{{%intervention}}', 'office_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%intervention}}', 'intervention_details');
        $this->dropColumn('{{%intervention}}', 'office_id');
    }
}

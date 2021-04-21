<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%intervention}}`.
 */
class m210421_102239_add_legal_representation_column_to_intervention_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%intervention}}', 'legal_representation_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%intervention}}', 'legal_representation_id');
    }
}

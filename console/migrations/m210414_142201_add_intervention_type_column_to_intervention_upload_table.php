<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%intervention_upload}}`.
 */
class m210414_142201_add_intervention_type_column_to_intervention_upload_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%intervention_upload}}', 'intervention_type', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%intervention_upload}}', 'intervention_type');
    }
}

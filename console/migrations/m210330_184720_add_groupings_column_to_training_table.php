<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%training}}`.
 */
class m210330_184720_add_groupings_column_to_training_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%training}}', '0_9', $this->string());
        $this->addColumn('{{%training}}', '10_19', $this->string());
        $this->addColumn('{{%training}}', '20_24', $this->string());
        $this->addColumn('{{%training}}', '25_59', $this->string());
        $this->addColumn('{{%training}}', '60+', $this->string());
        $this->addColumn('{{%training}}', 'boys', $this->string());
        $this->addColumn('{{%training}}', 'girls', $this->string());
        $this->addColumn('{{%training}}', 'men', $this->string());
        $this->addColumn('{{%training}}', 'women', $this->string());
        $this->addColumn('{{%training}}', 'type', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%training}}', '0_9');
        $this->dropColumn('{{%training}}', '10_19');
        $this->dropColumn('{{%training}}', '20_24');
        $this->dropColumn('{{%training}}', '25_59');
        $this->dropColumn('{{%training}}', '60+');
        $this->dropColumn('{{%training}}', 'boys');
        $this->dropColumn('{{%training}}', 'girls');
        $this->dropColumn('{{%training}}', 'men');
        $this->dropColumn('{{%training}}', 'women');
        $this->dropColumn('{{%training}}', 'type');
    }
}

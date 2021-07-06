<?php

use yii\db\Migration;

/**
 * Class m210706_110705_alter_mode_of_entry_id_column_on_refugee_table
 */
class m210706_110705_alter_mode_of_entry_id_column_on_refugee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-refugee-mode_of_entry_id','refugee','mode_of_entry_id');
        $this->dropIndex('idx-refugee-mode_of_entry_id','refugee','mode_of_entry_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210706_110705_alter_mode_of_entry_id_column_on_refugee_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210706_110705_alter_mode_of_entry_id_column_on_refugee_table cannot be reverted.\n";

        return false;
    }
    */
}

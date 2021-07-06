<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%mode_of_entry_id_column_on_refugee}}`.
 */
class m210706_111803_drop_mode_of_entry_id_column_on_refugee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('refugee','mode_of_entry_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return 1;
        $this->createTable('{{%mode_of_entry_id_column_on_refugee}}', [
            'id' => $this->primaryKey(),
        ]);
    }
}

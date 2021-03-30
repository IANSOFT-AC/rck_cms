<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%donor}}`.
 */
class m210330_173620_create_donor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%donor}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'desc' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%donor}}');
    }
}

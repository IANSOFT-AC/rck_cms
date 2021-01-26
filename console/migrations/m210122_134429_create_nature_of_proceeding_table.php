<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%nature_of_proceeding}}`.
 */
class m210122_134429_create_nature_of_proceeding_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%nature_of_proceeding}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
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
        $this->dropTable('{{%nature_of_proceeding}}');
    }
}

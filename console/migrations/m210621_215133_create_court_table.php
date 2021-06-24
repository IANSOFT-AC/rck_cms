<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%court}}`.
 */
class m210621_215133_create_court_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%court}}', [
            'id' => $this->primaryKey(),
            'court' => $this->string()->notNull()->unique(),
            'location' => $this->integer(),
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
        $this->dropTable('{{%court}}');
    }
}

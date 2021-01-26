<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%relationship}}`.
 */
class m210119_131737_create_relationship_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%relationship}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
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
        $this->dropTable('{{%relationship}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rck_offices}}`.
 */
class m210120_061551_create_rck_offices_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rck_offices}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
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
        $this->dropTable('{{%rck_offices}}');
    }
}

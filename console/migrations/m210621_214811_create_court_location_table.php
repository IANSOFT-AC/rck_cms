<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%court_location}}`.
 * Testing CI/CD
 */
class m210621_214811_create_court_location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%court_location}}', [
            'id' => $this->primaryKey(),
            'location' => $this->string()->notNull()->unique(),
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
        $this->dropTable('{{%court_location}}');
    }
}

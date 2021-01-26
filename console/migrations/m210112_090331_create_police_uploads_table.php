<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%police_uploads}}`.
 */
class m210112_090331_create_police_uploads_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%police_uploads}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),
            'desc' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        $this->insert('police_uploads', [
            'name' => 'ID','desc' => 'ID number'
        ]);
        $this->insert('police_uploads', [
            'name' => 'P3','desc' => 'P3 number'
        ]);
        $this->insert('police_uploads', [
            'name' => 'Statement','desc' => 'Police Statement'
        ]);
        $this->insert('police_uploads', [
          'name' => 'Charge Sheet','desc' => 'Charge Sheet More Info'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%police_uploads}}');
    }
}

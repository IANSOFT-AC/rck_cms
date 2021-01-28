<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%training_upload}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%training}}`
 */
class m210128_094002_create_training_upload_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%training_upload}}', [
            'id' => $this->primaryKey(),
            'doc_path' => $this->text(),
            'filename' => $this->string(),
            'training_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `training_id`
        $this->createIndex(
            '{{%idx-training_upload-training_id}}',
            '{{%training_upload}}',
            'training_id'
        );

        // add foreign key for table `{{%training}}`
        $this->addForeignKey(
            '{{%fk-training_upload-training_id}}',
            '{{%training_upload}}',
            'training_id',
            '{{%training}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%training}}`
        $this->dropForeignKey(
            '{{%fk-training_upload-training_id}}',
            '{{%training_upload}}'
        );

        // drops index for column `training_id`
        $this->dropIndex(
            '{{%idx-training_upload-training_id}}',
            '{{%training_upload}}'
        );

        $this->dropTable('{{%training_upload}}');
    }
}

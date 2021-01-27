<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%intervention_upload}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%casetype}}`
 */
class m210127_100202_create_intervention_upload_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%intervention_upload}}', [
            'id' => $this->primaryKey(),
            'issue_id' => $this->integer(),
            'name' => $this->string(),
            'description' => $this->text(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `issue_id`
        $this->createIndex(
            '{{%idx-intervention_upload-issue_id}}',
            '{{%intervention_upload}}',
            'issue_id'
        );

        // add foreign key for table `{{%casetype}}`
        $this->addForeignKey(
            '{{%fk-intervention_upload-issue_id}}',
            '{{%intervention_upload}}',
            'issue_id',
            '{{%casetype}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%casetype}}`
        $this->dropForeignKey(
            '{{%fk-intervention_upload-issue_id}}',
            '{{%intervention_upload}}'
        );

        // drops index for column `issue_id`
        $this->dropIndex(
            '{{%idx-intervention_upload-issue_id}}',
            '{{%intervention_upload}}'
        );

        $this->dropTable('{{%intervention_upload}}');
    }
}

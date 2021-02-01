<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%counseling}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%intervention}}`
 */
class m210131_210242_create_counseling_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%counseling}}', [
            'id' => $this->primaryKey(),
            'code' => $this->integer(),
            'date' => $this->integer(),
            'session' => $this->string(),
            'intervention_id' => $this->integer()->notNull(),
            'presenting_problem' => $this->text(),
            'therapeutic' => $this->text(),
            'conseptualization' => $this->text(),
            'intervention' => $this->text(),
            'counsellors' => $this->text(),
            'counseling_intake_form' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `intervention_id`
        $this->createIndex(
            '{{%idx-counseling-intervention_id}}',
            '{{%counseling}}',
            'intervention_id'
        );

        // add foreign key for table `{{%intervention}}`
        $this->addForeignKey(
            '{{%fk-counseling-intervention_id}}',
            '{{%counseling}}',
            'intervention_id',
            '{{%intervention}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%intervention}}`
        $this->dropForeignKey(
            '{{%fk-counseling-intervention_id}}',
            '{{%counseling}}'
        );

        // drops index for column `intervention_id`
        $this->dropIndex(
            '{{%idx-counseling-intervention_id}}',
            '{{%counseling}}'
        );

        $this->dropTable('{{%counseling}}');
    }
}

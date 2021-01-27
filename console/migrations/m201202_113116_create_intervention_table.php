<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%intervention}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%intervention_type}}`
 */
class m201202_113116_create_intervention_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%intervention}}', [
            'id' => $this->primaryKey(),
            'intervention_type_id' => $this->string(),
            'case_id' => $this->integer(),
            'situation_description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `intervention_type_id`
        $this->createIndex(
            '{{%idx-intervention-intervention_type_id}}',
            '{{%intervention}}',
            'intervention_type_id'
        );

        // add foreign key for table `{{%intervention_type}}`
        $this->addForeignKey(
            '{{%fk-intervention-intervention_type_id}}',
            '{{%intervention}}',
            'intervention_type_id',
            '{{%intervention_type}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%intervention_type}}`
        $this->dropForeignKey(
            '{{%fk-intervention-intervention_type_id}}',
            '{{%intervention}}'
        );

        // drops index for column `intervention_type_id`
        $this->dropIndex(
            '{{%idx-intervention-intervention_type_id}}',
            '{{%intervention}}'
        );

        $this->dropTable('{{%intervention}}');
    }
}

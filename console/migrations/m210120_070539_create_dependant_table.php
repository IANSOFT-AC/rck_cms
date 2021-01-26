<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dependant}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%relationship}}`
 * - `{{%refugee}}`
 */
class m210120_070539_create_dependant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dependant}}', [
            'id' => $this->primaryKey(),
            'names' => $this->string()->notNull(),
            'relationship_id' => $this->integer()->notNull(),
            'refugee_id' => $this->integer()->notNull(),
			'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `relationship_id`
        $this->createIndex(
            '{{%idx-dependant-relationship_id}}',
            '{{%dependant}}',
            'relationship_id'
        );

        // add foreign key for table `{{%relationship}}`
        $this->addForeignKey(
            '{{%fk-dependant-relationship_id}}',
            '{{%dependant}}',
            'relationship_id',
            '{{%relationship}}',
            'id',
            'CASCADE'
        );

        // creates index for column `refugee_id`
        $this->createIndex(
            '{{%idx-dependant-refugee_id}}',
            '{{%dependant}}',
            'refugee_id'
        );

        // add foreign key for table `{{%refugee}}`
        $this->addForeignKey(
            '{{%fk-dependant-refugee_id}}',
            '{{%dependant}}',
            'refugee_id',
            '{{%refugee}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%relationship}}`
        $this->dropForeignKey(
            '{{%fk-dependant-relationship_id}}',
            '{{%dependant}}'
        );

        // drops index for column `relationship_id`
        $this->dropIndex(
            '{{%idx-dependant-relationship_id}}',
            '{{%dependant}}'
        );

        // drops foreign key for table `{{%refugee}}`
        $this->dropForeignKey(
            '{{%fk-dependant-refugee_id}}',
            '{{%dependant}}'
        );

        // drops index for column `refugee_id`
        $this->dropIndex(
            '{{%idx-dependant-refugee_id}}',
            '{{%dependant}}'
        );

        $this->dropTable('{{%dependant}}');
    }
}

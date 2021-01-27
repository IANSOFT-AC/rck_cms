<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%intervention}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%refugee}}`
 */
class m210127_113713_add_client_column_to_intervention_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%intervention}}', 'client_id', $this->integer());

        // creates index for column `client_id`
        $this->createIndex(
            '{{%idx-intervention-client_id}}',
            '{{%intervention}}',
            'client_id'
        );

        // add foreign key for table `{{%refugee}}`
        $this->addForeignKey(
            '{{%fk-intervention-client_id}}',
            '{{%intervention}}',
            'client_id',
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
        // drops foreign key for table `{{%refugee}}`
        $this->dropForeignKey(
            '{{%fk-intervention-client_id}}',
            '{{%intervention}}'
        );

        // drops index for column `client_id`
        $this->dropIndex(
            '{{%idx-intervention-client_id}}',
            '{{%intervention}}'
        );

        $this->dropColumn('{{%intervention}}', 'client_id');
    }
}

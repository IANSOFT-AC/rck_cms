<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user_group}}`
 */
class m210304_102439_add_role_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'role', $this->integer());

        // creates index for column `role`
        $this->createIndex(
            '{{%idx-user-role}}',
            '{{%user}}',
            'role'
        );

        // add foreign key for table `{{%user_group}}`
        $this->addForeignKey(
            '{{%fk-user-role}}',
            '{{%user}}',
            'role',
            '{{%user_group}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user_group}}`
        $this->dropForeignKey(
            '{{%fk-user-role}}',
            '{{%user}}'
        );

        // drops index for column `role`
        $this->dropIndex(
            '{{%idx-user-role}}',
            '{{%user}}'
        );

        $this->dropColumn('{{%user}}', 'role');
    }
}

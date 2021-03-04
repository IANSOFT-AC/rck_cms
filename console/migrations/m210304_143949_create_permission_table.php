<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%permission}}`.
 */
class m210304_143949_create_permission_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%permission}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'code' => $this->integer(),
        ]);

        $this->batchInsert('permission',['name','code'], [
            ['FILE_UPLOAD',50],
            ['FILE_DELETE',51],
            ['CLIENT_INDEX',100],
            ['CLIENT_CREATE',101],
            ['CLIENT_UPDATE', 102],
            ['CLIENT_VIEW', 103],
            ['CLIENT_FILES', 104],
            ['POLICE_INDEX', 200],
            ['POLICE_CREATE', 201],
            ['POLICE_UPDATE', 202],
            ['POLICE_VIEW', 203],
            ['POLICE_FILES', 204],
            ['COURT_INDEX', 300],
            ['COURT_CREATE', 301],
            ['COURT_UPDATE', 302],
            ['COURT_VIEW', 303],
            ['COURT_FILES', 304],
            ['INTERVENTION_INDEX', 400],
            ['INTERVENTION_CREATE', 401],
            ['INTERVENTION_UPDATE', 402],
            ['INTERVENTION_VIEW', 403],
            ['INTERVENTION_FILES', 404],
            ['TRAINING_INDEX', 500],
            ['TRAINING_CREATE', 501],
            ['TRAINING_UPDATE', 502],
            ['TRAINING_VIEW', 503],
            ['TRAINING_FILES', 504],
            ['COUNSELING_INDEX', 600],
            ['COUNSELING_CREATE', 601],
            ['COUNSELING_UPDATE', 602],
            ['COUNSELING_VIEW', 603],
            ['COUNSELING_FILES', 604],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%permission}}');
    }
}

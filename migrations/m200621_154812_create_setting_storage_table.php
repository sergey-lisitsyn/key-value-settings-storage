<?php
namespace sergeylisitsyn\settingsStorage\migrations;

use yii\db\Migration;

/**
 * Handles the creation of table `{{%setting_storage}}`.
 */
class m200621_154812_create_setting_storage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%setting_storage}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'type' => $this->tinyInteger()->notNull(),
            'value' => $this->string(255)->null(),
            'default' => $this->string(255)->null(),
            'description' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%setting_storage}}');
    }
}

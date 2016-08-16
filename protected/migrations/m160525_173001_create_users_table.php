<?php

class m160525_173001_create_users_table extends CDbMigration
{
	public function up()
	{
		$this->createTable("tbl_users", array(
			'id' => "INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT",
			'name' => "VARCHAR(50)",
			'option' => "INTEGER",
			'status' => "VARCHAR(5) NOT NULL DEFAULT -1",
			'user_login' => "VARCHAR(50)",
			'coffee_date' => "DATETIME",
			'login_date' => "DATETIME",
			'date' => "TIMESTAMP",
			'avatar' => "LONGTEXT"
		));
	}

	public function down()
	{
		$this->dropTable('tbl_users');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}

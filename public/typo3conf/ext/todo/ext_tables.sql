CREATE TABLE tx_todo_domain_model_entry (

	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	title varchar(255) NOT NULL,
	description text,
	done tinyint(1) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)

);

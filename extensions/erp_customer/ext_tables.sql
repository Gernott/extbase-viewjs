CREATE TABLE tx_erpcustomer_domain_model_customer (

	name varchar(255) DEFAULT '' NOT NULL,
	address varchar(255) DEFAULT '' NOT NULL,
	persons int(11) unsigned DEFAULT '0' NOT NULL

);

CREATE TABLE tx_erpcustomer_domain_model_person (

	customer int(11) unsigned DEFAULT '0' NOT NULL,

	first_name varchar(255) DEFAULT '' NOT NULL,
	last_name varchar(255) DEFAULT '' NOT NULL

);

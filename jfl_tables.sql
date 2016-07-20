CREATE DATABASE jobfairlocator;
CREATE USER 'job_fair_user'@'localhost' IDENTIFIED BY 'aTGSXmPB67PkwWyB69';
GRANT ALL PRIVILEGES ON jobfairlocator.* TO 'job_fair_user'@'localhost';

/*This table holds the key value and Company name*/
CREATE TABLE 'jobfairlocator'.'Company' (
  'booth_id' varchar(3) NOT NULL,
  'Name' varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY ('booth_id')
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*This table holds the all the other fields for the company*/
CREATE TABLE 'jobfairlocator'.'Company_Data' (
  'booth_id' varchar(3) NOT NULL,
  'url' varchar(255),
  'description' varchar(255),
  PRIMARY KEY ('booth_id')
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*
This table holds the dates for the career fair
this table is allowed to have duplicate ids because
a company can attend multiple days
*/
CREATE TABLE 'jobfairlocator'.'Days_Attending' (
  'booth_id' varchar(3) NOT NULL,
  'Date_Attending' DATE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

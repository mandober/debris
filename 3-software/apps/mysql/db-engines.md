# MySQL DB Engines

Converting Tables from MyISAM to InnoDB
https://dev.mysql.com/doc/refman/8.0/en/converting-tables-to-innodb.html

MySQL Storage Engine – How to Convert MyISAM to InnoDB
https://kinsta.com/knowledgebase/convert-myisam-to-innodb/

# InnoDB

- has *row-level locking*
- has *referential integrity*: supports *foreign keys*, *relation constraints*
- has *transactions*: *commits* and *rollbacks*
- has greater reliability as it uses *transactional logs* for *auto recovery*


## MyISAM

- MyISAM only has full table-level locking
- no referential integrity
- no transactions
- no auto recovery

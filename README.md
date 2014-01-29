If you want apache in the virtual machine you need to uncomment all the comments in `.puppet/manifests/default.pp` and define an appropriate value for `server_name`.

To run doctrine commands simply ssh to your box, change to `/vagrant` and execute `./doctrine`. You'll see available commands as listed below.

```bash
Usage:
  [options] command [arguments]

Options:
  --help           -h Display this help message.
  --quiet          -q Do not output any message.
  --verbose        -v|vv|vvv Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug.
  --version        -V Display this application version.
  --ansi              Force ANSI output.
  --no-ansi           Disable ANSI output.
  --no-interaction -n Do not ask any interactive question.

Available commands:
  help                             Displays help for a command
  list                             Lists commands
dbal
  dbal:import                      Import SQL file(s) directly to Database.
  dbal:run-sql                     Executes arbitrary SQL directly from the command line.
orm
  orm:clear-cache:metadata         Clear all metadata cache of the various cache drivers.
  orm:clear-cache:query            Clear all query cache of the various cache drivers.
  orm:clear-cache:result           Clear all result cache of the various cache drivers.
  orm:convert-d1-schema            Converts Doctrine 1.X schema into a Doctrine 2.X schema.
  orm:convert-mapping              Convert mapping information between supported formats.
  orm:convert:d1-schema            Converts Doctrine 1.X schema into a Doctrine 2.X schema.
  orm:convert:mapping              Convert mapping information between supported formats.
  orm:ensure-production-settings   Verify that Doctrine is properly configured for a production environment.
  orm:generate-entities            Generate entity classes and method stubs from your mapping information.
  orm:generate-proxies             Generates proxy classes for entity classes.
  orm:generate-repositories        Generate repository classes from your mapping information.
  orm:generate:entities            Generate entity classes and method stubs from your mapping information.
  orm:generate:proxies             Generates proxy classes for entity classes.
  orm:generate:repositories        Generate repository classes from your mapping information.
  orm:info                         Show basic information about all mapped entities
  orm:run-dql                      Executes arbitrary DQL directly from the command line.
  orm:schema-tool:create           Processes the schema and either create it directly on EntityManager Storage Connection or generate the SQL output.
  orm:schema-tool:drop             Drop the complete database schema of EntityManager Storage Connection or generate the corresponding SQL output.
  orm:schema-tool:update           Executes (or dumps) the SQL needed to update the database schema to match the current mapping metadata.
  orm:validate-schema              Validate the mapping files.
```

To create the schema run ...

```bash
➜  /vagrant git:(master) ✗ ./doctrine orm:schema-tool:update --force --dump-sql
CREATE TABLE example (id INT UNSIGNED AUTO_INCREMENT NOT NULL, domain VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

Updating database schema...
Database schema updated successfully! "1" queries were executed
```

... and verify if the tables have been created. Run the mysql tool and provide it the password of the MySQL root user which is `vagrant`. In the MySQL shell you run `use vagrant; show tables;` as shown below.

```bash
➜  /vagrant git:(master) ✗ mysql -u root -p
Enter password:
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 60
Server version: 5.5.40-0ubuntu0.12.04.1 (Ubuntu)

Copyright (c) 2000, 2014, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> use vagrant; show tables;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
+-------------------+
| Tables_in_vagrant |
+-------------------+
| example           |
+-------------------+
1 row in set (0.00 sec)
```

If you don't want to alter your database, just omit the `--force` parameter and execute the SQL statement at a later time.


4.2.11 Setting Environment Variables
https://dev.mysql.com/doc/refman/8.0/en/setting-environment-variables.html

MySQL environment variables that are used directly or indirectly
https://dev.mysql.com/doc/refman/8.0/en/environment-variables.html


Using Option Files
https://dev.mysql.com/doc/refman/8.0/en/option-files.html
https://dev.mysql.com/doc/refman/8.0/en/windows-create-option-file.html


## mysql_config_editor

https://dev.mysql.com/doc/refman/8.0/en/mysql-config-editor.html

Location:
- `%APPDATA%\MySQL\.mylogin.cnf`
- `~/.mylogin.cnf`

Each option group in .mylogin.cnf is called a "login path", which is a group that permits only certain options: host, user, password, port and socket.

When you invoke a client program to connect to the server, the client uses .mylogin.cnf in conjunction with other option files. Its precedence is higher than other option files, but less than options specified explicitly on the client command line.


```shell
# create (enter pass when promped)
mysql_config_editor set --login-path=client --host=localhost --user=root --password
# display
mysql_config_editor print --all
# connect to the local server
mysql --login-path=client
# mysql reads the client login by default, so it's the same as
mysql
```

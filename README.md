# Steps to run this app

### Requirements
- postgresql
- apache 2.4
- php +7
- apache 2.4 module rewrite enabled
- virtual host in apache configured and directive enabled for .htaccess file
- set database name, username and password in app/bootstrap/Database.php

### Steps
- git clone [project]
- add [user] local to www-data group
    ```  usermod -a -G www-data [user] ```
- chown -R [user]:www-data TBD-PRIMERA-TAREA
- chmod 2775 TBD-PRIMERA-TAREA/
- find TBD-PRIMERA-TAREA/ -type d -exec chmod 2775 {} \;
- find TBD-PRIMERA-TAREA/ -type f -exec chmod 0664 {} \;

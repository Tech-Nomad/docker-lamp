# docker-lamp

Docker example with Apache, MySql 8.0, PhpMyAdmin and Php

You can use MySql 5.7 if you checkout to the tag `mysql5.7`

I use docker-compose as an orchestrator. To run these containers:

```
docker-compose up -d
```

Open phpmyadmin at [http://localhost:8000](http://localhost:8000)
Open web browser to look at a simple php example at [http://localhost:8001](http://localhost:8001)

Run mysql client:

- `docker-compose exec db mysql -u root -p` 

Enjoy !


## MySQL error:  mysqli_real_connect(): The server requested authentication method unknown to the client [caching_sha2_password]

for any reason this command inside docker-compose.yaml doesn't work:
"command: --default-authentication-plugin=mysql_native_password"

When you login into mysql / db container by:
```bash
docker exec -it mysql bash -l
mysql -uroot -ptest
```
... you can see that the "plugin" table contains caching_sha2_password for all users. So you have to set it manually to "mysql_native_password" by:
```mysql
ALTER USER 'user' IDENTIFIED WITH mysql_native_password BY 'test';
```
Note: this [as suggested here](https://github.com/laradock/laradock/issues/1390#issuecomment-419562297) didn't work for me:
```mysql
alter user 'user'@'localhost' identified with mysql_native_password by 'test';
```

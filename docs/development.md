
# Development
There is a prepared Docker environment for you.
Configuration is in `docker-compose.yml`.

All useful commands are in the `Makefile` placed into root of the project.

#### How to start the server.
If you didn't start it before use this command. It builds containers and start the server.
```bash
$ make init
```

Next time use
```bash
$ make up
```

#### How to run console
```bash
$ make php-console-bash
```
or zsh if you like
```bash
$ make php-console-zsh
```

#### How to down containers
```bash
$ make down
```

### Environment
You can tune it using available variables:
- `SERVICE_PORT` - local http port, `80` by default
- `TIMEZONE` - timezone that is used in php config, `UTC` by default. The variable set during container build, accordingly, to change this value, you need to rebuild the php container.
- `XDEBUG_IDE_SERVER_NAME` - `docker` by default. The name is used for debugging, and you should set the same server name in your IDE config.
- `XDEBUG_PORT` - local xdebug port your IDE listen to, `9003` by default

E.g. bind service to 8001 local port
```
$ SERVICE_PORT=8001 make up
```


### Tests
All tests are in `tests` directory.
Don't forget to run and fix them before commit
```
make test
```
or inside the container
```
bin/phpunit tests
```

### API structure and Swagger
Open Api json config is available by link [http://localhost/open-api/doc](http://localhost/open-api/doc)

or

You may use the link to open swagger [http://localhost/open-api/swagger](http://localhost/open-api/swagger)

### Debug
Xdebug preset parameters:
- xdebug idekey = `PHPSTORM`
- server name = `docker`, can change by env var `XDEBUG_IDE_SERVER_NAME`
- port 9003, can change by env var `XDEBUG_PORT`

### Static analysis
Use psalm
```
make psalm
```
or inside the container
```
vendor/bin/psalm
```

Installed plugins:
- psalm symfony plugin [(github)](https://github.com/psalm/psalm-plugin-symfony)

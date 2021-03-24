### Required steps to deploy to production
These are the steps you need to follow when deploy to prod. Each item will be explained in more detail below.

- Put file with vacancies data into `var/data` directory
- Set env variables
- Build contrainer
- Run health checks `/monitor/health/run` and be sure all checks have status = 0

### Put file with vacancies
File with vacancies should be placed in `var/data/vacancies.csv`

List of required fields:
- ID
- Job title
- Seniority level
- Country
- City
- Salary
- Currency
- Required skills - list of skills separated by comma
- Company size
- Company domain

#### Let's look the example
```
ID,Job title,Seniority level,Country,City,Salary,Currency,Required skills,Company size,Company domain
1,Senior PHP Developer,Senior,DE,Berlin,747500,SVU,"PHP, Symfony, REST, Unit-testing, Behat, SOLID, Docker, AWS",100-500,Automotive
2,Middle PHP Developer,Middle,DE,Berlin,632500,SVU,"PHP, Symfony, Unit-testing, SOLID",100-500,Automotive
3,Junior PHP Developer,Junior,DE,Berlin,517500,SVU,"PHP, LAMP, HTML, CSS, SQL",100-500,Automotive
```

### Env variables
- `SERVICE_TRACE_ID` - header to trace requests
- `SERVICE_LOG_TRACE_ID` - `trace-id` key in logs
- `SERVICE_PARENT_ID` - header to trace parent service
- `SERVICE_LOG_PARENT_ID` - `parent-id` key in logs
- `APP_ENV` - environment. Use `prod` for production

### Dockerfile
You can find Dockerfile for production in `environment/php/prod`
FastCGI service listen to 9000 port.

### Health Checks
In human readable format [http://{SERVICE_DOMAIN}/monitor/health/](http://localhost/monitor/health/)

In json format [http://{SERVICE_DOMAIN}/monitor/health/run](http://localhost/monitor/health/run)

`status: 0` means that everything is alright

### Logging
Application log files are placed into `/var/www/app/var/log` directory.

To trace service calls every record saved with two fields `trace-id` and `parent-id` (look [Trace Context Level 2](https://w3c.github.io/trace-context/))
if they were passed in request header.
You should specify names of this headers using env variables `SERVICE_TRACE_ID`
and `SERVICE_PARENT_ID`.
Also you should specify names of trace using env variables `SERVICE_LOG_TRACE_ID`
and `SERVICE_LOG_PARENT_ID`.
Example:
```
$ SERVICE_TRACE_ID=X-TRACE-ID \ 
SERVICE_PARENT_ID=X-SPAN-ID \
SERVICE_LOG_TRACE_ID=trace_id \
SERVICE_LOG_PARENT_ID=parent_id \
docker start ... 
```


### Optimization for highload
There is only one optimization for highload:
- parsed vacancies file is put into cache.
- opcache is enabled for php

# File Sorter

File Sorter is a tool that takes the input of a .properties file and then creates another file with sorted file keys in alphabetical order including comments. By default, it is taking input file config/short_codes.properties and then stores the file in the directory config with a new name. you can configure the name by .env file. The tool is dockerized and very easy to set up. just follow the below steps for setting up the project.

## clone project

Use the below link for cloning.

```bash
git clone https://github.com/MuhammadAteebHussain/file-sorter.git
```

## Installation
Note: make sure you have install docker and docker-compse latest
  Copy .env.example (currently you will get sample .env) to .env and update credentials

## 
- stop any previous development environment

```bash
docker-compose -f docker-compose.yml down --remove-orphans
docker-compose -f docker-compose.yml rm -f -s
```
## 
- starting development environment please make sure check the ports in docker-compose.yml
```bash
docker-compose up -d --build
```
##
- give write access to public var and cache directory
##
-  Then RUN Command
```bash
composer install
composer dumpautload -o
```

##
-  for checking containers 
```bash
docker-compose ps -a
```
## Running Project
-  After setting all please up your listeners
```bash
php bin/console  app:create-file
app:create-hash-listen
```

##
- RUN Unit tests
```bash
php bin/phpunit
```
##
- For Generating Sorted File
```bash
php bin/console app:generate-sorted-short-code-file
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
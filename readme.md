# LazyDevWeather 

## How to start?
1. Create .env file
   1. In `lazy_dev_weather` folder do `cp  .env.example .env`
   2. Set `OPEN_WEATHER_API_KEY` to your client key
   3. Optionally set `OPEN_WEATHER_API_KEY` if there's newer
2. run `docker-compose up -d`
3. when the container is on run
   1. `docker exec -it lazy_dev_weather_app /bin/sh`
   2. `./deploy_lazy_dev_weather.sh`
## How to check weather?
1. In docker container go to `/home/lazy_dev_weather/`
2. Run `php weather.php CityName`
   1. If city name is multi segment use quotes `php weather.php 'Los angeles'`
## Tests
In container run `./vendor/bin/phpunit /home/lazy_dev_weather/tests`

## Static code analysis
### Psalm
Run
2. `cd /home/lazy_dev_weather && ./vendor/bin/psalm`


## How the code works?
Goal of the project was to create hexagonal architecture where we can be fully framework agnostic based on high abstraction.

`weather.php` is a simple CLI starting point for running the `WeatherSearch`.

#### Api clients swapping
We can easily swap ApiClients, new client MUST implement `Shared\Infrastructure\ApiClient`.

#### Repository swapping
We can easily swap weather repositories - whether it be DB or another API - see `Tests\Weather\Application\Unit\WeatherTestArrayRepository`

#### Adding new repositories
In order to add different repository infrastructure it must implement the `Weather\Domain\WeatherRepository`
For API repositories it's recommended to extend by `Weather\Infrastructure`.

For example purposes there's `OpenWeather API` implemented as a repository see `Weather\Infrastructure\OpenWeatherApiRepository`

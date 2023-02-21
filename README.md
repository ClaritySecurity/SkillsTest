Welcome to the Clarity Skills Test Sandbox

The purpose of this test will be for you demonstrate your familiarity with the Laravel framework and your ability to
integrate with 3rd party REST apis. To demonstrate this, we will be using the Star Wars API, or SWAPI. You can find
information about SWAPI here: https://swapi.dev/

Note: This is not meant to be a test of your ability to recall obscure syntax or memorize api information. Googling
for any documentation you feel may be helpful, or copy-pasting from the laravel documentation is perfectly acceptable.
If you run your test and it fails the first time, that's also not a mark against you. Run your tests, debug your code,
then re-run the test as many times as you like. The end-result, and how quickly you arrive at an acceptable solution
are the main criteria we evaluate on.

Start by cloning this repo to your local environment and then complete each of the objectives below.

Objectives:
1. Set up the skills testing environment using the docker-compose file provided.
2. Using the documentation provided in SWAPI, find the data you expect to be returned from the 'starships' endpoint.
3. Create a new migration to add a table called "st_starship" to the MySQL database. The table should have at least the
   following attributes:
   a. name
   b. model
   c. manufacturer
   d. passengers
   Use the SWAPI data to make sure you are using the most relevant data types for each of these.
4. Create a new eloquent model called "Starship".
5. Update the App\Services\SWAPIService class to include methods to fetch the starships from SWAPI and populate and save
   new eloquent models for each starship in SWAPI.
6. Create a simple view to display your models in a table on the frontend.
7. Create a controller/action to fetch all of the models you've saved and render the view you created.
8. Create a web route from the /starships endpoint to the controller/action you just created.
9. Once your class is written, run the test suite using the command: "php artisan test"
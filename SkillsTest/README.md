Welcome to the Clarity Skills Test Sandbox

This test is designed to evaluate your ability to design and create a Vue/React component that displays 5 real estate listings from a given zip code. A basic example page has been created using static data &  

Note: This is not meant to be a test of your ability to recall obscure syntax or memorize api information. Googling
for any documentation you feel may be helpful, or copy-pasting from the laravel documentation is perfectly acceptable.
If you run your test and it fails the first time, that's also not a mark against you. Run your tests, debug your code,
then re-run the test as many times as you like. The end-result, and how quickly you arrive at an acceptable solution
are the main criteria we evaluate on.

Objectives:
1. Set up the skills testing environment using the docker-compose file provided.
   2. Clone repo
   3. modify docker-compose.yml to ensure correct database image for your processor architecture
   4. run `docker-compose up -d` or maybe have to do `docker-compose up -d --build`
   5. Open terminal from docker desktop 'devskillstest' container
   5. run `php artisan composer install`
   6. run `php artisan npm install`
   7. Install vue/react if needed
   7. run `php artisan migrate`
   8. run `php artisan db:seed`
   10. visit http://localhost/listings to see the example page
2. 

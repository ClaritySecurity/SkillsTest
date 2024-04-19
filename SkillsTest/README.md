Welcome to the Clarity Skills Test Sandbox

This test is designed to evaluate your ability to design and create a 
Vue/React component that displays 5 real estate listings from a given zip 
code. A VERY basic example page has been created using static data & 
Laravel's blade templating engine.   

Note: This is not meant to be a test of your ability to recall obscure syntax or memorize api information. Googling
for any documentation you feel may be helpful, or copy-pasting from the Laravel documentation is perfectly acceptable.

We expect you to ask questions and explain your thought process as you work 
through the objective. You may not have time to complete the entire task, so 
it's perfectly fine to let us know some things you WOULD do if you had more 
time. 


Initial Setup
1. Set up the skills testing environment using the docker-compose file provided.
2. Clone repo `git clone https://github.com/ClaritySecurity/SkillsTest.git`
3. Checkout branch `git checkout front-end-vue-2` or `git checkout 
   front-end-vue-3`
3. modify docker-compose.yml to ensure correct database image for your processor architecture
4. run `docker-compose up -d`
5. Open terminal from docker desktop 'devskillstest' container to run the 
   following commands from inside the container
5. run `composer install`
6. run `npm install`
7. run `php artisan migrate`
8. run `npm run dev` 
9. visit http://localhost/index to confirm that the app is running. Get the 
   API key from Mike or Greg and update the RealtyInUsAPI.php file and then 
   click "Import Properties" to seed the database with some data.

Objective

Overview: Our application connects to a real estate listing API in order to 
display the top 5 listings for a given zip code. We have created a basic 
example page at http://localhost/listings that displays the top 5 listings 
for 90210. 

Your task is to complete the Vue component `Listings.vue` that fetches the top 5 listings for the zip 
code provided by the end user. 

API documentation: https://rapidapi.com/apidojo/api/realty-in-us/ endpoint 
POST properties/v3/list

Bootstrap 5.3 is already included in the project: https://getbootstrap.
com/docs/5.3/getting-started/introduction/


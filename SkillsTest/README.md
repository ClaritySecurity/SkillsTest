Welcome to the Clarity Skills Test Sandbox

This test is designed to evaluate your ability to use the Laravel framework to import real estate listings from an API.

Below you will find some specific objectives regarding the importing and syncing of the data.

Note: This is not meant to be a test of your ability to recall obscure syntax or memorize api information. Googling
for any documentation you feel may be helpful, or copy-pasting from the Laravel documentation is perfectly acceptable.

We expect you to ask questions and explain your thought process as you work through the objectives.


Initial Setup
1. Set up the skills testing environment using the docker-compose file provided.
2. Clone repo `git clone https://github.com/ClaritySecurity/SkillsTest.git`
3. Checkout branch `git checkout backend-senior`
3. modify docker-compose.yml to ensure correct database image for your processor architecture
4. run `docker-compose up -d` or maybe have to do `docker-compose up -d --build`?
5. Open terminal from docker desktop 'devskillstest' container
5. run `php artisan composer install`
6. run `php artisan npm install`
7. run `php artisan migrate`
8. run `npm run build` and then move the public/build/.vite/manifest.json to 
   public/build/manifest.json (Mike is dumb and upgraded Vite and broke it)
9. visit http://localhost/listings to confirm that the app is running

Objectives

Overview: Our application connects to 1 or more real estate listing APIs and 
imports the data into our database. Hypothetically, we want to regularly 
import this data and store it so we can analyze it and don't have to always 
rely on the API for data. Take a minute to think about the challenges of 
regularly importing lots of data.

1. We have an API endpoint that returns a list of real estate listings. It 
   is already coded to import 50 listings from zip code 90210. NOTE: You 
   need to get the API key from Greg or Mike. Let's dive in and optimize the 
   data import process. 
2. We need to import once a day automatically. How do we do that?
3. How would we speed up the overall import process?
4. If speed is not important, how would we minimize infrastructure costs? 
   Assume cloud infra, paying for compute & database usage being the main costs.


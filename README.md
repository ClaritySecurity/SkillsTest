Welcome to the Clarity Skills Test Sandbox

This test is designed to evaluate your ability to design a solution to a 
specific problem and to use the Laravel framework to accomplish your 
proposed solution.

This is not meant to be a test of your ability to recall obscure syntax or memorize api information. Googling
for any documentation you feel may be helpful, or copy-pasting from the Laravel documentation is perfectly acceptable.

We expect you to ask questions and explain your thought process as you work through the objectives.


Initial Setup
1. Set up the skills testing environment using the docker-compose file provided.
2. Clone repo `git clone https://github.com/ClaritySecurity/SkillsTest.git`
3. Checkout branch `git checkout backend-senior`
3. modify docker-compose.yml to ensure correct database image for your processor architecture
4. run `docker-compose up -d --build`
5. Open terminal from docker desktop 'devskillstest' container
5. run `composer install`
6. run `npm install`
7. run `php artisan migrate`
8. run `npm run build` and then move the public/build/.vite/manifest.json to 
   public/build/manifest.json (Mike is dumb and upgraded Vite and broke it)
9. visit http://localhost/listings to confirm that the app is running
10. Get the API key from Mike to get actual results from the API

Objectives

Mike & Greg will go over the objectives with you. 

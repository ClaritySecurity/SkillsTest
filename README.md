Welcome to the Clarity Skills Test Sandbox

Initial Setup
1. Clone repo `git clone https://github.com/ClaritySecurity/SkillsTest.git`
2. (if using command line) `cd SkillsTest`
3. Checkout branch `git checkout front-end-vue-3`
4. modify docker-compose.yml to ensure correct database image for your 
   processor architecture
5. run `docker-compose up -d`
6. Open terminal from docker desktop 'devskillstest' container
7. run `composer install`
8. run `npm install`
9. run `php artisan migrate`
10. run `npm run build`
11. visit http://localhost/index to confirm that the app is running.

Your task is to complete the Vue component `SearchProperties.vue`

API documentation: 
https://rapidapi.com/apidojo/api/realty-in-us/playground/apiendpoint_c4d477ea-7292-48fa-9dfe-f093f2adf8ac

Bootstrap 5.3 is already included in the project: 
https://getbootstrap.com/docs/5.3/getting-started/introduction/


Welcome to the Clarity Skills Test Sandbox

Initial Setup
1. Clone repo `git clone https://github.com/ClaritySecurity/SkillsTest.git`
2. `cd SkillsTest`
3. Checkout branch `git checkout backend-senior`
4. modify docker-compose.yml to ensure correct database image for your 
   processor architecture
5. run `docker-compose up -d`
6. Open terminal from docker desktop 'devskillstest' container
7. run `composer install && npm install && php artisan migrate && npm run build`
8. visit http://localhost/index to confirm that the app is running.

API documentation: 
https://rapidapi.com/apidojo/api/realty-in-us/playground/apiendpoint_c4d477ea-7292-48fa-9dfe-f093f2adf8ac

Bootstrap 5.3 is already included in the project: 
https://getbootstrap.com/docs/5.3/getting-started/introduction/


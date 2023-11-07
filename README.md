Welcome to the Clarity Skills Test Sandbox

The purpose of this test will be for you demonstrate your familiarity with the Laravel framework and your ability to
integrate with 3rd party REST apis. To demonstrate this, we will be using the Star Wars API, or SWAPI. You can find
information about SWAPI here: https://swapi.dev/

Note: This is not meant to be a test of your ability to recall obscure syntax or memorize api information. Googling
for any documentation you feel may be helpful, or copy-pasting from the laravel documentation is perfectly acceptable.

Start by cloning this repo to your local environment and then complete each of the objectives below.

Objectives:
1. Set up the skills testing environment using the docker-compose file provided.
2. Run the migrations to set up your initial database tables
3. Using the documentation provided in SWAPI, find the data you expect to be returned from the 'films' and 'people' endpoints.
4. Open up your web browser to https://localhost and verify that you see a totally un-styled page with a button to Sync SWAPI Data.
5. Before pressing the button, walk through the code and explain what you expect to happen when the button is pressed. 
6. How many Films & People do you expect to be created in the database?
7. Press the button and verify that the data is being synced to the database.
8. Fix the Character import to get the full data set
9. Discuss ways to optimize the sync time. Implement one of them if time permits. 
10. Complete the code to store the film-character relationships in the database as a simple pivot table. (Hint: you'll need to create a migration, first)
11. Let's assume the XMENService was also functional. Maybe we'll be adding more classes of movie series. How would you refactor the code to make it more extensible?
12. Discuss how you would handle the case where a film is deleted from SWAPI. 
13. Discuss how you would handle the case where a character is modified from SWAPI.
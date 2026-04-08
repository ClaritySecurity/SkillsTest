# Welcome to the Clarity Skills Test Sandbox

The purpose of this test is for you to demonstrate your familiarity with the Laravel framework, your ability to
integrate with 3rd party REST APIs, and how you work with AI tooling. To demonstrate this, we will be using the
**Open Brewery DB API** and **Claude Code**, which is already installed in this environment.

> **Open Brewery API Documentation** is available in three places:
> - Online: https://www.openbrewerydb.org/documentation
> - Local: `docs/brewery-api/` folder in this project
> - Claude: The `brewery-docs` skill is pre-configured and will pull up the docs automatically when you ask about the API

This is not meant to be a test of your ability to recall obscure syntax or memorize API information. You have
**Claude Code** available in this environment -- use it. We are evaluating how you work, not whether you can write
everything from memory. If you run your tests and they fail the first time, that's not a mark against you. Debug your
code, re-run the tests as many times as you like. The end result, how you approach the problem, and how quickly you
arrive at an acceptable solution are the main criteria we evaluate on.

---

## Setup

1. Add your Anthropic API key to the `.env` file in the project root (next to `docker-compose.yml`)
2. Run `docker-compose up --build`
3. Once the container is running, open a shell: `docker exec -it devskillstest /bin/sh`
4. Verify: `php artisan --version` and `claude --version`

---

## What's Already in the Repo

- `BreweryService` with the HTTP call to the API already defined -- it fetches brewery data but does nothing with it
- A Vue page and component scaffolded, ready to wire up
- Tests for the service API call

---

## Objectives

The service fetches breweries from the Open Brewery DB API -- your job is to persist that data, hook up the frontend,
and extend the test suite to cover your changes.

1. **Migration & Model** -- Create a migration and Eloquent model for breweries.

2. **Persistence** -- Update the `BreweryService` to persist the fetched data to the database and keep it in sync.

3. **Artisan Command** -- Create `php artisan brewery:sync` that triggers the sync.

4. **API Endpoints**
   - `GET /api/breweries` -- list all breweries, paginated (10 per page).
     - Sortable by name and city
     - Filterable by state (exact match) and brewery_type (exact match)
   - `GET /api/breweries/{id}` -- single brewery detail

5. **Vue Component** -- Wire up the scaffolded Vue component to hit your API endpoint and render the breweries.

6. **Tests** -- Update the test suite to cover the persistence layer you built. 

7. **Verify** -- Run the test suite:
   ```
   php artisan test
   ```

# Clarity Developer Skills Test v2

**Date:** April 7, 2026

---

## Overview

Laravel-based live coding assessment using the Open Brewery DB API. Candidate builds a feature with Claude Code, writes tests, then defends their work in Q&A. AI is available the entire time. Conducted live on video call.

**Total meeting: 1 hour 30 minutes**

| Phase | Time |
|-------|------|
| Setup | ~10-15 min |
| Feature Build + Tests | ~50 min |
| Code Review & Q&A | ~20-25 min |

Candidate receives repo URL + Anthropic API key at the start of the interview. They add the key to `.env` as part of setup.

---

## Open Brewery DB API Reference

Base: `https://api.openbrewerydb.org/v1/breweries`
Auth: None. ~8,000 breweries.

**Endpoints:**
- `GET /v1/breweries` -- list breweries (paginated: `?page=1&per_page=50`, max 200/page)
- `GET /v1/breweries/{obdb-id}` -- single brewery
- `GET /v1/breweries/search?query={term}` -- full-text search
- `GET /v1/breweries/meta` -- total count + metadata (accepts same filters)
- `GET /v1/breweries/random` -- random brewery

**Filters:** `by_city`, `by_state`, `by_type`, `by_name`, `by_postal`, `by_country`, `by_dist`
**Pagination:** `?page=2&per_page=20` -- response is a plain JSON array, no wrapper. Use `/meta` to get total count.

Full docs in `docs/brewery-api/` (endpoints, schema, pagination).

---

## What's Pre-Built in the Repo

- `BreweryService` -- basic HTTP call to the API, fetches brewery data but does nothing with it (no pagination, no persistence)
- A Vue page and component scaffolded, ready to wire up
- A test for the service API call -- with a subtle bug baked in

**Pagination is intentionally omitted from the boilerplate.** Whether the candidate notices -- and what they do about it -- is part of the signal.

---

## Phase 1: Setup (~10-15 min)

Candidate shares screen, clones repo, runs `docker-compose up --build`, verifies Laravel and Claude Code CLI are running. Pass/fail -- not scored, but struggling here is a signal.

---

## Phase 2: Feature Build + Tests (~50 min)

### Phase 2a: Build (Claude Code on)

The service fetches breweries from the API -- candidate's job is to build the persistence layer, hook up the Vue component, and extend the test suite.

**The brief they receive:**
- The service fetches breweries from the Open Brewery DB API -- persist that data to the database and keep it in sync
- Create a migration and Eloquent model for breweries
- Add an Artisan command to trigger the sync
- Wire up the Vue component to hit the API endpoint and render the breweries
- Create API endpoints for listing and detail
- Update the test suite to cover what you build

**Key design decision we're evaluating:** ~8,000 breweries. Loading all in one shot (no pagination) is the lazy answer. Paginating at 200/page across ~40 requests is better. Best answer: paginate at 200, chunk inserts, consider queuing for production.

**What we're watching for:**
- Do they break the problem into pieces, or paste the whole spec?
- Do they review what Claude generates?
- Do they make their own decisions (e.g., how to handle nulls, pagination strategy)?
- Do they catch issues Claude introduces?
- Do they notice the bug in the pre-built test?
- On the Vue side -- do they create sensible sub-components or dump everything inline? How do they handle loading states and errors?

### Phase 2b: Test Writing

Once the feature is built, the candidate updates the test suite to cover the persistence layer they just wrote. This is where we see if they actually understand what they built.

**Strong candidate:** Tests reflect real understanding -- meaningful assertions, can explain exactly what each test covers and why.
**Weak candidate:** Shallow or copied tests, can't articulate what they're actually asserting.

---

## Phase 3: Code Review & Q&A (~20-25 min)

Interviewer-led walkthrough. Questions are conversational -- follow the code, don't read from a script.

**Code Review:**

| Question | What to look for |
|----------|-----------------|
| "Walk me through how the sync works end to end." | Can they trace the full flow -- API call -> mapping -> persistence? Do they mention edge cases like duplicates or API failures unprompted? |
| "Why did you structure it this way?" | Are they defending a real decision or just describing what they built? Strong candidates reference tradeoffs. |
| "You used Claude for X -- did you consider any alternatives?" | Do they own the decision or did Claude pick for them? |
| "What would you change if you had more time?" | Self-awareness and depth. Good answers: error handling, retries, logging, schema improvements. |

**Curveball:**

| Question | What to look for |
|----------|-----------------|
| "If the API returned 500,000 breweries instead of 8,000, what breaks first?" | Memory, timeouts, DB insert performance. Strong: chunked inserts, queued jobs. Weak: "it might be slow." |
| "The API paginates its responses -- did you notice? How did you handle that?" | Did they catch it during build or not? Can they reason through it now? |
| "Sync command works locally, times out in production. What do you check first?" | Systematic thinking -- network, DB load, PHP limits, queue config. Not random guessing. |
| Show a code snippet with an N+1 query. | Can they identify it from reading code? Strong: names the fix (`with()`). Weak: recognizes the term but can't explain why. |

---

## Infrastructure

**Docker image changes:**
- PHP 8.5, Node 22
- Add `npm install -g @anthropic-ai/claude-code` to Dockerfile
- Add `ANTHROPIC_API_KEY` in `.env` -- Docker Compose picks it up automatically

**Token management:**
- Per-candidate Anthropic API key: $15 spend limit, 48-hour expiry
- Key given at the start of the interview
- Candidate adds it to `.env` as part of setup (covered in README)
- Session transcripts logged to `~/.claude/` in the container
- Check Anthropic Console after session for usage

## Tooling Available to Candidate

Three layers of AI tooling are pre-configured. Tests whether candidates know how to use more than just raw Claude.

**1. Claude Code CLI** -- installed in the container, used for building and debugging.

**2. Context7 MCP** -- pre-configured in the container's Claude settings. Provides docs for:
- Laravel (Eloquent, HTTP client, Artisan, routing, testing, etc.)
- Vue

**3. Custom Claude skill: `brewery-docs`** -- auto-triggers when Claude detects questions about the Brewery API. Reads from `docs/brewery-api/` in the project:
- `endpoints.md` -- all endpoints, query params, filters, examples
- `schema.md` -- brewery object fields, types, nullable fields
- `pagination.md` -- page/per_page params, meta endpoint for totals

**What this tests:**
- Do they discover and use the available tooling, or just rely on Claude's training data?
- Can they work with MCP servers + custom skills, or only basic prompting?
- This mirrors our actual workflow -- we use custom skills and MCP servers daily

---

## Scoring

### Weights

| Phase | Weight |
|-------|--------|
| Build + Tests | 50% |
| Q&A | 50% |

### Thresholds (1-5 scale)

- **Strong Hire:** Both phases >= 4.0
- **Hire:** Both phases >= 3.0, no individual criterion below 2.0
- **No Hire:** Either phase below 2.5

### Auto-Reject
- Can't explain their own code in Q&A
- Pasted entire spec into Claude with zero decomposition
- Tests are shallow/copied and can't explain what they assert

### Build + Tests Criteria

| Criterion | Weight |
|-----------|--------|
| AI collaboration (decomposition, review, own decisions) | 25% |
| Completeness | 20% |
| Code quality (Laravel conventions, separation) | 20% |
| Testing (meaningful assertions, understands what they wrote) | 15% |
| Error handling | 10% |
| Frontend (Vue component structure, loading/error states) | 10% |

### Q&A Criteria

| Criterion | Weight |
|-----------|--------|
| Explains own code | 25% |
| Architectural thinking (scaling, production) | 25% |
| Curveball response | 25% |
| Communication | 25% |

---

## Repo Contents

### Pre-built:
- `BreweryService` -- basic HTTP call, no pagination, no persistence
- Vue page + component scaffolded (not wired up)
- Service test with a subtle bug
- Docker environment with Claude Code CLI
- Brewery API docs in `docs/brewery-api/`
- Claude skill + Context7 MCP pre-configured

### Candidate builds:
- `breweries` migration + `Brewery` model
- Persistence + pagination logic in `BreweryService`
- `brewery:sync` Artisan command
- `BreweryController`, API routes
- Vue component wired to API
- Tests covering their persistence layer

### File structure:

```
SkillsTest/
├── README.md
├── app/
│   └── Services/
│       └── BreweryService.php             (basic HTTP call, no persistence)
├── resources/js/
│   └── Pages/Breweries.vue                (scaffolded, not wired)
├── docs/brewery-api/
│   ├── endpoints.md
│   ├── schema.md
│   └── pagination.md
├── .claude/
│   ├── skills/brewery-docs/SKILL.md       (auto-triggers on Brewery API questions)
│   └── settings.json                      (Context7 MCP configured)
└── tests/Feature/
    └── BreweryServiceTest.php             (pre-built, has subtle bug)
```

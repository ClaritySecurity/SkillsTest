# Open Brewery DB API v1 - Endpoints

Base URL: `https://api.openbrewerydb.org/v1/breweries`

## List Breweries

```
GET /v1/breweries
```

**Query Parameters:**

| Param | Type | Default | Description |
|-------|------|---------|-------------|
| `by_city` | string | | Filter by city name |
| `by_country` | string | | Filter by country |
| `by_dist` | string | | Sort by distance from origin (`latitude,longitude`). Does not work with `sort`. |
| `by_ids` | string | | Comma-separated brewery IDs |
| `by_name` | string | | Filter by brewery name |
| `by_state` | string | | Filter by full state name (no abbreviations) |
| `by_postal` | string | | Filter by postal/ZIP code. Supports 5-digit and postal+4 (use hyphen or underscore). |
| `by_type` | string | | Filter by brewery type |
| `page` | integer | 1 | Page number |
| `per_page` | integer | 50 | Results per page (max 200) |
| `sort` | string | | `asc` or `desc` ordering |

**Example:**
```
GET /v1/breweries?by_state=california&by_type=micro&page=2&per_page=20
```

## Single Brewery

```
GET /v1/breweries/{obdb-id}
```

**Example:**
```
GET /v1/breweries/madtree-brewing-cincinnati
```

## Search Breweries

```
GET /v1/breweries/search?query={search}
```

Full-text search across brewery names. Supports partial matches.

| Param | Type | Default | Description |
|-------|------|---------|-------------|
| `query` | string (required) | | Search term |
| `page` | integer | 1 | Page number |
| `per_page` | integer | 50 | Results per page (max 200) |

**Example:**
```
GET /v1/breweries/search?query=dog&per_page=10
```

## Random Brewery

```
GET /v1/breweries/random
```

| Param | Type | Default | Description |
|-------|------|---------|-------------|
| `size` | integer | 1 | Number of random breweries (max 50) |

## Metadata

```
GET /v1/breweries/meta
```

Returns total count and other metadata. Accepts the same filter params as List Breweries.

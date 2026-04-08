# Pagination

All list/search endpoints support pagination via query parameters.

## Parameters

| Param | Default | Max | Description |
|-------|---------|-----|-------------|
| `page` | 1 | - | Page number (1-indexed) |
| `per_page` | 50 | 200 | Results per page |

## Usage

```
GET /v1/breweries?page=1&per_page=20
GET /v1/breweries?page=2&per_page=20
GET /v1/breweries/search?query=ale&page=3&per_page=10
```

## Determining Total Pages

The list endpoint does not return a total count in the response body. Use the metadata endpoint to get the total:

```
GET /v1/breweries/meta
```

Returns:
```json
{
  "total": "8000",
  "page": "1",
  "per_page": "50"
}
```

Apply the same filters to the meta endpoint to get a filtered count:

```
GET /v1/breweries/meta?by_state=california&by_type=micro
```

## Notes

- Requesting a page beyond the last page returns an empty array `[]`
- `per_page` values above 200 are capped at 200
- The response is a plain JSON array -- there is no wrapper object with `next`/`previous` links

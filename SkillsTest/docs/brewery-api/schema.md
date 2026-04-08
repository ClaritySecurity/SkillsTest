# Brewery Object Schema

Every endpoint returns brewery objects with these fields:

| Field | Type | Nullable | Description |
|-------|------|----------|-------------|
| `id` | string | no | Unique identifier (slug format, e.g., `madtree-brewing-cincinnati`) |
| `name` | string | no | Brewery name |
| `brewery_type` | string | no | Type of brewery (see types below) |
| `address_1` | string | yes | Primary street address |
| `address_2` | string | yes | Secondary address line |
| `address_3` | string | yes | Third address line |
| `city` | string | no | City |
| `state_province` | string | no | State or province |
| `postal_code` | string | no | Postal / ZIP code |
| `country` | string | no | Country |
| `longitude` | string | yes | Longitude coordinate |
| `latitude` | string | yes | Latitude coordinate |
| `phone` | string | yes | Phone number |
| `website_url` | string | yes | Website URL |
| `state` | string | no | State (deprecated, use `state_province`) |
| `street` | string | yes | Street address (deprecated, use `address_1`) |

## Brewery Types

| Type | Description |
|------|-------------|
| `micro` | Craft brewery (e.g., Samuel Adams) |
| `nano` | Extremely small, local distribution only |
| `regional` | Expanded brewery with larger distribution |
| `brewpub` | Beer-focused restaurant with on-site brewery |
| `large` | Very large brewery (deprecated) |
| `planning` | Not yet opened |
| `bar` | No brewery equipment on premises (deprecated) |
| `contract` | Uses another brewery's equipment |
| `proprietor` | Brewery incubator model |
| `closed` | Closed location |

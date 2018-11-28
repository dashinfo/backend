# api.dashinfo.net source code

All api free of charge. _Please don't abuse._

If you need special api or something else please contact me at support@dashinfo.net


## Table of Contents

* [Rest-api](#rest-api)
  * [General information](#general-information)
  * [Methods](#methods)
    * [/v1.0/all](#v10all)
    * [/v1.0/price](#v10price)
    * [/v1.0/price/{eur|usd|btc}](#v10priceeurusdbtc)
    * [/v1.0/budget](#v10budget)
    * [/v1.0/masternodes](#v10masternodes)
    * [/v1.0/blockchain](#v10blockchain)
    * [/v1.0/volume](#v10volume)
    * [/v1.0/volume/{eur|usd|btc}](#v10volumeeurusdbtc)
    * [/v1.0/marketcap](#v10marketcap)
    * [/v1.0/marketcap/{eur|usd|btc}](#v10marketcapeurusdbtc)
* [GraphQL](#graphql)
    * [General information](#general-information)
    * [Full scheme](#full-scheme)

## Rest-api
### General information
* Base endpoint `https://api.dashinfo.net/`
* All endpoints return JSON object
* Available method only `GET`
* If occurred error return JSON object with `success: false`
### Methods

#### /v1.0/all
Response:
```json
{
  "success": true,
  "data": {
    "price": {
      "eur": "81.67",
      "usd": "92.10",
      "btc": "0.02296895"
    },
    "all_time_high": {
      "btc": "0.12046300",
      "eur": "1373.88",
      "usd": "1642.22"
    },
    "marketcap": {
      "eur": "691635093.00",
      "usd": "779991782.00",
      "btc": "194944.00"
    },
    "supply": {
      "dash": 8468922
    },
    "volume": {
      "eur": "138497935.91",
      "usd": "156191108.49",
      "btc": "39036.93"
    },
    "change": "4.59",
    "blockchain": {
      "last_block": 978311,
      "difficulty": "84978309.930926",
      "hashrate": "2534466.0543117"
    },
    "budget": {
      "amount": {
        "dash": "6176.71768808"
      },
      "alloted_amount": {
        "dash": "6122.00000000"
      },
      "superblock": 980344,
      "datetime": "2018-12-02 01:41:05",
      "proposals": {
        "count": 42,
        "funded": 24,
        "not_funded": 18
      }
    },
    "masternodes": {
      "count": 5035,
      "daily_payment": {
        "dash": "0.18234624"
      }
    }
  },
  "date": "2018-11-28 09:37:49"
}
```
#### /v1.0/price
Response:
```json
{
  "success": true,
  "data": {
    "eur": "81.67",
    "usd": "92.10",
    "btc": "0.02296895"
  },
  "date": "2018-11-28 09:37:49"
}
```
#### /v1.0/price/{eur|usd|btc}
Response:
```json
{
  "success": true,
  "data": {
    "btc": "0.02296895"
  },
  "date": "2018-11-28 09:37:49"
}
```
#### /v1.0/budget
Response:
```json
{
  "success": true,
  "data": {
    "amount": {
      "dash": "6176.71768808"
    },
    "alloted_amount": {
      "dash": "6122.00000000"
    },
    "superblock": 980344,
    "datetime": "2018-12-02 01:41:05",
    "proposals": {
      "count": 42,
      "funded": 24,
      "not_funded": 18
    }
  },
  "date": "2018-11-28 09:37:49"
}
```
#### /v1.0/masternodes
Response:
```json
{
  "success": true,
  "data": {
    "count": 5035,
    "daily_payment": {
      "dash": "0.18234624"
    }
  },
  "date": "2018-11-28 09:37:49"
}
```
#### /v1.0/blockchain
Response:
```json
{
  "success": true,
  "data": {
    "last_block": 978314,
    "difficulty": "85243955.375172",
    "hashrate": "2572563.17313004"
  },
  "date": "2018-11-28 09:37:49"
}
```
#### /v1.0/volume
Response:
```json
{
  "success": true,
  "data": {
    "eur": "138586359.63",
    "usd": "156380241.82",
    "btc": "38851.29"
  },
  "date": "2018-11-28 09:37:49"
}
```
#### /v1.0/volume/{eur|usd|btc}
Response:
```json
{
  "success": true,
  "data": {
    "usd": "156380241.82"
  },
  "date": "2018-11-28 09:37:49"
}
```
#### /v1.0/marketcap
Response:
```json
{
  "success": true,
  "data": {
    "eur": "692519518.00",
    "usd": "781435994.00",
    "btc": "194141.00"
  },
  "date": "2018-11-28 09:37:49"
}
```
#### /v1.0/marketcap/{eur|usd|btc}
Response:
```json
{
  "success": true,
  "data": {
    "eur": "692519518.00"
  },
  "date": "2018-11-28 09:37:49"
}
```

## GraphQL
### General information
* Base endpoint `https://api.dashinfo.net/graphql`
* Available method only `POST`
### Full scheme:
```graphql
{
  volume {
    usd
    eur
    btc
  }
  price {
    usd
    eur
    btc
  }
  all_time_high {
    usd
    eur
    btc
  }
  marketcap {
    usd
    eur
    btc
  }
  supply {
    dash
  }
  change
  blockchain {
    last_block
    difficulty
    hashrate
  }
  budget {
    amount {
      dash
    }
    alloted_amount {
      dash
    }
    superblock
    datetime
    superblock
    proposals {
      count
      funded
      not_funded
    }
  }
  masternodes {
    count
    daily_payment {
      dash
    }
  }
}

```

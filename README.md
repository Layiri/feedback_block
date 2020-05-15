# Feedback

## Table of contents
* [Intro](#intro)
* [Configuration](#configuration-info)
* [Database init](#database-init)
* [Add new review](#add-new-review)
* [API](#api)


## Intro

Apache Version: `2.4.41`
PHP Version: `7.2.25`
MySQL Version: `5.7.28 - Port defined for MySQL: 3308`

## Database init
* Database configuration in the file: `config/config.php`

* Init database
For init database : `your-localhost/migrations/database.php`

## Add new review

`your-localhost/views/form_feedback.php`

## API

* Add review
`your-localhost/api/generate_token.php?product=product&author=author&email=email&comments=comments&ratings=ratings&advantages=advantages&disadvantages=disadvantages&file_path=file_path`

params
```text
product `string`
author `string`
email `string`
comments `string`
ratings `integer`
advantages `string`
disadvantages `string`
file_path `string`

```

* Generate token
`your-localhost/api/generate_token.php`

* Get authors
`your-localhost/api/get_authors.php`

* Get review by id
`your-localhost/api/get_review_by_id.php?id=1`

param
```text
id `integer`
```

* get_reviews_by_ip
`your-localhost/api/get_reviews_by_ip.php?ip=::1`

param
```text
ip `string`
```

* get_reviews
`your-localhost/api/get_reviews.php`


* update_review
`your-localhost/api/update_review.php?id=id&product=product&author=author&email=email&comments=comments&ratings=ratings&advantages=advantages&disadvantages=disadvantages&file_path=file_path`

params
```text
id `integer`
product `string`
author `string`
email `string`
comments `string`
ratings `integer`
advantages `string`
disadvantages `string`
file_path `string`

```

## Installation
Here is how you can run the project locally:
1. Clone this repo
    ```sh
    git clone https://github.com/dotmarn/mytheresa-coding-challenge.git
    ```
1. Go into the project root directory
    ```sh
    cd mytheresa-coding-challenge
    ```
1. Copy .env.example file to .env file
    ```sh
    cp .env.example .env
    ```
1. Create database `coding_challenge` (you can change database name)

1. Go to `.env` file 
    - set database credentials (`DB_DATABASE=glover_assessment`, `DB_USERNAME=root`, `DB_PASSWORD=`)
    > Make sure to follow your database username and password

1. Install PHP dependencies 
    ```sh
    composer install
    ```
1. Generate app key 
    ```sh
    php artisan key:generate
    ```
1. Run migration
    ```
    php artisan migrate
    ```
1. Run seeder
    ```
    php artisan db:seed
    ```
    this command will create default products and store it in the database

1. Run server 
    ```sh
    php artisan serve
    ``` 
1. Run tests
    ```sh
    php artisan test
    ``` 

## API Endpoints

1. Fetch Products
    ```sh
    POST /api/products
    ```
    ### payload
    ```json
    {}
    ```
    ### sample response
    ```json
    {
        "status": 200,
        "message": "Records fetched successfully...",
        "data": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "sku": "000001",
                    "name": "BV Lean leather ankle boots",
                    "category": "boots",
                    "price": {
                        "final": 2670,
                        "currency": "EUR",
                        "original": "8900",
                        "discount_percentage": "30%"
                    },
                    "deleted_at": null,
                    "created_at": "2022-12-04T18:29:10.000000Z",
                    "updated_at": "2022-12-04T18:31:12.000000Z"
                },
                {
                    "id": 2,
                    "sku": "000002",
                    "name": "BV Lean leather ankle boots",
                    "category": "boots",
                    "price": {
                        "final": 2970,
                        "currency": "EUR",
                        "original": "9900",
                        "discount_percentage": "30%"
                    },
                    "deleted_at": null,
                    "created_at": "2022-12-04T18:29:10.000000Z",
                    "updated_at": "2022-12-04T18:31:12.000000Z"
                },
                {
                    "id": 3,
                    "sku": "000003",
                    "name": "Ashlington leather ankle boots",
                    "category": "boots",
                    "price": {
                        "final": 2130,
                        "currency": "EUR",
                        "original": "7100",
                        "discount_percentage": "30%"
                    },
                    "deleted_at": null,
                    "created_at": "2022-12-04T18:29:10.000000Z",
                    "updated_at": "2022-12-04T18:31:12.000000Z"
                },
                {
                    "id": 4,
                    "sku": "000004",
                    "name": "Naima embellished suede sandals",
                    "category": "sandals",
                    "price": {
                        "final": 79500,
                        "currency": "EUR",
                        "original": "79500",
                        "discount_percentage": null
                    },
                    "deleted_at": null,
                    "created_at": "2022-12-04T18:29:10.000000Z",
                    "updated_at": "2022-12-04T18:31:12.000000Z"
                },
                {
                    "id": 5,
                    "sku": "000005",
                    "name": "Nathane leather sneakers",
                    "category": "sneakers",
                    "price": {
                        "final": 5900,
                        "currency": "EUR",
                        "original": "5900",
                        "discount_percentage": null
                    },
                    "deleted_at": null,
                    "created_at": "2022-12-04T18:29:10.000000Z",
                    "updated_at": "2022-12-04T18:31:12.000000Z"
                }
            ],
            "first_page_url": "http://coding-challenge.test/api/products?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://coding-challenge.test/api/products?page=1",
            "links": [
                {
                    "url": null,
                    "label": "&laquo; Previous",
                    "active": false
                },
                {
                    "url": "http://coding-challenge.test/api/products?page=1",
                    "label": "1",
                    "active": true
                },
                {
                    "url": null,
                    "label": "Next &raquo;",
                    "active": false
                }
            ],
            "next_page_url": null,
            "path": "http://coding-challenge.test/api/products",
            "per_page": 5,
            "prev_page_url": null,
            "to": 5,
            "total": 5
        }
    }
    ```

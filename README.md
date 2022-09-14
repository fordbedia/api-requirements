# api-requirements

## Description
We want you to implement a REST API endpoint that given a list of products, applies some
discounts to them and can be filtered.
You are free to choose whatever language and tools you are most comfortable with, but, we value you to use laravel since our main platform is also on laravel / php.
We will value your ability to apply the following rules on the corresponding layers following Domain Driven Design. 
Please add instructions on how to run it and publish it on your fork.

## Deliverable 

Fork the project, work on the solution and send us back a link to your forked GitHub project to examine your answer to this test.

## Conditions 

  The prices are integers for example, 100.00€ would be 10000.
  
-[x] You can store the products as you see fit (json file, in memory, rdbms of choice)
-[x] Products in the "insurance" category have a 30% discount.
-[x] The product with sku = 000003 has a 15% discount.
-[x] Provide a single endpoint. GET /products.
-[x] Can be filtered by category as a query string parameter.
-[x] (optional) Can be filtered by price as a query string parameter, this filter applies before discounts are applied.
-[x] Returns a list of Products with the given discounts applied when necessary Product model.
-[x] price.currency is always EUR.
-[x] When a product does not have a discount, price.final and price.original should be the same number and discount_percentage should be null.
-[x] When a product has a discount, price.original is the original price, price.final is the amount with the discount applied and discount_percentage represents the applied discount with the % sign.

Example product with a discount of 30% applied:  
`    {
      "sku": "000001",
      "name": "Full coverage insurance",
      "category": "insurance",
      "price": {
          "original": 89000,
          "final": 62300,
          "discount_percentage": "30%",
          "currency": "EUR"
      }
    }`
  
  Example product without a discount:
  
      `{
        "sku": "000002",
        "name": "Compact Car X3",
        "category": "vehicle",
        "price": {
            "original": 89000,
            "final": 89000,
            "discount_percentage": null,
            "currency": "EUR"
        }
      }`
      
## Dataset.       
The following dataset is the only dataset you need to be able to serve on the API: 

`{
    "products": [
      {
        "sku": "000001",
        "name": "Full coverage insurance",
        "category": "insurance",
        "price": 89000
      },
      {
        "sku": "000002",
        "name": "Compact Car X3",
        "category": "vehicle",
        "price": 99000
      },
      {
        "sku": "000003",
        "name": "SUV Vehicle, high end",
        "category": "vehicle",
        "price": 150000
      },
      {
        "sku": "000004",
        "name": "Basic coverage",
        "category": "insurance",
        "price": 20000
      },
      {
        "sku": "000005",
        "name": "Convertible X2, Electric",
        "category": "vehicle",
        "price": 250000
      }
    ]
  }`


# Instructions

##### Clone Repository

```
git clone git@github.com:fordbedia/api-requirements.git
```

#####  Install Dependency packages
```composer install```

#####  Generate keys
```php artisan key:generate```

##### Run migration and seeder
```php artisan migrate --seed```


##### Endpoints
```/api/products?category=insurance```

```/api/products?price=<min>,<max>```
```/api/products?price=2000,81486```

##### Sample returned dataset
```json
{
    "products": [
        {
            "sku": "000005",
            "name": "numquam",
            "category": "Insurance",
            "price": {
                "original": 41707,
                "final": 29194.9,
                "currency": "EUR",
                "discount_percentage": "30%"
            }
        },
        {
            "sku": "0000014",
            "name": "quo",
            "category": "Insurance",
            "price": {
                "original": 25956,
                "final": 18169.2,
                "currency": "EUR",
                "discount_percentage": "30%"
            }
        },
        {
            "sku": "0000015",
            "name": "ut",
            "category": "Insurance",
            "price": {
                "original": 53023,
                "final": 37116.1,
                "currency": "EUR",
                "discount_percentage": "30%"
            }
        },
        {
            "sku": "0000018",
            "name": "doloribus",
            "category": "Insurance",
            "price": {
                "original": 44931,
                "final": 31451.7,
                "currency": "EUR",
                "discount_percentage": "30%"
            }
        }
    ]
}
```

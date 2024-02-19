# Project Name

Pornhub Pornstars

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)

## Introduction

This project is a web application designed to fetch data from a specific URL and present it to users in a paginated
format. It provides a convenient way to browse through a large dataset.
## Features



- **Data Retrieval:** Fetches data from a specifc URL.
- **Pagination:** Displays the data across multiple pages for easier navigation.

## Installation

To run this project using Docker Compose, follow these steps:
1. Clone the repository to your local machine:
```
 git clone https://github.com/gpapanikolaou/phitems.git
```

This command will clone the repository to your current directory.

2. Navigate to the project directory:
```
cd project
```
3. Navigate to the src directory:
```
cd src/
```
4. To install the necessary dependencies for this project, you'll need to use Composer. If you haven't already installed Composer, you can do so by following the instructions on the [official Composer website](https://getcomposer.org/).

Once Composer is installed, to the src/ directory in your terminal run the following command:

```
composer install
```

5. Before running the project, you'll need to set up your environment variables. Start by copying the `.env-example` file to `.env`:

```
cp .env.example .env
```

6. Before running the Laravel application, you need to generate an application key. Navigate to the src/ directory of your Laravel project in your terminal and run the following command:

```
php artisan key:generate
```

7. Start the Docker containers using Docker Compose on your project directory:
```
docker-compose up -d
```
This command will build the Docker images and start the containers in detached mode.

8. Create a symbolic link from the storage directory to the public directory:
```
docker exec phpPHItems php artisan storage:link
```
9. Access the application in your web browser at `http://localhost:8088`

## Testing

This project includes unit tests to ensure the integrity and functionality of the codebase. You can run the tests locally using PHPUnit.

### Running Tests

To run the unit tests, execute the following command from the project root:

```
docker exec phpPHItems php artisan test
```


## Usage

Here's an example of how to use this project:
1. Open your web browser.
2. Navigate to `http://localhost:8088`.
3. You will see the homepage of the application.
4. Use the search feature to search for specific items.
5. Navigate through the paginated results to view more items.

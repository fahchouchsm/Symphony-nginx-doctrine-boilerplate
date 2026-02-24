# Symfony E-Commerce Project

## Overview
This is a Symfony-based e-commerce project that allows users to manage a variety of products, handle orders, and provide a seamless shopping experience.

## Requirements
- PHP >= 8.2
- Symfony 7.4
- Docker and Docker Compose

## Docker Setup
This project comes with a predefined Docker setup, which includes:
- **Nginx** running on port `8081`
- **MySQL** running on port `3307`

### Getting Started
1. Clone the repository:
    ```bash
    git clone https://github.com/fahchouchsm/ecom-symfony.git
    cd ecom-symfony
    ```
2. Build and run the Docker containers:
    ```bash
    docker-compose up --build
    ```
3. Access the application in your web browser:
    [http://localhost:8081](http://localhost:8081)

4. Create and load the database schema:
    ```bash
    docker-compose exec php bin/console doctrine:schema:update --force
    ```

## Basic Run Instructions
- Use `docker-compose up` to start the environment.
- Run the Symfony commands inside the PHP container using:
    ```bash
    docker-compose exec php bin/console <command>
    ```

## License
This project is licensed under the MIT License.
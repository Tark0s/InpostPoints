# Symfony 6.x Inpost API Integration

This project is written in PHP using the Symfony 6.4 framework. It integrates with the Inpost (ShipX) API to search for parcel pickup points in a given city. The project follows Object-Oriented Programming (OOP) principles and uses the Command design pattern in Symfony. Additionally, the application provides a simple HTML form for searching pickup points with validation and data transformation.

## Table of Contents

- [Project Description](#project-description)
- [Requirements](#requirements)
- [Installation](#installation)
- [How to Use](#how-to-use)
    - [CLI Command](#cli-command)
    - [HTML Form](#html-form)

## Project Description

This project integrates with the Inpost (ShipX) API to search for parcel pickup points based on a city name. The application fetches data from the API, deserializes the JSON response, and maps it to PHP objects. A command-line interface (CLI) is used to interact with the API, and an HTML form allows searching for pickup points based on street, city, and postal code.

### Features:
1. **Inpost API Integration** - Fetch parcel pickup points based on the city.
2. **JSON Deserialization** - Map API data to PHP objects.
3. **CLI Command** - Search for pickup points through the command line.
4. **HTML Form** - Web interface for searching pickup points with validation and data transformation.

## Requirements

Make sure you have the following tools installed to run this project:

- PHP 8.x+
- Symfony 6.4
- Composer
- Web browser (for the HTML form part)
- PHPUnit (for unit tests)

## Installation

1. Clone the repository:

    ```bash
    git https://github.com/Tark0s/InpostPoints.git
    cd inpost-points
    ```

2. Install dependencies using Composer:

    ```bash
    composer install
    ```

3. Make sure all required packages are installed:

    - Symfony Serializer
    - Symfony HTTP Client
    - Symfony Form

## How to Use

### CLI Command

The application allows you to run a CLI command that queries the Inpost API and returns a list of parcel pickup points.

1. Run the following command in the terminal:

    ```bash
    php bin/console app:fetch-inpost-resources points Kozy
    ```

    - `points` - the resource (e.g., `points`).
    - `Kozy` - the city (e.g., `Kozy`).


2. The application will display the API response dump, deserialized into PHP objects.

### HTML Form

The project also provides a web form for searching pickup points based on street, city, and postal code:

1. Navigate to the form page in your browser:

    ```plaintext
    http://localhost:8000
    ```

2. Fill out the form and submit it to search for pickup points.

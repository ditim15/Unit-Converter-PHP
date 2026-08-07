# Unit Converter App
This is the repository for a fullstack unit converter web application made using PHP, HTML, and CSS.

## Features
- **Length Conversion** - millimeters, centimeters, meters, kilometers, inches, feet, yards, and miles
- **Temperature conversion** - Celsius, Fehrenheit, and Kelvin (wiht validation preventing values less than absolute zero)
- **Weight Conversion** - milligrams, grams, kilograms, ounces, pounds

Each conversion type uses a base unit (meters for length, Kelvin for temperature, grams for weight)
to keep the conversion logic simple and consistent.

## Tech Stack
- **Backend:** PHP
- **Frontend:** HTML, CSS

## Project Structure
```bash
.
|-- header.php          # Shared page header
|-- footer.php          # Shared page footer
|-- length.php          # Length conversion page (default)
|-- weight.php          # Weight conversion page
|-- temperature.php     # Temperature conversion page
|-- style.css           # Site-wide styling
```

## Requirements
- PHP 8.x or later


### Running the App
 
From the project directory, start PHP's built-in development server:
 
```bash
php -S localhost:8000
```
 
Then visit `http://localhost:8000` in your browser. The index page redirects automatically to the length converter.
 
> **Note:** PHP's built-in server is for local development only. For production, use a proper web server like Apache or Nginx.
 
## Usage
 
1. Select a conversion type from the navigation bar.
2. Enter a value and choose the units to convert from and to.
3. Click **Convert** to see the result.
## How Conversions Work
 
Each conversion normalizes the input to a base unit before converting to the target:
 
- **Length** → converted to and from meters using a lookup table
- **Temperature** → converted to and from Kelvin via dedicated functions, with a check to prevent values below absolute zero (0K / -273.15°C / -459.67°F)
- **Weight** → converted to and from grams
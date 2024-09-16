# Laravel API Assessment Project

## Project Overview
This project demonstrates a Laravel-based API for managing products and categories, implementing various features such as authentication, search functionality, and admin controls.

## Setup Instruction changes

**Important Note:** The `docker-compose.yml` file has been changed to the default Laravel 11 configuration due to hardware compatibility issues. If you encounter any boot problems, please restore the original file.

## Features Implemented

1. **Database Structure:**
   - Created products table with required fields (name, code, internal_notes).
   - Created categories table with required fields.

2. **Data Seeding:**
   - Implemented factories to seed both products and categories tables with mock data.

3. **Model Relationships:**
   - Established many-to-many relationship between products and categories.

4. **API Endpoints:**
   - Created an endpoint to view and search products with pagination.
   - Search functionality checks across name, code, and category fields.
   - Implemented parameter validation for API requests.

5. **Performance & Security:**
   - Applied throttling middleware on the product search endpoint.
   - Throttling settings are configurable via the config file.

6. **Authentication:**
   - Implemented bearer token authentication using Laravel Sanctum.
   - Protected admin routes with authentication.

7. **Admin Functionality:**
   - Created endpoints for adding and removing products and categories.

8. **API Documentation:**
   - Cataloged all endpoints with mock data in Insomnia.
   - Included an Insomnia export file for easy testing.

## Testing the API

To test the API endpoints:
1. Import the provided Insomnia collection.
2. Set up an environment in Insomnia with the following JSON:
   ```json
   {
     "api_url": "http://localhost/api"
   }
   ```
3. Use the imported collection to test various endpoints.

## Future Improvements

Given more time, the following enhancements could be made:
1. Fully integrate policies with admin controllers for more granular access control.
2. Refine error responses and add more comprehensive fallback controls to ensure consistent JSON responses across all scenarios.
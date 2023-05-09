## Laravel 9 Servicing digitization Project

This is a Servicing digitization project built with Laravel 9 that features CRUD operations for posts, categories, subcategories, comments, replies, likes, and tags. The project is designed to allow users to easily create and manage their own blog content, as well as interact with other users by commenting, liking, and filtering posts.

## Getting Started

To get started with the project, follow these steps:

## Prerequisites

Before you can use this project, you will need to have the following installed on your machine:

- PHP 7.4 or later
- Composer
- MySQL 5.7 or later

## Installation

To install the project, follow these steps:

1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Run 'composer install' to install the project dependencies.
4. Create a '.env' file by copying the '.env.example' file and updating the database settings to match your MySQL database credentials.
5. Generate an application key by running 'php artisan key:generate'.
6. Migrate the database schema by running 'php artisan migrate'.
7. (Optional) Seed the database with sample data by running 'php artisan db:seed'.

## Usage

To use the project, follow these steps:

1. Start the development server by running 'php artisan serve'.
2. Navigate to 'http://localhost:8000' in your web browser to view the home page.
3. Register a new user account by clicking on the "Register" link in the navigation bar.
4. Log in to your account by clicking on the "Login" link in the navigation bar.
5. Create a new post by clicking on the "Create Post" link in the navigation bar. Here you can create a post by providing a title, content, selecting a category, subcategory, and tags.
6. View, edit, or delete existing posts by clicking on the post title on the home page or by visiting /posts/{post} where {post} is the post ID.
7. Filter posts by tag, category, or subcategory by clicking on the corresponding link in the navigation bar. This will show you all the posts that are tagged with a particular tag, belong to a certain category, or belong to a specific subcategory.
8. Like or unlike a post by clicking on the "Like" or "Unlike" button on the post page.
9. Add comments to a post by scrolling to the bottom of the post page and submitting the comment form. Here you can add your comment, and you can see all the previous comments on this post.
10. Reply to a comment by clicking on the "Reply" button next to the comment and submitting the reply form. Here you can reply to a particular comment.

## Features

The project has the following features:

## Posts

- Create, read, update, and delete blog posts
- Filter posts by tag, category, or subcategory
- Like and unlike posts
- View a post and its comments

## Categories
- Create, read, update, and delete categories
- Categorize posts into categories
- View all posts in a particular category

## Subcategories

- Create, read, update, and delete subcategories
- Categorize posts into subcategories
- View all posts in a particular subcategory

## Comments

- Add comments to a post
- View all comments on a post
- Reply to comments
- View replies to comments

## Likes

- Like and unlike posts

## Tags

- Create, read, update, and delete tags
- Categorize posts into tags

## Technologies Used

The project was built using the following technologies:

- Laravel 9: A powerful PHP web framework for building web applications
- MySQL: A relational database management system
- Blade Templating Engine: A simple yet powerful templating engine provided with Laravel
- Bootstrap 5: A popular CSS framework for building responsive and mobile-first websites
- SCSS: A popular CSS preprocessor for writing modular and maintainable CSS
- JavaScript: A programming language used for creating interactive and dynamic web pages
- jQuery: A fast and feature-rich JavaScript library for DOM manipulation and AJAX calls
- Livewire: A full-stack framework for building dynamic and reactive web interfaces in Laravel

## Contributing

If you want to contribute to the project, feel free to create a pull request with your changes. Before creating a pull request, please make sure that your changes are tested and comply with the project's coding standards.

## License
This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgments
This project was inspired by various personal blogging platforms, such as WordPress, Medium, and Ghost. The project would not have been possible without the amazing Laravel community and its contributors.

## Contact
If you have any questions or comments about the project, feel free to contact me at [toufikshima98@gmail.com].

## Troubleshooting

If you encounter any issues with the project, here are some common problems and solutions:

- <h3> Database migrations fail to run: </h3> Make sure that you have configured your database settings correctly in the .env file. You can also try running php artisan migrate:rollback to rollback any previously executed migrations and then run php artisan migrate again.
- <h3> Application key not set: </h3> If you see an error message stating that the application key is not set, run php artisan key:generate to generate a new application key.
- <h3> Login or registration not working:</h3>  Make sure that your MySQL database is properly configured and that you have run the database migrations. Also, make sure that you have enabled the necessary authentication routes and middleware in your routes/web.php file.
- <h3> CSS or JavaScript not loading: </h3> Make sure that your web server is configured to serve static assets correctly. You can also try running php artisan config:cache to clear the configuration cache.

## Conclusion

This README file provides a brief overview of the Laravel 9 personal blog project, its features, and how to get started with it. With this project, you can easily create and manage your own blog content, interact with other users, and filter posts by category, subcategory, and tag. If you have any questions or comments about the project, feel free to contact me at [toufikshima98@gmail.com].

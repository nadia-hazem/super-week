<div align="center" id="top"> 
  <img src="./.github/app.gif" alt="Super Week" />

  &#xa0;

  <!-- <a href="https://superweek.netlify.app">Demo</a> -->
</div>

<h1 align="center">Super Week</h1>

<p align="center">
  <img alt="Github top language" src="https://img.shields.io/github/languages/top/nadia-hazem/super-week?color=56BEB8">

  <img alt="Github language count" src="https://img.shields.io/github/languages/count/nadia-hazem/super-week?color=56BEB8">

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/nadia-hazem/super-week?color=56BEB8">

  <img alt="License" src="https://img.shields.io/github/license/nadia-hazem/super-week?color=56BEB8">

  <!-- <img alt="Github issues" src="https://img.shields.io/github/issues/nadia-hazem/super-week?color=56BEB8" /> -->

  <!-- <img alt="Github forks" src="https://img.shields.io/github/forks/nadia-hazem/super-week?color=56BEB8" /> -->

  <!-- <img alt="Github stars" src="https://img.shields.io/github/stars/nadia-hazem/super-week?color=56BEB8" /> -->
</p>

<!-- Status -->

<!-- <h4 align="center"> 
	🚧  Super Week 🚀 Under construction...  🚧
</h4> 

<hr> -->

<p align="center">
  <a href="#dart-about">About</a> &#xa0; | &#xa0; 
  <a href="#sparkles-features">Features</a> &#xa0; | &#xa0;
  <a href="#rocket-technologies">Technologies</a> &#xa0; | &#xa0;
  <a href="#white_check_mark-requirements">Requirements</a> &#xa0; | &#xa0;
  <a href="#checkered_flag-starting">Starting</a> &#xa0; | &#xa0;
  <a href="#memo-license">License</a> &#xa0; | &#xa0;
  <a href="https://github.com/nadia-hazem" target="_blank">Author</a>
</p>

<br>

## :dart: About ##

During this year of training, many notions were seen in the projects. Today it is time to take up this knowledge one by one in order to make sure that you are as comfortable as possible with all these notions.
This Runtrack breaks down into 9 progressive tasks + a "go further" for more.

## :sparkles: Features ##

:heavy_check_mark: MVC architecture;\
:heavy_check_mark: Altorouter routes;\
:heavy_check_mark: Fetch, async, await functions;\
:heavy_check_mark: Bootstrap css;

## :rocket: Technologies ##

The following tools were used in this project:

- [Composer](https://getcomposer.org/)
- [Altorouter](https://altorouter.com/)
- [Faker](https://fakerphp.github.io/)


## :white_check_mark: Requirements ##

Install Composer: Composer must be installed on your machine. To do this, go to the official Composer website [Composer](https://getcomposer.org/) and follow the installation instructions for your operating system.

Clone project: Clone the project from Github using the command

```bash
git clone.
````

## :checkered_flag: Starting ##

1. Install dependencies with Composer: Once you have cloned the project, you can install the required dependencies with Composer by running the following command at the root of your project:

````bash
composer install
````

This command will install the dependencies specified in the composer.json file, including Altoututer.

2. Configure the autoloader: When you have installed your dependencies with Composer, an autoloader file is automatically generated to load the classes of your project. Make sure this file is properly included in your project, either by using Composer's auto-generated autoload or by including the autoloader file manually.

3. Verify file paths: Verify that the file paths for Altorouter classes and files are correct in your code. If necessary, adjust the path definitions in your composer.json file if the files were not installed in the vendor/ folder.

4. Test your project: You can now test the project by running the local web server for your project and verifying that everything is working correctly.

## :hourglass: Jobs

### JOB_00
Initialize a new git super-week project and make commits at each past step.

### JOB_01
create a new branch
“feature/router” and switch to it.
Install a router on your project to have clean URLs and start a project with a good base.
As soon as the router is installed in your project, make a commit.
You can then import your router into an index.php file in the root of your project. Don't forget to use composer's autoloader to retrieve the
altorouter class. Once that's in place, make a commit.
Once your router is set up, do a few tests to make sure your router is working.

- “/”: displays a page in which with a first level title that says Welcome to the homepage.
- “/users”: displays a page with a top-level title that says Welcome to the Users list.
- “/users/1”: display a page with a top level title that says Welcome to User 1's page where the number varies depending on what is present in the URI.
When all your tests work, commit again to save your progress. Push your work to github and pull request from origin feature/router to main or master depending on your base branch name.

### JOB_01.5
Now that we have a router, we can start setting up our database to prepare the rest:
● A user table:
   ○ id, int
   ○ email, varchar(255)
   ○ first_name, varchar(255)
   ○ last_name, varchar(255)
● A book table:
   ○ id, int
   ○ title, varchar(255)
   ○ content, text
   ○ id_user, int

### JOB_02.1
Switch to your main or master branch and pull your latest changes.
Create a new **feature/project-design** branch and switch to it.
We have a database, we have a router, we are ready to develop our application. For this we will start to structure our folders with a **src/** folder at the root of our project. In this folder we will add 3 sub-folders: **Model/**, **Controller/**, **View/**.
The Model folder will contain all the classes that will make queries to the database. All classes in this folder will have the **App\Model** namespace.
The Controller folder will contain all the classes that will do the various checks and manipulations on the data sent to Models or retrieved from it. All classes in this folder will have the namespace **App\Controller**.
The View folder will contain all the template files that display information to the user. There will be no classes a priori in this folder.
Remember to update your composer.json file to add the “App” namespace to your autoloader.
Make a commit and push your branch to the repo, make a pull request as before, and pull all changes to your main or master branch.

### JOB_02.2
Switch to your main or master branch and pull your latest changes.
Create a new **feature/first-route** branch and switch to it.

Once this is done, we will make a **route** to retrieve all the users of our application. For that:
- Map a new route **/users**
- Instantiate a new **UserController**
- Create and call the **list method** of your UserController
- In this method, instantiate a new **UserModel**
- Launch a method **findAll** which retrieves all the users present in the database and returns them in the form of an associative array to the controller.
- With your Controller, return your array by encoding it in **JSON** format.
- And in your index echo your return.

For each of the steps described above, make commits.
Make a final commit and push your branch to the repo, make a pull request as before, and pull all changes to your main or master branch.

### JOB_02.3
Switch to your main or master branch and pull your latest changes.
Create a new **feature/register** branch and switch to it.
Why not register our users with a form?

Do a route **/register** with the verb **GET** to display a registration form. The file containing the HTML for this form must be in a php file
````php
src/View/register.php”
````

At each validated step, make a commit.
Then do another **/register** route with the **POST** verb to process the form with a **register()** method in the **AuthController**. This method will need to instantiate a **UserModel** in order to check if the user does not already exist and also to insert the registered user into the database.
At each validated step, make a commit.
Make a final commit and push your branch to the repo, make a pull request as before, and pull all changes to your main or master branch.

Once the database is created, you can start populating your database with fake data in phpmyadmin so you can play around with it a bit.

### JOB_02.4
Switch to your main or master branch and pull your latest changes.
Create a new **feature/login** branch and switch to it.
Use the same principle for the connection with two **/login** routes, one with the **GET** verb and one with the **POST** verb.
For each step, make commits.
Make a final commit and push your branch to the repo, make a pull request as before, and pull all changes to your main or master branch.

## :memo: License ##

This project is under license from MIT. For more details, see the [LICENSE](LICENSE.md) file.


Made with :heart: by <a href="https://github.com/nadia-hazem" target="_blank">nadia-hazem</a>

&#xa0;

<a href="#top">Back to top</a>

# BlogPreview – Custom WordPress Theme

## overview
**BlogPreview** is a lightweight, responsive custom WordPress theme created.

## Folder Structure

blogpreview-theme/
│
├── assets/
│   ├── css/
│   │   └── main.css
│   ├── images/
│   │   └── coffeeslogo.png
│   └── js/
│       └── main.js
│
├── template-parts/
│   ├── blog-slider.php
│   └── post-card.php
│
├── functions.php
├── header.php
├── footer.php
├── index.php
├── page-about.php
├── page-my-blogs.php
├── single.php
├── style.css
├── screenshot.png
└── README.md

## style.css
-added comment **Theme Name: Blog Preview Theme** theme is created and need to active the theme
-screenshot.png will get added theme's image display

## Header 
-logo on the left(default img->assets/css/images) and primary menu on right (my coffee blogs,about) and Dark Mode
-responsive toggle menu on mobile and for all the media screens
-Dark Mode Toggle - on initial loads white

## Index.php
-will display 2 sections
--slider ->displays 3 popular (WP_Query 3)posts build using get_template_part [blog-slider.php]
--latest blog posts ->displays 5 (WP_Query 5)posts build using get_template_part [post-card.php]
--load more will display next set of blogs

## blog-slider.php(template)
-displays latest 3 posts (WP_Query 3)
--image ,title,excerpt (range -15) 
--slider controls ->prev slide and next slide and dots functionality

## template-parts/post-card.php
-post-card with
--image(added feature can use mg->assets/css/images)but added images in media,title,date,category,excerpt(range -20) 
  readmore(will navigate to selected post page[single.php])

## template-parts/page-my-blogs.php
-this will open the My Coffee Blogs Page (menu)
--will list all the posts here (WP_Query -1)

## single.php
-will display the selected post page
--heading,published date,category,image and content
--added 2 buttons previous post and next post(will navigate to the respective post page)
--back to all posts button (navigates to My Coffee Blogs Menu Page)

## page-about.php
-display the content for about

## functions.php
-display dynamic heading all pages
-Enqueue styles and scripts and ajax
-backend logic for ajax load more

## js/main.js
-Dark Mode Functionality
-Mobile menu toggle functionality
-Blog slider functionality
-frontend logic Load more button functionality

## css/main.css
-css for entire website and no inline css used

## footer.php
fooer will display dynamic footer with copyright


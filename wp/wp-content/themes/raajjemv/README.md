# RaajjeMV WordPress Theme

This folder contains a complete custom WordPress theme based on your design references:

- `home page.png`
- `category page.png`
- `article page.png`
- `DESIGN.md`

## Install in XAMPP WordPress

1. Copy the `raajjemv` folder into:
   - `C:\xampp\htdocs\<your-wordpress-site>\wp-content\themes\`
2. In WordPress admin, go to `Appearance > Themes` and activate **RaajjeMV**.
3. Go to `Settings > Reading`:
   - Set a static front page (create a page like "Home" first).
   - Assign a posts page if you want a blog index.
4. Go to `Appearance > Menus`:
   - Create a menu and assign it to **Primary Menu**.
5. Add widgets in `Appearance > Widgets` to:
   - **Left Rail**
   - **Right Rail**
6. Create categories and posts with featured images to populate homepage/category/article layouts.

## Included Templates

- `front-page.php` - homepage with hero + record sections
- `category.php` - category archive layout
- `single.php` - article detail layout
- `home.php` / `index.php` - stream/fallback layouts
- `page.php` - static pages
- `comments.php` - comment section

## Theme Features

- Dynamic WordPress loops (posts/categories)
- Custom menu support
- Widgetized side rails
- Post thumbnails support
- Editorial typography (Newsreader + Public Sans)
- Design-system inspired color/surface structure with no border aesthetic

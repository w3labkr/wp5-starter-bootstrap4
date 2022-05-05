# WP Starter Bootstrap4
This is a WordPress starter theme built for developers.
And based on the [WP-Starter-Theme](https://github.com/w3labkr/wp-starter-theme).


## Feature

bootstrap4, one-column, two-columns, three-columns, left-sidebar, right-sidebar, microdata, schema, post-views, embed-youtube-parameter, w3-validator, auto-enqueue-script-versioning, clean-menu-class, change-upload-filename, browser-upgrade-message, noscript-warning-message, fixed-navbar, breadcrumb, post-navigation, custom-post-type-support-by-template



## Theme Structure
```
o
`-- wp-starter-theme/
    |-- assets/
    |   |-- css/
    |   |-- font/
    |   |   `-- fontawesome/
    |   |-- img/
    |   |-- js/
    |   |-- json/
    |   `-- vendor/
    |       |-- bootstrap/
    |       |-- html5shiv/
    |       |-- jquery/
    |       |-- respond/
    |       `-- selectivizr/
    |-- includes/
    |   |-- admin/
    |   |   `-- metabox/
    |   |-- bootstrap4/
    |   |-- classes/
    |   `-- shortcode/
    |-- languages/
    |-- modules/
    |-- template-parts/
    `-- template-posts/
```

## Outline
Markup Validation Service is based on [Nu Html Checker](https://validator.w3.org).

### Heading-level Outline
```
o
`-- h1 Site Title
    |-- h2 Site Navigation
    |-- h2 Breadcrumb Navigation
    |-- h2 Secondary
    |   `-- h3 Site Sidebar Widget 1
    |-- h2 Primary
    |   |-- h3 Section
    |   |-- h3 Comments
    |   `-- h3 Pager
    `-- h2 Tertiary
        `-- h3 Site Sidebar Widget 2
```

### Structural Outline
```
o
`-- Site Title
    |-- Site Navigation
    |-- Breadcrumb Navigation
    |-- Secondary
    |   `-- Site Sidebar Widget 1
    |-- Primary
    |   |-- Section
    |   |-- Comments
    |   `-- Pager
    `-- Tertiary
        `-- Site Sidebar Widget 2
```

## Methods Summary

| Function                      | Parameter                                                      | Description                            |
| ----------------------------- | -------------------------------------------------------------- | -------------------------------------- |
| starter_enqueue_style         | $handle, $src='', $deps=array(), $version='', $media='all'     | Last modified time as version to css   |
| starter_enqueue_script        | $handle, $src='', $deps=array(), $version='', $in_footer=false | Last modified time as version to js    |
| starter_set_post_view         |                                                                | Set post views for track               |
| starter_get_post_view         | $post_id=''                                                    | Track post views                       |
| starter_the_post_view         | $post_id=''                                                    | Track post views                       |
| starter_the_post_navigation   | $args=array(), $skin=''                                        | Infinite post navigation               |
| starter_the_breadcrumb        | $skin=''                                                       | Displays a Bootstrap4 breadcrumb       |
| starter_the_fetch_feed        | $feed, $maxitem, $cache, $skin=''                              | Displays a feed content                |
| starter_get_the_id            |                                                                | Get current post, page and taxonomy id |
| starter_get_the_slug          |                                                                | Get current post, page and taxonomy id |
| starter_get_the_excerpt       | $charlength=150                                                |                                        |
| starter_is_plugin_active      | $plugin                                                        | Detect Active Plugin                   |
| starter_is_active_sidebar     | $id=''                                                         |                                        |
| starter_is_search_has_results |                                                                | Conditional tag search-no-results      |
| starter_array_sort            | $array, $field, $order=SORT_ASC                                | Array Sort for php                     |


## Classes Summary

| Class                              | Description                                                   |
| ---------------------------------- | ------------------------------------------------------------- |
| Starter                            | WP Starter Theme's Class                                      |
| Starter_Autoloader                 | Registers a function to be autoloaded.                        |
| Starter_Breadcrumb                 | Displays a Breadcrumb based on permalink structure            |
| Starter_Enqueue_Script             | Add last modified time as version to css and js               |
| Starter_Feed                       | Displays a feed content                                       |
| Starter_Image                      | Reinit Default Image Setting                                  |
| Starter_Post_Navigation            | Displays page links for paginated posts                       |
| Starter_Post_View                  | Track post views                                              |
| Starter_Script_Loader_Tag          | Filters the HTML script tag of an enqueued script.            |
| Starter_Search_Form                | Generate custom search form                                   |
| Starter_Sidebar                    | Change widget title from H1 to H3                             |
| Starter_Upload                     | Change Filenames for Uploads                                  |
| Starter_Video                      | Add Custom Parameters to Youtube Video oEmbeds                |
| Starter_W3                         | Remove Type attribute script and style tags for wordpress     |
| Starter_Walker_Menu                | Clean Html Menu Walker                                        |
| Starter_Walker_Page                | Clean Html Page Walker                                        |
| Starter_Walker_Page_Sitemap        | Clean Html Page Sitemap Walker                                |
| Starter_Admin_Bar_Menu             | Remove the WordPress Logo and others from the admin bar       |
| Starter_Admin_Bar_Show             | Remove the WordPress Logo and others from the admin bar       |
| Starter_Admin_Dashboard            | Remove a widget from the dashboard screen                     |
| Starter_Admin_Notice               | Disable Admin Notices WordPress                               |
| Starter_Admin_Posttype_Support     | Add and remove support for a feature from a post type         |
| Starter_Admin_Update               | Hide all WordPress update notifications in dashboard          |
| Starter_Metabox_Remove             | Removes a meta box                                            |
| Starter_Admin_Posttype_Support     | Add and remove support for a feature from a post type         |
| Starter_Admin_Dashboard            | Remove a widget from the dashboard screen                     |
| Starter_Bootstrap4_Breadcrumb      | Displays a Bootstrap4 Breadcrumb                              |
| Starter_Bootstrap4_Feed            | Displays a feed content                                       |
| Starter_Bootstrap4_Walker_Menu     | Clean Html Menu Walker for Bootstrap4                         |
| Starter_Bootstrap4_Paginate        | Retrieve paginated link for archive post pages for bootstrap4 |
| Starter_Bootstrap4_Post_Navigation | Displays page links for paginated posts for bootstrap4        |
| Starter_Bootstrap4_Search_Form     | Generate custom search form for bootstrap4                    |


## Support Browser
IE10+, Edge, Chrome, Firefox, Opera, Safari


## Changelog
Please see [CHANGELOG](/CHANGELOG) for more information what has changed recently.



## License
The GNU General Public License v2.0. Please see [License File](/LICENSE) for more information.


## Reference
[HTML5 BOILERPLATE](https://html5boilerplate.com/)
[Schema.org](https://schema.org/)
[Markup Validation Service](https://validator.w3.org/)
[Underscores](https://underscores.me/)
[HTML5 Starter Template](https://github.com/w3labkr/html5-starter-template)
[WP Starter Theme](https://github.com/w3labkr/wp-starter-theme)

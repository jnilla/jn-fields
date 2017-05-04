# jnfields (Jnilla Fields) - V 1.0.0

Joomla! content plugin to create custom fields for articles, modules and menu items.

## Abstract:

This is a work in proggress, feel free to use it, collaborate, report issues or request new features. We don't have any release schedule or planification "yet", we will release/update as soon as we require/desire. 

## How To

After installation find the folder: <code>plugins/content/jnfields/forms</code>. Create the custom fiels inside a regular Joomla! xml form file. the file will be loaded automatically if it meets the following file name formats:

* Articles
  * Add by article id: 
   * Format: <code>article-id--{id}.xml</code>
   * Example: <code>article-id--99.xml</code>
 * Add by article alias: 
   * Format: <code>article-alias--{alias}.xml</code>
   * Example: <code>article-alias--lorem.xml</code>
 * Add by article category id: 
   * Format: <code>article-cid--{cid}.xml</code>
   * Example: <code>article-cid--99.xml</code>
 * Add by article category alias: 
   * Format: <code>article-calias--{cid}.xml</code>
   * Example: <code>article-calias--lorem.xml</code>
   * Note: Two or more categories may use the same alias, if this causes problems use "cpath" instead.
 * Add by article category path:
   * Format: <code>article-cpath--{cpath}.xml</code>
   * Example: 1 level category example: <code>article-cpath--lorem.xml</code>
   * Example: 2 levels category example: <code>article-cpath--lorem|ipsum.xml</code>
 * Add to all:
   * Format: <code>article--all.xml</code>
* Menu Items
  * Add by menu item id: 
   * Format: <code>menu-item-id--{id}.xml</code>
   * Example: <code>menu-item-id--99.xml</code>
 * Add by menu item alias: 
   * Format: <code>menu-item-alias--{alias}.xml</code>
   * Example: <code>menu-item-alias--lorem.xml</code>
   * Note: Two or more menu items may use the same alias, if this causes problems use "path" instead.
 * Add by menu item path:
   * Format: <code>menu-item-path--{path}.xml</code>
   * Example: 1 level path example: <code>menu-item-path--lorem.xml</code>
   * Example: 2 levels path example: <code>menu-item-path--lorem|ipsum.xml</code>
 * Add to all:
   * Format: <code>menu-item--all.xml</code>
* Modules
  * Add by module id: 
   * Format: <code>module-id--{id}.xml</code>
   * Example: <code>module-id--99.xml</code>
 * Add by module type:
   * Format: <code>module-type--{type}.xml</code>
   * Example: <code>module-type--mod_custom.xml</code>
   * Example: <code>module-type--mod_articles_category.xml</code>
   * Example: <code>module-type--mod_menu.xml</code>
 * Add to all:
   * Format: <code>module--all.xml</code>


## Development

Lorem ipsum...

## How to collaborate

Lorem ipsum...

## Change log

Lorem ipsum...

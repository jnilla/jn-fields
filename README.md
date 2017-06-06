# Jnilla Fields - V 1.1.0

Joomla! content plugin to create custom fields for articles, modules and menu items.

## Abstract

This is a work in proggress, feel free to use it, collaborate, report issues or request new features. We don't have any release schedule or planification "yet", we will release/update as soon as we require/desire.

Why this plugin and not the default Joomla! custom fields: The target audience for this plugin are developers, this plugin offers more flexibility and lets you add custom fields to menu items, modules and articles.

## How To

Create your custom form files at <code>plugins/content/jnfields/custom-forms/</code>. The form file will be loaded automatically if it meets the following name formats:

* Articles
 * load form by form name
   * Format: <code>article-form-name={name}.xml</code>
   * Example: <code>article-form-name=lorem.xml</code>
 * load form by alias
   * Format: <code>article-alias={alias}.xml</code>
   * Example: <code>article-alias=lorem.xml</code>
 * load form by category path
   * Format: <code>article-category-path={path}.xml</code>
   * Example: 1 level category example: <code>article-category-path=lorem.xml</code>
   * Example: 2 levels category example: <code>article-category-path=lorem+ipsum.xml</code>
 * load form by parent category path
   * Format: <code>article-parent-category-path={path}.xml</code>
   * Example: 1 levels parent path example: <code>article-parent-category-path=lorem.xml</code>
   * Example: 2 levels parent path example: <code>article-parent-category-path=lorem+ipsum.xml</code>
 * load form for all
   * Format: <code>article-all.xml</code>
* Menu Items
 * load form by form name
   * Format: <code>menu-item-form-name={name}.xml</code>
   * Example: <code>menu-item-form-name=lorem.xml</code>
 * load form by alias
   * Format: <code>menu-item-alias={alias}.xml</code>
   * Example: <code>menu-item-alias=lorem.xml</code>
 * load form by menu type
   * Format: <code>menu-item-menu-type={menu-type}.xml</code>
   * Example: <code>menu-item-menu-type=lorem.xml</code>
 * load form by path
   * Format: <code>menu-item-path={path}.xml</code>
   * Example: 1 level path example: <code>menu-item-path=lorem.xml</code>
   * Example: 2 levels path example: <code>menu-item-path=lorem+ipsum.xml</code>
 * load form by parent category path
   * Format: <code>>menu-item-path={path}.xml</code>
   * Example: 1 levels parent path example: <code>>menu-item-parent-path=lorem.xml</code>
   * Example: 2 levels parent path example: <code>>menu-item-parent-path=lorem+ipsum.xml</code>
 * load form for all
   * Format: <code>menu-item-all.xml</code>
* Modules
  * load form by form name
   * Format: <code>module-form-name={name}.xml</code>
   * Example: <code>module-form-name=lorem.xml</code>
 * load form by type
   * Format: <code>module-type={type}.xml</code>
   * Example: <code>module-type=mod_custom.xml</code>
   * Example: <code>module-type=mod_articles_category.xml</code>
   * Example: <code>module-type=mod_menu.xml</code>
 * load form for all
   * Format: <code>module-all.xml</code>

We suggest to use the forms at <code>plugins/content/jnfields/core-forms/</code> as template or exmaple for your new forms. Do not modify this form files create a copy instead.

## Development

Fork it up bro!

## Change log

* V 1.1.0 - 2017-06-01
  * New folder to store custom forms "custom-forms"
  * Now works on frontend and backend
  * Added support to load custom fields for articles, menu items and modules by the core field form name
  * Added support to load custom fields by article parent category path
  * Added support to load custom fields by menu item parent path
  * Added support to load custom fields by menu item menu type
  
  
  
  
  
  
  

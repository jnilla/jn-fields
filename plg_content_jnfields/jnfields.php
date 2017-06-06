<?php
/**
 * @copyright   Copyright (C) 2017 jnilla.com. All rights reserved.
 * @license     GNU General Public License version 2 or later; see http://www.gnu.org/licenses/gpl-2.0.html
 * @credits     Check credits.html included in this package or repository for a full list of credits
 */

defined('_JEXEC') or die;


/**
 * Jnilla Fields content plugin class.
 *
 */
class PlgContentJnFields extends JPlugin {

	/**
	 * Constructor
	 *
	 * @access      protected
	 * @param       object  $subject The object to observe
	 * @param       array   $config  An array that holds the plugin configuration
	 */
	public function __construct(& $subject, $config){
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	// content prepare form event
	public function onContentPrepareForm($form, $data){
		// check if object is a form
		if (!($form instanceof JForm)){
			$this->_subject->setError('JERROR_NOT_A_FORM');
			return false;
		}

		// init
		JForm::addFormPath(__DIR__.'/core-forms');
		JForm::addFormPath(__DIR__.'/custom-forms');
		$app = JFactory::getApplication();
		$input = $app->input;
		$id = $input->get('id', '', 'int');

		// articles
		if ($form->getName() == "com_content.article"){
			// init
			$article = self::getArticleData($id);
			$cid = $article['catid'];
			$alias = $article['alias'];
			$category = self::getCategoryData($cid);
			$calias = $category['alias'];
			$cpath = $category['path'];
			$cpath = explode("/", $cpath);
			$pcpath = array_slice($cpath, 0, count($cpath)-1);
			$cpath = implode("+", $cpath);
			$pcpath = implode("+", $pcpath);
			$attribs = new JRegistry($article['attribs']);
			$fname = trim($attribs->get('jn_form_name'));

			// load form by form name
			$form->loadFile("article-form-name=$fname", false);
			// load form by alias
			$form->loadFile("article-alias=$fname", false);
			// load form by category path
			$form->loadFile("article-category-path=$cpath", false);
			// load form by parent category path
			$form->loadFile("article-parent-category-path=$pcpath", false);
			// load form for all
			$form->loadFile("article-all", false);

			return true;
		}

		// menu items
		if ($form->getName() == "com_menus.item"){
			$item = self::getMenuItemData($id);
			$alias = $item['alias'];
			$path = $item['path'];
			$path = explode("/", $path);
			$ppath = array_slice($path, 0, count($path)-1);
			$path = implode("+", $path);
			$ppath = implode("+", $ppath);
			$mtype = $item['menutype'];
			$params = new JRegistry($item["params"]);
			$fname = trim($params->get('jn_form_name'));

			// load form by form name
			$form->loadFile("menu-item-form-name=$fname", false);
			// load form by alias
			$form->loadFile("menu-item-alias=$alias", false);
			// load form by menu type
			$form->loadFile("menu-item-menu-type=$mtype", false);
			// load form by path
			$form->loadFile("menu-item-path=$path", false);
			// load form by parent path
			$form->loadFile("menu-item-parent-path=$ppath", false);
			// load form for all
			$form->loadFile("menu-item-all", false);
		}

		// modules
		if ($form->getName() == "com_modules.module"){
			$module = self::getModuleData($id);
			$type = $module['module'];
			$params = new JRegistry($module["params"]);
			$fname = trim($params->get('jn_form_name'));

			// load form by form name
			$form->loadFile("module-form-name=$fname", false);
			// load form by type
			$form->loadFile("module-type=$type", false);
			// load form for all
			$form->loadFile("module-all", false);
		}
	}


	// get extension data by id
	private function getModuleData($id){
		if(is_null($id) || empty($id)) return;

		$db = JFactory::getDBO();
		$db->setQuery("
			SELECT *
			FROM #__modules
			WHERE id = $id
		");
		$db->query();
		$row = $db->loadAssoc();
		return $row;
	}


	// get article data by id
	private function getArticleData($id){
		if(is_null($id) || empty($id)) return;

		$db = JFactory::getDBO();
		$db->setQuery("
			SELECT *
			FROM #__content
			WHERE id = $id
		");
		$db->query();
		$row = $db->loadAssoc();
		return $row;
	}


	// get category data by id
	private function getCategoryData($id){
		if(is_null($id) || empty($id)) return;

		$db = JFactory::getDBO();
		$db->setQuery("
			SELECT *
			FROM #__categories
			WHERE id = $id
			");
		$db->query();
		$row = $db->loadAssoc();
		return $row;
	}


	// get menu item data by id
	private function getMenuItemData($id){
		if(is_null($id) || empty($id)) return;

		$db = JFactory::getDBO();
		$db->setQuery("
			SELECT *
			FROM #__menu
			WHERE id = $id
		");
		$db->query();
		$row = $db->loadAssoc();
		return $row;
	}


}









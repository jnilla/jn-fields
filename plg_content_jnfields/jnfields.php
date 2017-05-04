<?php
/**
 * @copyright   Copyright (C) 2013 opensourcefortress.com. All rights reserved.
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
	 * @var string extension name
	 */
	protected $extensionName = "plg_content_honda";


	/**
	 * Constructor
	 *
	 * @access      protected
	 * @param       object  $subject The object to observe
	 * @param       array   $config  An array that holds the plugin configuration
	 */
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}


	// TODO set comment here
	public function onContentPrepareData($context, $data)
	{
		//
	}


	// TODO add desc
	public function onContentPrepareForm($form, $data){
		$app = JFactory::getApplication();
		if ($app->isAdmin()){
			JForm::addFormPath(__DIR__ . '/forms');
			$input = $app->input;
			$id = $input->get('id');

			// check if object is a form
			if (!($form instanceof JForm)){
				$this->_subject->setError('JERROR_NOT_A_FORM');
				return false;
			}

			// articles
			if ($form->getName() == "com_content.article"){
				// init
				$article = self::getArticleData($id);
				$cid = $article['catid'];
				$alias = $article['alias'];
				$category = self::getCategoryData($cid);
				$calias = $category['alias'];
				$cpath = $category['path'];
				$cpath = str_replace ("/" , "|" , $cpath);

				// load by article id
				$form->loadFile("article-id--$id", false);
				// load by article alias
				$form->loadFile("article-alias--$alias", false);
				// load by category id
				$form->loadFile("article-cid--$cid", false);
				// load by category alias
				$form->loadFile("article-calias--$calias", false);
				// load by category path
				$form->loadFile("article-cpath--$cpath", false);
				// load all
				$form->loadFile("article--all", false);

				return true;
			}

			// menu items
			if ($form->getName() == "com_menus.item")
			{
				$item = self::getMenuItemData($id);
				$alias = $item['alias'];
				$path = $item['path'];
				$path = str_replace ("/" , "|" , $path);

				// load by id
				$form->loadFile("menu-item-id--$id", false);
				// load by alias
				$form->loadFile("menu-item-alias--$alias", false);
				// load by path
				$form->loadFile("menu-item-path--$path", false);
				// load all
				$form->loadFile("menu-item--all", false);
			}

			// modules
			if ($form->getName() == "com_modules.module"){
				$module = self::getModuleData($id);
				$type = $module['module'];

				// load by id
				$form->loadFile("module-id--$id", false);
				// load by name
				$form->loadFile("module-type--$type", false);
				// load all
				$form->loadFile("modules--all", false);
			}

		}
	}


	// get extension data by id
	private function getModuleData($id){
		if(is_null($id)) return;

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
		if(is_null($id)) return;

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
		if(is_null($id)) return;

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
		if(is_null($id)) return;

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









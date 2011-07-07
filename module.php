<?php
/**
 * @version $Id: module.php 734 2010-10-06 07:24:28Z roosit $
 * @package Abricos
 * @subpackage Export
 * @copyright Copyright (C) 2008 Abricos. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @author Alexander Kuzmin (roosit@abricos.org)
 */

/**
 * Модуль "Прайс-лист интернет магазина" 
 */
class ExportModule extends CMSModule {
	
	private $_manager;
	
	function __construct(){
		$this->version = "0.1";
		$this->name = "export";
		$this->takelink = "export";
		
		$this->permission = new ExportPermission($this);
	}
	
	/**
	 * Получить менеджер
	 *
	 * @return ExportManager
	 */
	public function GetManager(){
		if (is_null($this->_manager)){
			require_once 'includes/manager.php';
			$this->_manager = new ExportManager($this);
		}
		return $this->_manager;
	}
	
	
	public function GetContentName(){
		$adress = $this->registry->adress;
		$cname = "";
		
		if($adress->level > 2){
			switch($adress->dir[1]){
				case 'print':
					$cname = "print";
					break;
			}
		}
		return $cname;
	}
}

class ExportAction {
	const VIEW			= 10;
	const ADMIN			= 50;
}

class ExportPermission extends CMSPermission {
	
	public function ExportPermission(ExportModule $module){
		$defRoles = array(

			new CMSRole(ExportAction::VIEW, 1, User::UG_GUEST),
			new CMSRole(ExportAction::VIEW, 1, User::UG_REGISTERED),
			new CMSRole(ExportAction::VIEW, 1, User::UG_ADMIN),
			
			new CMSRole(ExportAction::ADMIN, 1, User::UG_ADMIN)
		);
		parent::CMSPermission($module, $defRoles);
	}
	
	public function GetRoles(){
		return array(
			ExportAction::VIEW => $this->CheckAction(ExportAction::VIEW),
			ExportAction::ADMIN => $this->CheckAction(ExportAction::ADMIN) 
		);
	}
}

$mod = new ExportModule();
CMSRegistry::$instance->modules->Register($mod);

?>
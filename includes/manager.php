<?php
/**
 * @version $Id$
 * @package Abricos
 * @subpackage Export
 * @copyright Copyright (C) 2008 Abricos. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @author Alexander Kuzmin (roosit@abricos.org)
 */

// require_once 'dbquery.php';

class ExportManager extends ModuleManager {
	
	/**
	 * 
	 * @var ExportModule
	 */
	public $module = null;
	
	/**
	 * User
	 * @var User
	 */
	public $user = null;
	public $userid = 0;
	
	private $_disableRoles = false;
	
	public function ExportManager(ExportModule $module){
		parent::ModuleManager($module);
		
		$this->user = CMSRegistry::$instance->modules->GetModule('user');
		$this->userid = $this->user->info['userid'];
	}
	
	public function DisableRole(){
		$this->_disableRoles = true; 
	}
	
	public function IsAdminRole(){
		return $this->module->permission->CheckAction(ExportAction::ADMIN) > 0;
	}
	
	public function IsViewRole(){
		return $this->module->permission->CheckAction(ExportAction::VIEW) > 0;
	}

	/*
	public function DSProcess($name, $rows){
		$p = $rows->p;
		$db = $this->db;
		
		switch ($name){
			case '': return;
		}
	}
	
	public function DSGetData($name, $rows){
		$p = $rows->p;
		switch ($name){
			case '': return $this->ExportList();
		}
	}
	
	public function AJAX($d){
		switch($d->do){
			case "": return $this->ExportSave($d->export);
		}
		return null;
	}
	/**/
	
	
	
}

?>
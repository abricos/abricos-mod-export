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

class ExportManager extends Ab_ModuleManager {
	
	/**
	 * 
	 * @var ExportModule
	 */
	public $module = null;
	
	private $_disableRoles = false;
	
	public function __construct(ExportModule $module){
		parent::__construct($module);
	}
	
	public function DisableRole(){
		$this->_disableRoles = true; 
	}
	
	public function IsAdminRole(){
		return $this->IsRoleEnable(ExportAction::ADMIN);
	}
	
	public function IsViewRole(){
		return $this->IsRoleEnable(ExportAction::VIEW);
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
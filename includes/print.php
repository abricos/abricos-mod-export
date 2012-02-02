<?php
/**
 * @version $Id$
 * @package Abricos
 * @subpackage Print
 * @copyright Copyright (C) 2008 Abricos. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 * @author Alexander Kuzmin (roosit@abricos.org)
 */

$adress = Abricos::$adress;

$mod = Brick::$modules->GetModule($adress->dir[2]);
if (empty($mod)){ return; }

$prms = array();
for ($i=4;$i<count($adress->dir);$i++){
	array_push($prms, $adress->dir[$i]);
}
$page = $adress->dir[3];

$manager = $mod->GetManager();
if (!method_exists($manager, "ExportToPrinter")){
	return;
} 

Brick::$builder->brick->param->var['page'] = $manager->ExportToPrinter($page, $prms);

?>
<?php
/* <one line to give the program's name and a brief idea of what it does.>
 * Copyright (C) 2013 ATM Consulting <support@atm-consulting.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

/**
 *	\file		lib/mymodule.lib.php
 *	\ingroup	mymodule
 *	\brief		This file is an example module library
 *				Put some comments here
 */

function fraisdeportAdminPrepareHead()
{
    global $langs, $conf;

    $langs->load("fraisdeport@fraisdeport");

    $h = 0;
    $head = array();

    $head[$h][0] = dol_buildpath("/fraisdeport/admin/admin_fraisdeport.php", 1);
    $head[$h][1] = $langs->trans("Settings");
    $head[$h][2] = 'settings';
    $h++;
    $head[$h][0] = dol_buildpath("/fraisdeport/admin/fdp.php?type=AMOUNT", 1);
    $head[$h][1] = $langs->trans("Price");
    $head[$h][2] = 'AMOUNT';
    $h++;

	if(!empty($conf->global->FRAIS_DE_PORT_USE_WEIGHT)) {
	    $head[$h][0] = dol_buildpath("/fraisdeport/admin/fdp.php?type=WEIGHT", 1);
	    $head[$h][1] = $langs->trans("Weight");
	    $head[$h][2] = 'WEIGHT';
	    $h++;

	}

	if(!empty($conf->global->FRAIS_DE_PORT_USE_TRANSPORT)) {
	    $head[$h][0] = dol_buildpath("/fraisdeport/admin/import_tarifs.php", 1);
	    $head[$h][1] = $langs->trans("ImportTarifTransport");
	    $head[$h][2] = 'Transport';
	    $h++;

	    $head[$h][0] = dol_buildpath("/fraisdeport/admin/grilles.php", 1);
	    $head[$h][1] = $langs->trans("Grilles");
	    $head[$h][2] = 'GrillesTransport';
	    $h++;
	}

    $head[$h][0] = dol_buildpath("/fraisdeport/admin/import.php", 1);
    $head[$h][1] = $langs->trans("Import");
    $head[$h][2] = 'import';
    $h++;

// la page n'a jamais été faite, vu que le module va subir une refonte elle sera refaite à ce moment là
//    $head[$h][0] = dol_buildpath("/fraisdeport/admin/about.php", 1);
//    $head[$h][1] = $langs->trans("About");
//    $head[$h][2] = 'about';
//    $h++;

    // Show more tabs from modules
    // Entries must be declared in modules descriptor with line
    //$this->tabs = array(
    //	'entity:+tabname:Title:@mymodule:/mymodule/mypage.php?id=__ID__'
    //); // to add new tab
    //$this->tabs = array(
    //	'entity:-tabname:Title:@mymodule:/mymodule/mypage.php?id=__ID__'
    //); // to remove a tab
    complete_head_from_modules($conf, $langs, new stdClass(), $head, $h, 'mymodule');

    return $head;
}

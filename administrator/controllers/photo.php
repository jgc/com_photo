<?php
/**
 * @version     1.0.0
 * @package     com_photo
 * @copyright   Copyright (C) 2013 FalcoAccipiter. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      FalcoAccipiter <admin@falcoaccipiter.com> - http://www.falcoaccipiter.com
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Photo controller class.
 */
class PhotoControllerPhoto extends JControllerForm
{

    function __construct() {
        $this->view_list = 'photos';
        parent::__construct();
    }

}
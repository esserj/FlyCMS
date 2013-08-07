<?php
/**
 * AbstractFlyCmsController.php file
 * 
 * PHP Version 5
 * 
 * @category   ${category}
 * @package    Inventis
 * @subpackage Bricks
 * @author     Inventis Web Architects <info@inventis.be>
 * @license    Copyright © Inventis BVBA  - All rights reserved
 * @link       https://github.com/Inventis/Bricks
 */


namespace FlyCMS\Controller;

use FlyCMS\User\Entity\User;
use Zend\Mvc\Controller\AbstractActionController as BaseActionController;

class AbstractActionController extends BaseActionController{

    /**
     * @return User
     */
    public function identity()
    {
        if (!$this->zfcUserAuthentication()->hasIdentity()) {
            return null;
        }
        return $this->zfcUserAuthentication()->getIdentity();
    }
}
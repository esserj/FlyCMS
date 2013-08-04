<?php
/**
 * FlyCmsExtension.php file
 * 
 * PHP Version 5
 *
 * @package    FlyCMS
 * @subpackage Twig
 * @author     Jan Esser
 * @link       https://github.com/esserj/FlyCMS
 */


namespace FlyCMS\Twig\Extension;

use \Twig_Extension;
use \Twig_SimpleFilter;
use \Twig_SimpleFunction;

class FlyCms extends Twig_Extension{

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'fly-cms';
    }

    /**
     * Fly CMS supports custom view filters that are returned
     * these are mainly php functions considered valuable in the views
     * as sometimes you cannot control the objects passed into views
     * and thus cannot ensure these objects possess functionality to achieve
     * similar goals
     * @return array
     */
    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter('get_class', 'get_class'),
        );
    }

    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('is_a', 'is_a'),
        );
    }
}
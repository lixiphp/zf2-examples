<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Albumorm\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Helper for escaping values
 */
class Escape extends AbstractHelper
{
    public function __invoke($name = null, $params = array(), $options = array(), $reuseMatchedParams = false) {
        if( is_string($name) ) {
            return $this->escape( $name ) ;
        }
        return null;
    }

    /**
     * Escape a value for current escaping strategy
     *
     * @param  string $value
     * @return string
     */
    protected function escape($value)
    {
        $result = htmlspecialchars($value);
        return $result;
    }
}

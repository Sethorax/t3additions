<?php

namespace Sethorax\T3additions\ViewHelpers\Utility;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Class ReadGetParameterViewHelper
 * @package Sethorax\T3additions\ViewHelpers
 */
class ReadGetParameterViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * Return GET parameter by name
     *
     * @param string $param
     */
    public function render($param) {
        if (isset($_GET[$param])) {
            return $_GET[$param];
        } else {
            return 'undefined';
        }
    }
}
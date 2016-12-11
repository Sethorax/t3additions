<?php

namespace Sethorax\T3additions\ViewHelpers\Format;

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
 * Class StripHtmlTagsViewHelper
 * @package Sethorax\T3additions\ViewHelpers
 */
class StripHtmlTagsViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * Strips html from a string with the option to whitelist tags
     *
     * @param string $html
     * @param string $tagWhitelist
     * @return string
     */
    public function render($html, $tagWhitelist = '') {
        return strip_tags($html, $tagWhitelist);
    }
}
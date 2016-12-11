<?php

namespace Sethorax\T3additions\ViewHelpers;

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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Class IncludeRelFileViewHelper
 * @package Sethorax\T3additions\ViewHelpers
 */
class IncludeJSLibViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * Includes a JS Library
     *
     * @param string $name
     * @param string $uri
     * @param bool $async
     * @param string $integrity
     */
    public function render($name, $uri, $async = false, $integrity = '') {
        $includeFilesUtility = GeneralUtility::makeInstance(\Sethorax\T3additions\Utility\IncludeFilesUtility::class);

        $includeFilesUtility->addJSLib($name, $uri, $async, $integrity);
    }
}
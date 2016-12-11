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
class IncludeRelFileViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    /**
     * Includes a static file
     *
     * @param string $file
     * @param string $type
     * @return string
     */
    public function render($file, $type) {
        $includeFilesUtility = GeneralUtility::makeInstance(\Sethorax\T3additions\Utility\IncludeFilesUtility::class);
        $extPath = ExtensionManagementUtility::extRelPath('t3additions');

        switch ($type) {
            case 'js':
                $includeFilesUtility->addJSFile($extPath . $file, true);
                break;

            case 'css':
                $includeFilesUtility->addCSSFile($extPath . $file);
                break;
        }

        return '';
    }
}
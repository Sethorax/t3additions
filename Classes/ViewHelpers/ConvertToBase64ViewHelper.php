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
 * Class ConvertToBase64ViewHelper
 * @package Sethorax\T3additions\ViewHelpers
 */
class ConvertToBase64ViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
    /**
     * Converts an array of data into a base64 string
     *
     * @param array $data
     * @return string
     */
    public function render($data) {
        return base64_encode(json_encode($data));
    }
}
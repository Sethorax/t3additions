<?php

namespace Sethorax\T3additions\Utility;

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

/**
 * Class IncludeFilesUtility
 * @package Sethorax\T3additions\Utility
 */
class IncludeFilesUtility {

    /**
     * Include a JS Library only if it was not included by the user
     *
     * @param string $name
     * @param string $path
     * @param bool $async
     * @param string $integrity
     * @return void
     */
    public function addJSLib ($name, $path, $async, $integrity) {
        $objectManager = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $pageRenderer = $objectManager->get(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $typoScriptSetup = $GLOBALS['TSFE']->tmpl->setup;
        $jsLibFound = false;

        $typoScriptJSArrays = [
            $typoScriptSetup['page.']['includeJSLibs.'],
            $typoScriptSetup['page.']['includeJS.'],
            $typoScriptSetup['page.']['includeJSFooter.'],
            $typoScriptSetup['page.']['includeJSFooterlibs.']
        ];

        foreach ($typoScriptJSArrays as $jsArray) {
            if ($jsArray !== null) {
                foreach ($jsArray as $jsFile) {
                    if (is_string($jsFile)) {
                        if (strpos(strtolower($jsFile), strtolower($name)) !== false) {
                            $jsLibFound = true;
                            break;
                        }
                    }
                }

                if ($jsLibFound) {
                    break;
                }
            }
        }

        if (!$jsLibFound) {
            $pageRenderer->addJsFooterLibrary($name, $path, 'text/javascript', true, true, '', false, '|', $async, $integrity);
        }
    }

    /**
     * Includes a JavaScript file
     *
     * @param string $file
     * @param bool $async
     * @return void
     */
    public function addJSFile($file, $async) {
        $objectManager = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $pageRenderer = $objectManager->get(\TYPO3\CMS\Core\Page\PageRenderer::class);

        $pageRenderer->addJsFooterFile($file, 'text/javascript', true, true, '', false, '|', $async, '');
    }

    /**
     * Includes a CSS file
     *
     * @param string $file
     * @return void
     */
    public function addCSSFile($file) {
        $objectManager = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $pageRenderer = $objectManager->get(\TYPO3\CMS\Core\Page\PageRenderer::class);

        $pageRenderer->addCssFile($file);
    }
}
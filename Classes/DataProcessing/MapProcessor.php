<?php

namespace Sethorax\T3additions\DataProcessing;

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
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;
use Sethorax\T3additions\Domain\Repository\MarkerRepository;

/**
 * Class MapProcessor
 * @package Sethorax\T3additions\DataProcessing
 */
class MapProcessor implements DataProcessorInterface {

    /**
     * @var MarkerRepository
     */
    private $markerRepository;

    /**
     * @var array
     */
    private $markers;

    /**
     * Process data for Content Element "Map"
     *
     * @param ContentObjectRenderer $cObj
     * @param array $contentObjectConfiguration
     * @param array $processorConfiguration
     * @param array $processedData
     * @return array
     */
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData) {
        $objectManager = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $this->markerRepository = $objectManager->get(MarkerRepository::class);

        $this->markers = $this->markerRepository->findByParentId($cObj->data['uid']);

        $processedData['markers'] = $this->markers;
        $processedData['jsonData'] = $this->convertMapConfigToJson($processedData);

        return $processedData;
    }

    /**
     * Converts map config to json string
     *
     * @param array $processedData
     * @return string
     */
    private function convertMapConfigToJson($processedData) {
        $mapConf = [];

        foreach ($processedData['data'] as $key => $value) {
            if (strpos($key, 't3additions_map') !== false) {
                $mapConf[$this->camelizeString($key)] = $value;
            }
        }

        $mapConf['markerData'] = [];

        foreach ($this->markers as $marker) {
            $data = [];
            $data['data'] = $marker->getAll();

            array_push($mapConf['markerData'], $data);
        }

        try {
            return json_encode($mapConf);
        } catch (Exception $e) {
            return '{"error": "failed to parse json"}';
        }

    }

    /**
     * Turns underscored string to camelized version
     *
     * @param string $string
     * @return string
     */
    private function camelizeString($string) {
        return lcfirst(
            implode(
                '',
                array_map(
                    'ucfirst',
                    array_map(
                        'strtolower',
                        explode(
                            '_', $string)))));
    }
}
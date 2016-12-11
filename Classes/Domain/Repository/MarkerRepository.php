<?php

namespace Sethorax\T3additions\Domain\Repository;

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

use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * Repository for marker objects
 * @package Sethorax\T3additions
 */
class MarkerRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    /**
     * Initialize repository
     *
     * @return void
     */
    public function initializeObject() {
        /** @var $querySettings \TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings */
        $querySettings = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);
    }

    /**
     * Get Markers by parent id
     *
     * @param int $parentId
     * @return array \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByParentId($parentId) {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setRespectSysLanguage(false);
        $query->getQuerySettings()->setIgnoreEnableFields(false);

        return $query->matching(
            $query->logicalAnd(
                $query->equals('parent', $parentId),
                $query->equals('deleted', 0)
            ))->execute();
    }
}
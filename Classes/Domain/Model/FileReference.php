<?php
namespace Sethorax\T3additions\Domain\Model;

    /**
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
 * File Reference
 */
class FileReference extends \TYPO3\CMS\Extbase\Domain\Model\FileReference
{

    /**
     * Obsolete when foreign_selector is supported by ExtBase persistence layer
     *
     * @var int
     */
    protected $uidLocal;

    /**
     * @var int
     */
    protected $t3additionsMapNormalWidth;

    /**
     * @var int
     */
    protected $t3additionsMapNormalHeight;

    /**
     * @var int
     */
    protected $t3additionsMapScaledWidth;
    
    /**
     * @var int
     */
    protected $t3additionsMapScaledHeight;


    /**
     * Set File uid
     *
     * @param int $fileUid
     * @return void
     */
    public function setFileUid($fileUid)
    {
        $this->uidLocal = $fileUid;
    }

    /**
     * Get File UID
     *
     * @return int
     */
    public function getFileUid()
    {
        return $this->uidLocal;
    }

    /**
     * @param int $t3additionsMapNormalWidth
     * @return void
     */
    public function setT3additionsMapNormalWidth($t3additionsMapNormalWidth) {
        $this->t3additionsMapNormalWidth = $t3additionsMapNormalWidth;
    }

    /**
     * @return int
     */
    public function getT3additionsMapNormalWidth() {
        return $this->t3additionsMapNormalWidth;
    }

    /**
     * @param int $t3additionsMapNormalHeight
     * @return void
     */
    public function setT3additionsMapNormalHeight($t3additionsMapNormalHeight) {
        $this->t3additionsMapNormalHeight = $t3additionsMapNormalHeight;
    }

    /**
     * @return int
     */
    public function getT3additionsMapNormalHeight() {
        return $this->t3additionsMapNormalHeight;
    }

    /**
     * @param int $t3additionsMapScaledWidth
     * @return void
     */
    public function setT3additionsMapScaledWidth($t3additionsMapScaledWidth) {
        $this->t3additionsMapScaledWidth = $t3additionsMapScaledWidth;
    }

    /**
     * @return int
     */
    public function getT3additionsMapScaledWidth() {
        return $this->t3additionsMapScaledWidth;
    }

    /**
     * @param int $t3additionsMapScaledHeight
     * @return void
     */
    public function setT3additionsMapScaledHeight($t3additionsMapScaledHeight) {
        $this->t3additionsMapScaledHeight = $t3additionsMapScaledHeight;
    }

    /**
     * @return int
     */
    public function getT3additionsMapScaledHeight() {
        return $this->t3additionsMapScaledHeight;
    }
}

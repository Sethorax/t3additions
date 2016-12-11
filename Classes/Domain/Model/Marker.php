<?php

namespace Sethorax\T3additions\Domain\Model;

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
 * Marker model
 * @package Sethorax\T3additions
 */
class Marker extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
    /**
     * @var \DateTime
     */
    protected $crdate;

    /**
     * @var \DateTime
     */
    protected $tstamp;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $lat;

    /**
     * @var string
     */
    protected $lng;

    /**
     * @var string
     */
    protected $uri;

    /**
     * @var string
     */
    protected $uriTitle;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Sethorax\T3additions\Domain\Model\FileReference>
     */
    protected $icon;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var int
     */
    protected $l10nParent;


    /**
     * Return all properties
     *
     * @return string
     */
    public function getAll()
    {
        $iconData = [];
        $allProps = get_object_vars($this);
        $icon = $this->getIcon()->current();

        if ($icon !== null) {
            $iconData['path'] = 'fileadmin' . $icon->getOriginalResource()->getIdentifier();
            $iconData['width'] = $icon->getT3additionsMapNormalWidth();
            $iconData['height'] = $icon->getT3additionsMapNormalHeight();
            $iconData['scaledWidth'] = $icon->getT3additionsMapScaledWidth();
            $iconData['scaledHeight'] = $icon->getT3additionsMapScaledHeight();
        }

        $allProps['icon'] = $iconData;
        $allProps['htmlDescription'] = <<<HTML
<div class="t3additions-map-infowindow">
    <div class="inner">
        <div class="title">
            <span class="label"><b>{$this->getTitle()}</b></span>
        </div>
        <div class="description">{$this->getDescription()}</div>
        <div class="cta-button">
            <a href="{$this->getUri()}" title="{$this->getUriTitle()}" target="_blank">{$this->getUriTitle()}</a>
        </div>
    </div>
</div>
HTML;


        return $allProps;
    }

    /**
     * Get creation date
     *
     * @return int
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * Set creation date
     *
     * @param int $crdate creation date
     * @return void
     */
    public function setCrdate($crdate)
    {
        $this->crdate = $crdate;
    }

    /**
     * Get timestamp
     *
     * @return int
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * Set timestamp
     *
     * @param int $tstamp timestamp
     * @return void
     */
    public function setTstamp($tstamp)
    {
        $this->tstamp = $tstamp;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle($title) {
        $this->name = $title;
    }

    /**
     * @return string
     */
    public function getLat() {
        return $this->lat;
    }

    /**
     * @param string $lat
     * @return void
     */
    public function setLat($lat) {
        $this->lat = $lat;
    }

    /**
     * @return string
     */
    public function getLng() {
        return $this->lng;
    }

    /**
     * @param string $lng
     * @return void
     */
    public function setLng($lng) {
        $this->lng = $lng;
    }

    /**
     * @return string
     */
    public function getUri() {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return void
     */
    public function setUri($uri) {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getUriTitle()
    {
        return $this->uriTitle;
    }

    /**
     * @param string $uriTitle
     */
    public function setUriTitle($uriTitle) {
        $this->uriTitle = $uriTitle;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage$icon
     * @return void
     */
    public function setIcon(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $icon) {
        $this->icon = $icon;
    }

    /**
     * @param \Sethorax\T3additions\Domain\Model\FileReference $icon
     */
    public function addIcon(\Sethorax\T3additions\Domain\Model\FileReference $icon) {
        if ($this->getIcon() === null) {
            $this->icon = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        }
        $this->icon->attach($icon);
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Set sys language
     *
     * @param int $sysLanguageUid
     * @return void
     */
    public function setSysLanguageUid($sysLanguageUid)
    {
        $this->_languageUid = $sysLanguageUid;
    }

    /**
     * Get sys language
     *
     * @return int
     */
    public function getSysLanguageUid()
    {
        return $this->_languageUid;
    }

    /**
     * Set l10n parent
     *
     * @param int $l10nParent
     * @return void
     */
    public function setL10nParent($l10nParent)
    {
        $this->l10nParent = $l10nParent;
    }

    /**
     * Get l10n parent
     *
     * @return int
     */
    public function getL10nParent()
    {
        return $this->l10nParent;
    }
}
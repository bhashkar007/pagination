<?php
/**
 * Pagination plugin for Craft CMS 3.x
 *
 * Pagination plugin for Craft 3

 *
 * @link      http://hashtagerrors.com
 * @copyright Copyright (c) 2019 Hashtag Errors
 */

namespace hashtagerrors\pagination\assetbundles\Pagination;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Hashtag Errors
 * @package   Pagination
 * @since     1.0.0
 */
class PaginationAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@hashtagerrors/pagination/assetbundles/pagination/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Pagination.js',
        ];

        $this->css = [
            'css/Pagination.css',
        ];

        parent::init();
    }
}

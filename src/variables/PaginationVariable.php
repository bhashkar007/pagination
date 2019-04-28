<?php
/**
 * Pagination plugin for Craft CMS 3.x
 *
 * Pagination plugin for Craft 3

 *
 * @link      http://hashtagerrors.com
 * @copyright Copyright (c) 2019 Hashtag Errors
 */

namespace hashtagerrors\pagination\variables;

use hashtagerrors\pagination\Pagination;

use Craft;
use craft\web\View;

/**
 * @author    Hashtag Errors
 * @package   Pagination
 * @since     1.0.0
 */
class PaginationVariable
{
    // Public Methods
    // =========================================================================
    public function render($pageInfo, $type = null, array $options = [])
    {
        Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_CP);

        echo Craft::$app->view->renderTemplate('pagination/_render/_paginate', [
            'pageInfo' => $pageInfo,
            'type' => $type,
            'options' => $options,
        ]);
        
        Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_SITE);
    }
}

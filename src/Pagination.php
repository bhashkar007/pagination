<?php
/**
 * Pagination plugin for Craft CMS 3.x
 *
 * Pagination plugin for Craft 3

 *
 * @link      http://hashtagerrors.com
 * @copyright Copyright (c) 2019 Hashtag Errors
 */

namespace hashtagerrors\pagination;

use hashtagerrors\pagination\services\PaginationService as PaginationServiceService;
use hashtagerrors\pagination\variables\PaginationVariable;
use hashtagerrors\pagination\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;

/**
 * Class Pagination
 *
 * @author    Hashtag Errors
 * @package   Pagination
 * @since     1.0.0
 *
 * @property  PaginationServiceService $paginationService
 */
class Pagination extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Pagination
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('pagination', PaginationVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'pagination',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'pagination/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}

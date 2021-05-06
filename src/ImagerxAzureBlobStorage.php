<?php
/**
 * External storage driver for Imager X that integrates with Microsoft Azure blob
 *
 * @link      https://paragonn.com/
 * @copyright Copyright (c) 2021 Shannon McMillan
 */

namespace paragonn\ImagerxAzureBlobStorage;

use Craft;
use yii\base\Event;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use spacecatninja\imagerx\ImagerX;
use spacecatninja\imagerx\events\RegisterExternalStoragesEvent;
use paragonn\ImagerxAzureBlobStorage\externalstorage\AzureStorage;

/**
 * @author    Shannon McMillan
 * @package   ImagerxAzureBlobStorage
 * @since     3.3.0
 *
 */
class ImagerxAzureBlobStorage extends Plugin
{
    public static $plugin;

    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(ImagerX::class, ImagerX::EVENT_REGISTER_EXTERNAL_STORAGES, static function (RegisterExternalStoragesEvent $event) {
            $event->storages['azure'] = AzureStorage::class;
        });
    }
}
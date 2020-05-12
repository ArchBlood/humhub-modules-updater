<?php

use humhub\modules\updater\modules\packageinstaller\Module;
use humhub\modules\updater\Module as BaseModule;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\commands\CronController;
use yii\web\Application;

/** @noinspection MissedFieldInspection */
return [
    'id' => 'updater',
    'class' => BaseModule::class,
    'namespace' => 'humhub\modules\updater',
    'events' => [
        ['class' => AdminMenu::class, 'event' => AdminMenu::EVENT_INIT, 'callback' => [Events::class, 'onAdminMenuInit']],
        ['class' => Application::class, 'event' => Application::EVENT_BEFORE_REQUEST, 'callback' => [Module::class, 'onApplicationInit']],
        ['class' => CronController::class, 'event'  => 'daily', 'callback' => [Events::class, 'onCronRun']],
    ],
];
?>

<?php

use humhub\modules\updater\modules\packageinstaller\Module as PackageModule;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\commands\CronController;
use yii\web\Application;

/** @noinspection MissedFieldInspection */
return [
    'id' => 'updater',
    'class' => Module::class,
    'namespace' => 'humhub\modules\updater',
    'events' => [
        ['class' => AdminMenu::class, 'event' => AdminMenu::EVENT_INIT, 'callback' => [Events::class, 'onAdminMenuInit']],
        ['class' => Application::class, 'event' => Application::EVENT_BEFORE_REQUEST, 'callback' => [PackageModule::class, 'onApplicationInit']],
        ['class' => CronController::class, 'event'  => 'daily', 'callback' => [Events::class, 'onCronRun']],
    ],
];
?>

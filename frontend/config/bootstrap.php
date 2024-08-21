<?php

use yii\base\Event;
use dektrium\user\controllers\SecurityController;

Event::on(SecurityController::class, SecurityController::EVENT_AFTER_AUTHENTICATE, function (\dektrium\user\events\AuthEvent $e) {
    // if user account was not created we should not continue
    if ($e->account->user === null) {
        return;
    }

    // we are using switch here, because all networks provide different sets of data
    switch ($e->client->getName()) {
        case 'facebook':
            $e->account->user->profile->updateAttributes([
                'name' => $e->client->getUserAttributes()['name'],
            ]);
        case 'google':
            $e->account->user->profile->updateAttributes([
                'name' => $e->client->getUserAttributes()['name'],
            ]);
    }

    // after saving all user attributes will be stored under account model
    // Yii::$app->identity->user->accounts['facebook']->decodedData
});
?>

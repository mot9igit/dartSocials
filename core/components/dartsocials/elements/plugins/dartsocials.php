<?php
/** @var modX $modx */
switch ($modx->event->name) {
    case "OnLoadWebDocument":
        $corePath = $modx->getOption('dartsocials_core_path', array(), $modx->getOption('core_path') . 'components/dartsocials/');
        $dartSocials = $modx->getService('dartSocials', 'dartSocials', $corePath . 'model/');
        if (!$dartSocials) {
            $modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not load dartSocials class!');
        }else{
            $dartSocials->initialize($modx->context->key);
        }
        break;
}
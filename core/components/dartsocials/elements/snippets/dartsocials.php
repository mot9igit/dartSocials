<?php
/** @var modX $modx */
/** @var array $scriptProperties */
/** @var dartSocials $dartSocials */
$corePath = $modx->getOption('dartsocials_core_path', array(), $modx->getOption('core_path') . 'components/dartsocials/');
$dartSocials = $modx->getService('dartSocials', 'dartSocials', $corePath . 'model/');
if (!$dartSocials) {
    return 'Could not load dartSocials class!';
}

// Do your snippet code here. This demo grabs 5 items from our custom table.
$tpl = $modx->getOption('tpl', $scriptProperties, 'Item');
$sortby = $modx->getOption('sortby', $scriptProperties, 'name');
$sortdir = $modx->getOption('sortdir', $scriptProperties, 'ASC');
$limit = $modx->getOption('limit', $scriptProperties, 5);
$toPlaceholder = $modx->getOption('toPlaceholder', $scriptProperties, false);

// Build query
$c = $modx->newQuery('dsItems');
$c->sortby($sortby, $sortdir);
$c->where(['active' => 1]);
$c->limit($limit);
$c->select(array("dsItems.*"));

if($c->prepare() && $c->stmt->execute()){
    $items = $c->stmt->fetchAll(PDO::FETCH_ASSOC);
    if($items){
        if($tpl){
            $output = $dartSocials->pdoTools->getChunk($tpl, array("socials" => $items));
            if (!empty($toPlaceholder)) {
                // If using a placeholder, output nothing and set output to specified placeholder
                $modx->setPlaceholder($toPlaceholder, $output);

                return '';
            }else{
                return $output;
            }
        }else{
            echo "<pre>";
            print_r(array("socials" => $items));
            echo "</pre>";
        }
    }
}
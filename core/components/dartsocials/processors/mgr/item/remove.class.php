<?php

class dartSocialsItemRemoveProcessor extends modObjectProcessor
{
    public $objectType = 'dsItems';
    public $classKey = 'dsItems';
    public $languageTopics = ['dartsocials'];
    //public $permission = 'remove';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('dartsocials_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var dartSocialsItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('dartsocials_item_err_nf'));
            }

            $object->remove();
        }

        return $this->success();
    }

}

return 'dartSocialsItemRemoveProcessor';
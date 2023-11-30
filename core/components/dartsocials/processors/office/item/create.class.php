<?php

class dartSocialsOfficeItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'dartSocialsItem';
    public $classKey = 'dartSocialsItem';
    public $languageTopics = ['dartsocials'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('dartsocials_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('dartsocials_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'dartSocialsOfficeItemCreateProcessor';
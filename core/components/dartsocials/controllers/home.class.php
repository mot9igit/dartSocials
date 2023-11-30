<?php

/**
 * The home manager controller for dartSocials.
 *
 */
class dartSocialsHomeManagerController extends modExtraManagerController
{
    /** @var dartSocials $dartSocials */
    public $dartSocials;


    /**
     *
     */
    public function initialize()
    {
        $corePath = $this->modx->getOption('dartsocials_core_path', array(), $this->modx->getOption('core_path') . 'components/dartsocials/');
        $this->dartSocials = $this->modx->getService('dartSocials', 'dartSocials', $corePath . 'model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['dartsocials:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('dartsocials');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->dartSocials->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->dartSocials->config['jsUrl'] . 'mgr/dartsocials.js');
        $this->addJavascript($this->dartSocials->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->dartSocials->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->dartSocials->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->dartSocials->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->dartSocials->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->dartSocials->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        dartSocials.config = ' . json_encode($this->dartSocials->config) . ';
        dartSocials.config.connector_url = "' . $this->dartSocials->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "dartsocials-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="dartsocials-panel-home-div"></div>';

        return '';
    }
}
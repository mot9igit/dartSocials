<?php

class dartSocials
{
    /** @var modX $modx */
    public $modx;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $corePath = $this->modx->getOption('dartsocials_core_path', $config, $this->modx->getOption('core_path') . 'components/dartsocials/');
        $assetsUrl = $this->modx->getOption('dartsocials_assets_url', $config, $this->modx->getOption('assets_url') . 'components/dartsocials/');
        $assetsPath = $this->modx->getOption('dartsocials_assets_path', $config, $this->modx->getOption('base_path') . 'assets/components/dartsocials/');

        $this->config = array_merge([
            'assetsPath' => $assetsPath,
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'processorsPath' => $corePath . 'processors/',
            'version' => '0.0.1',

            'connectorUrl' => $assetsUrl . 'connector.php',
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
        ], $config);

        $this->modx->addPackage('dartsocials', $this->config['modelPath']);
        $this->modx->lexicon->load('dartsocials:default');

        if ($this->pdoTools = $this->modx->getService('pdoFetch')) {
            $this->pdoTools->setConfig($this->config);
        }

    }

    public function initialize($ctx = 'web'){
        if ($ctx != 'mgr' && (!defined('MODX_API_MODE') || !MODX_API_MODE) && !$this->config['json_response']) {
            $config = $this->pdoTools->makePlaceholders($this->config);
            $css = trim($this->modx->getOption('dartsocials_frontend_css'));
            if (!empty($css) && preg_match('/\.css/i', $css)) {
                if (preg_match('/\.css$/i', $css)) {
                    $css .= '?v=' . substr(md5($this->config['version']), 0, 10);
                }
                $this->modx->regClientCSS(str_replace($config['pl'], $config['vl'], $css));
            }
            $js = trim($this->modx->getOption('dartsocials_frontend_js'));
            if (!empty($js) && preg_match('/\.js/i', $js)) {
                if (preg_match('/\.js$/i', $js)) {
                    $js .= '?v=' . substr(md5($this->config['version']), 0, 10);
                }
                $this->modx->regClientScript(str_replace($config['pl'], $config['vl'], $js));

                $js_setting = array(
                    'cssUrl' => $this->config['cssUrl'] . 'web/',
                    'jsUrl' => $this->config['jsUrl'] . 'web/',
                    'ctx' => $ctx
                );

                $data = json_encode($js_setting, true);
                $this->modx->regClientStartupScript(
                    '<script>dartsocialsConfig = ' . $data . ';</script>',
                    true
                );
            }
        }
    }
}
dartSocials.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'dartsocials-panel-home',
            renderTo: 'dartsocials-panel-home-div'
        }]
    });
    dartSocials.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(dartSocials.page.Home, MODx.Component);
Ext.reg('dartsocials-page-home', dartSocials.page.Home);
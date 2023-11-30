dartSocials.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'dartsocials-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('dartsocials') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('dartsocials_items'),
                layout: 'anchor',
                items: [{
                    html: _('dartsocials_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'dartsocials-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    dartSocials.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(dartSocials.panel.Home, MODx.Panel);
Ext.reg('dartsocials-panel-home', dartSocials.panel.Home);

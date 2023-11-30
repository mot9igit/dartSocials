dartSocials.window.CreateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'dartsocials-item-window-create';
    }
    Ext.applyIf(config, {
        title: _('dartsocials_item_create'),
        width: 550,
        autoHeight: true,
        url: dartSocials.config.connector_url,
        action: 'mgr/item/create',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    dartSocials.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(dartSocials.window.CreateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'textfield',
            fieldLabel: _('dartsocials_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        },{
            xtype: 'textfield',
            fieldLabel: _('dartsocials_item_icon'),
            name: 'icon',
            id: config.id + '-icon',
            anchor: '99%',
            allowBlank: true,
        }, {
            xtype: 'modx-combo-browser',
            fieldLabel: _('dartsocials_item_image'),
            name: 'image',
            id: config.id + '-image',
            anchor: '99%',
            allowBlank: true,
        }, {
            xtype: 'textfield',
            fieldLabel: _('dartsocials_item_link'),
            name: 'link',
            id: config.id + '-link',
            anchor: '99%',
            allowBlank: true,
        }, {
            xtype: 'textarea',
            fieldLabel: _('dartsocials_item_description'),
            name: 'description',
            id: config.id + '-description',
            height: 150,
            anchor: '99%'
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('dartsocials_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('dartsocials-item-window-create', dartSocials.window.CreateItem);


dartSocials.window.UpdateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'dartsocials-item-window-update';
    }
    Ext.applyIf(config, {
        title: _('dartsocials_item_update'),
        width: 550,
        autoHeight: true,
        url: dartSocials.config.connector_url,
        action: 'mgr/item/update',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    dartSocials.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(dartSocials.window.UpdateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id',
            id: config.id + '-id',
        }, {
            xtype: 'textfield',
            fieldLabel: _('dartsocials_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textfield',
            fieldLabel: _('dartsocials_item_icon'),
            name: 'icon',
            id: config.id + '-icon',
            anchor: '99%',
            allowBlank: true,
        },{
            xtype: 'modx-combo-browser',
            fieldLabel: _('dartsocials_item_image'),
            name: 'image',
            id: config.id + '-image',
            anchor: '99%',
            allowBlank: true,
        }, {
            xtype: 'textfield',
            fieldLabel: _('dartsocials_item_link'),
            name: 'link',
            id: config.id + '-link',
            anchor: '99%',
            allowBlank: true,
        }, {
            xtype: 'textarea',
            fieldLabel: _('dartsocials_item_description'),
            name: 'description',
            id: config.id + '-description',
            anchor: '99%',
            height: 150,
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('dartsocials_item_active'),
            name: 'active',
            id: config.id + '-active',
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('dartsocials-item-window-update', dartSocials.window.UpdateItem);
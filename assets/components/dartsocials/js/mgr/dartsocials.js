var dartSocials = function (config) {
    config = config || {};
    dartSocials.superclass.constructor.call(this, config);
};
Ext.extend(dartSocials, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('dartsocials', dartSocials);

dartSocials = new dartSocials();
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (
        Component,
        rendererList
    ) {
        'use strict';
        rendererList.push(
            {
                type: 'cryptomus',
                component: 'MageBrains_Cryptomus/js/view/payment/method-renderer/cryptomus-method'
            }
        );
        return Component.extend({});
    }
);
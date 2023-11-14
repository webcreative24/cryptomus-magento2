define(
    [
        'Magento_Checkout/js/view/payment/default',
        'Magento_Checkout/js/action/redirect-on-success',
        'mage/url'
    ],
    function (Component,redirectOnSuccessAction, url) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Cryptomus_Payment/payment/cryptomus'
            },
            getInstructions: function () {
                return window.checkoutConfig.payment.instructions[this.item.method];
            },
            afterPlaceOrder: function () {
                redirectOnSuccessAction.redirectUrl = url.build('cryptomus/payment/redirect');
                this.redirectAfterPlaceOrder = true;
            },
        });
    }
);

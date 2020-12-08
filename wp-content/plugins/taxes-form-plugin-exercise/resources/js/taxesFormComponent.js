/**
 *
 * tax form compoennt
 */
Vue.component('taxes-item', {
    template: '#t-taxes-form-component',
    props: {
        component_url:{
            type: String,
            required: true,
        }
    },
    data: function () {
        return {
            errors:         [],
            tax:            false,
            currency:       null,
            productName:    null,
            nettoPrice:     null,
            taxes:          [23 ,22, 8, 7, 5, 0],
            currencies:     [
                {id: 'pln', suffix: 'PLN'},
                {id: 'euro', suffix: 'EURO'}
            ]
        };
    },
    methods:{
        taxCalculate: function() {
            if(!this.validateFields()) {
               return;
            }

            //todo: move to PHP API
            // let countedTax  = (this.tax * parseFloat(this.nettoPrice))/ 100;
            // let bruttoPrice = parseFloat(this.nettoPrice) + parseFloat(countedTax);
            // let nettoPrice = parseFloat(this.nettoPrice);
            // console.log('TAX: ', countedTax);
            // console.log('Brutto Price: ', bruttoPrice);
            // console.log('Netto Price: ', nettoPrice);

            /**
             * in progress request
             */

            jQuery.ajax({
                method: "POST",
                url: this.component_url,
                data: {
                    tax: this.tax,
                    nettoPrice: this.nettoPrice,
                    productName: this.productName,
                    currency: this.currency,
                    action: 'taxes-form-plugin-exercise',
                    rp: '/product/prices',
                }
            })
                .then(result => {
                    console.log(result);
                })

        },
        validateFields: function(){
            this.errors = [];

            if (this.tax === false) {
                this.errors.push('Tax field is required.');
            }
            if (!this.currency) {
                this.errors.push('Currency field is required.');
            }

            if (!this.productName) {
                this.errors.push('Product Name field is required.');
            }

            if (!this.nettoPrice) {
                this.errors.push('Netto Price field is required.');
            }

            return !(this.errors.length > 0);
        },
        getTaxName: function(tax){
            return tax + ' %';
        },
    }
});

/**
 * vue app instance
 * @type {Vue}
 */
const app = new Vue({
    el: '#taxes-app'
})
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
            ],
            alertData:{},
        };
    },
    methods:{
        taxCalculate: function() {
            if(!this.validateFields()) {
               return;
            }

            const self = this;
            /**
             * in progress request
             */
            fetch(self.component_url, {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: self.getParams()
            })
                .then(response=> response.json())
                .then( data => {self.showProduct(data)})
                .catch(error => {console.log(error);});

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
        getParams: function() {
            let data =  {
                tax: this.tax,
                nettoPrice: this.nettoPrice,
                productName: this.productName,
                currency: this.currency,
                action: 'taxes-form-plugin-exercise',
                rp: '/product/prices',
            };

            return Object.keys(data).map(function(k) {
                return k +'='+ data[k];
            }).join('&');
        },
        showProduct(data){
            this.alertData = data;
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
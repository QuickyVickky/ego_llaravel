export const transferWiseMixin = {
    data(){
        return {
            rateData:'',
        }
    },
    created(){

        // console.log("test");
    },
    methods: {
        getExchangeRates(source,target) {
            try{
                this.$Progress.start();
                axios.get("api/transferwise/exchange-rates/"+source+"/"+target)
                    .then((response) => {
                        if(response.data.Success){
                            console.log("response",response);
                            this.rateData = response.data.Data;
                            console.log("rate: ",this.rateData);
                            this.$Progress.finish();
                        }else{
                            console.log("Error: ",response.data.Message);
                            this.$Progress.fail();
                        }


                    }).catch((error) => {
                    this.$Progress.fail();
                });
            }catch (e) {
                this.$Progress.fail();
                console.log("Error:",e.message);
            }
        },
        exchangeRateCal(rate,sourceAmount){
            let targetAmount = parseInt(rate) * parseInt(sourceAmount);
            return targetAmount;
        },
        getExchangeRatesDirect(source,target) {
            try{
                this.$Progress.start();
                var url = "rate?source="+source+"&target="+target;

                window.axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                window.axios.defaults.headers.common['Access-Control-Allow-Origin'] = 'http://egogram';
                window.axios.defaults.headers.common['Authorization'] = "Bearer " +this.$TRANSFERWISE_API_TOKEN;
                window.axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';

                axios.get(this.$TransferWiseUrl+url)
                    .then((response) => {

                        this.rateData = response.data;
                        console.log("countries: ",this.rateData);
                        this.$Progress.finish();
                    }).catch((error) => {
                        this.$Progress.fail();
                    });
            }catch (e) {
                this.$Progress.fail();
                console.log("Error:",e.message);
            }
        }
    },
    watch: {

    },

}

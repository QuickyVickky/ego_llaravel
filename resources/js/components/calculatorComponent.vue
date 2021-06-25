<template>
    <div class="main">
        <!-- Banner Section  -->
        <section class="banner-section ">
            <form @submit.prevent="calProcess" name="sendForm" id="countryForm" action="">
                <div class="container">
                    <h1 class="big-head text-center mb-50">
                        How much would you like to transfer?
                    </h1>
                    <div class="row justify-content-md-center">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="from_amount" class="form-control" placeholder="You send" v-model.number="sendForm.source_amount">
                                    <div class="input-group-append">
                                        <select class="form-control" v-model="sendForm.source">
                                            <option v-for="(country,index) in countries" :key="index" :value="country.code">{{ country.name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="to_amount" class="form-control" placeholder="Recipient gets" v-model.number="sendForm.target_amount">
                                    <div class="input-group-append">
                                        <select class="form-control" v-model="sendForm.target">
                                            <option v-for="(country,index) in countries" :key="index" :value="country.code">{{ country.name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center justify-content-sm-center">
                        {{ sendForm.source_amount }} {{ rateData.source }} * {{ rateData.rate }} (Exchange Rate)   =  {{ sendForm.target_amount }} {{ rateData.target }}
                    </div>

                    <div class="row justify-content-md-center justify-content-sm-center mt-10">
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</template>


<script>
    import {commonMethodMixin} from "../mixins/commonMethodMixin";
    import {transferWiseMixin} from "../mixins/transferWiseMixin";

    export default {
        mixins: [commonMethodMixin, transferWiseMixin],
        data() {
            return {
                sendForm: {
                    source: 'GB',
                    source_amount:1,
                    target: 'US',
                    target_amount: 0,
                },

            }

        },
        mounted() {

            this.getExchangeRates(this.sendForm.source, this.sendForm.target);
            this.targetAmountCal();

        },
        created() {
            this.getCountry();

            let source = localStorage.getItem('sendForm.from');
            if(source != "" && source != null){
                this.sendForm.source = source;
            }

            let target = localStorage.getItem('sendForm.to');
            if(target != "" && target != null){
                this.sendForm.target = target;
            }

        },
        methods: {
            calProcess(){

            },
            targetAmountCal(){
                if(this.rateData.rate == undefined){
                    return false;
                }
                let targetAmount = this.rateData.rate * this.sendForm.source_amount;
                console.log("targetAmount: ",targetAmount);
                this.sendForm.target_amount = targetAmount;
            }
        },
        watch:{
            "sendForm.source_amount":function () {
                // console.log("rate",this.rateData.rate);
                this.targetAmountCal();
            },
            "sendForm.source":function () {
                this.getExchangeRates(this.sendForm.source, this.sendForm.target);
            },
            "sendForm.target":function () {
                this.getExchangeRates(this.sendForm.source, this.sendForm.target);
            },
            "rateData.rate":function () {
                // console.log("rate",this.rateData.rate);
                this.targetAmountCal();
            }
        }
    }
</script>
<style lang="scss" scoped>
    .mt-10 {
        margin-top: 10px !important;
    }

    .mb-10 {
        margin-bottom: 10px !important;
    }

    .mb-50 {
        margin-bottom: 50px !important;
    }

</style>

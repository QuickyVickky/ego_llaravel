<template>
    <main class="dashboard-body">
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
                                    <input type="text" name="from_amount" class="form-control" placeholder="You send" v-model.number="sendForm.sourceAmount">
                                    <div class="input-group-append">
                                        <select class="form-control" v-model="sendForm.source">
                                            <option v-for="(country,index) in countries" :key="index" :value="country.currency">{{ country.name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="to_amount" class="form-control" placeholder="Recipient gets" v-model.number="sendForm.targetAmount">
                                    <div class="input-group-append">
                                        <select class="form-control" v-model="sendForm.target">
                                            <option v-for="(country,index) in countries" :key="index" :value="country.currency">{{ country.name }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-md-center justify-content-sm-center" v-if="rateData.source != undefined">
                        1 {{ rateData.source }} =  {{ rateData.rate }} {{ rateData.target }}
                    </div>

                    <div class="row justify-content-md-center justify-content-sm-center">
                        {{ sendForm.sourceAmount }} {{ rateData.source }} * {{ rateData.rate }} (Exchange Rate)   =  {{ sendForm.targetAmount }} {{ rateData.target }}
                    </div>

                    <div class="row justify-content-md-center justify-content-sm-center mt-10">
                        <button type="submit" class="btn btn-primary" :disabled="isLoad">Continue</button>
                    </div>
                </div>
            </form>
        </section>

        </main>
</template>


<script>
    import {commonMethodMixin} from "../mixins/commonMethodMixin";
    import {transferWiseMixin} from "../mixins/transferWiseMixin";

    export default {
        mixins: [commonMethodMixin, transferWiseMixin],
        data() {
            return {
                sendForm: {
                    source: 'GBP',
                    sourceAmount:1,
                    target: 'USD',
                    targetAmount: 0,
                },
                isLoad:true,

            }

        },
        mounted() {

            this.getExchangeRates(this.sendForm.source, this.sendForm.target);
            localStorage.setItem('sendForm.source',this.sendForm.source);
            localStorage.setItem('sendForm.target',this.sendForm.target);
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
                if(this.isLogin == true){
                    if(this.$userInfo.tfw_id = ''){
                        this.$router.push('/senderdetail');
                    }else{
                        this.$router.push('/recipient');
                    }

                }else{
                    this.$router.push('/login');
                }
            },
            targetAmountCal(){
                if(this.rateData.rate == undefined){
                    return false;
                    this.isLoad = true;
                }
                let targetAmount = this.rateData.rate * this.sendForm.sourceAmount;
                // console.log("targetAmount: ",targetAmount);
                this.sendForm.targetAmount = targetAmount;
                localStorage.setItem('sendForm.targetAmount',this.sendForm.targetAmount);
                this.isLoad = false;
            }
        },
        watch:{
            "sendForm.sourceAmount":function () {
                // console.log("rate",this.rateData.rate);
                this.isLoad = true;
                this.targetAmountCal();
            },
            "sendForm.source":function () {
                this.isLoad = true;
                this.getExchangeRates(this.sendForm.source, this.sendForm.target);
                localStorage.setItem('sendForm.source',this.sendForm.source);

            },
            "sendForm.target":function () {
                this.isLoad = true;
                this.getExchangeRates(this.sendForm.source, this.sendForm.target);
                localStorage.setItem('sendForm.target',this.sendForm.target);
            },
            "rateData.rate":function () {
                // console.log("rate",this.rateData.rate);
                this.isLoad = true;
                this.targetAmountCal();
            }
        }
    }
</script>
<style lang="scss" scoped>

</style>

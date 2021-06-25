<template>
    <div class="dashboard-body">
        <div class="sendmoney-tabs">
            <send-money-tab activeTab="enterpayment"></send-money-tab>

            <div id="content" class="sm-content tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane show active" role="tabpanel" aria-labelledby="tab-A">
                    <form @submit.prevent="moveToNext" name="quoteForm" id="countryForm" action="">
                        <div id="collapse-A" class="collapse show" role="tabpanel" aria-labelledby="heading-A">
                            <div class="card-body">
                                <h2 class="mb-4">How much would you like to transfer?</h2>
                                <div class="row mb-4">
                                    <div class="col-md-10">
                                        <div class="row moneytransfer-wrap">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label>You send</label>
                                                    <div class="input-group mb-4">
                                                        <input type="text" name="source_amount"
                                                               class="form-control btn btn-default"
                                                               placeholder="You send"
                                                               v-model.number="quoteForm.sourceAmount">
                                                        <div class="input-group-append">
                                                            <div class="btn-group dropdown-toggle"
                                                                 data-toggle="dropdown">
                                                                <b-dropdown variant="primary" class="custom-dropdown">
                                                                    <template v-slot:button-content>
                                                                        <span class="input-group-addon">
                                                                            <img :src="'images/country/flag-'+quoteForm.sourceCurrency+ '.svg'" class="mr-1" height="20" alt="">
                                                                        </span>
                                                                        {{ quoteForm.sourceCurrency }}
                                                                    </template>
                                                                    <b-dropdown-form>

                                                                        <b-form-group @submit.stop.prevent>
                                                                            <b-form-input id="dropdown-form-email" size="sm" placeholder="Search"  v-model="countrySearch"></b-form-input>
                                                                        </b-form-group>
                                                                    </b-dropdown-form>
                                                                    <b-dropdown-item
                                                                        v-for="(currency,code) in currencies" :key="code"
                                                                        @click="quoteForm.sourceCurrency = code;" :active="quoteForm.sourceCurrency == code ? true:false">
                                                                        {{ code }}({{ currency }})
                                                                    </b-dropdown-item>
                                                                </b-dropdown>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group position-relative">
                                                    <label>Receipt Gets</label>
                                                    <div class="input-group mb-4">
                                                        <input type="text" name="from_amount"
                                                               class="form-control btn btn-default"
                                                               placeholder="You send"
                                                               v-model.number="quoteForm.targetAmount">
                                                        <div class="position-relative">
                                                            <div class="btn-group dropdown-toggle"
                                                                 data-toggle="dropdown">
                                                                <b-dropdown variant="primary" class="custom-dropdown">
                                                                    <template v-slot:button-content>
                                                                        <span class="input-group-addon">
                                                                            <img :src="'images/country/flag-'+quoteForm.targetCurrency+ '.svg'" class="mr-1" height="20" alt="">
                                                                        </span>
                                                                        {{ quoteForm.sourceCurrency }}
                                                                    </template>
                                                                    <b-dropdown-form>

                                                                        <b-form-group @submit.stop.prevent>
                                                                            <b-form-input id="dropdown-form-email" size="sm" placeholder="Search"  v-model="countrySearch"></b-form-input>
                                                                        </b-form-group>
                                                                    </b-dropdown-form>
                                                                    <b-dropdown-item
                                                                        v-for="(currency,code) in currencies" :key="code"
                                                                        @click="quoteForm.targetCurrency = code;" :active="quoteForm.targetCurrency == code ? true:false">
                                                                        {{ code }}({{ currency }})
                                                                    </b-dropdown-item>
                                                                </b-dropdown>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-lg-flex align-items-center mb-4">

                                        <h5 class="fw-bold mr-4 mb-1">
                                            <i class="fa fa-minus"></i>
                                            <span v-if="quotes != undefined && quotes.fee != undefined">{{ quotes.fee }} {{ quotes.source }}</span>
                                            <span v-else>-</span>
                                        </h5>
                                        <a href="" class="orange-text mr-4 fw-bold">Fees</a>

                                    </div>
                                    <div class=" mb-4">
                                        <h5 class="fw-bold mr-4 mb-0 d-inline-block">
                                            <i class="fa fa-equals"></i>
                                            <span v-if="quotes != undefined && quotes.fee != undefined">{{ (quotes.sourceAmount - quotes.fee) }} {{ quotes.source }} </span>
                                            <span v-else>-</span>
                                        </h5>
                                        <span class="text-grey d-block-sm">Amount we’ll convert</span>
                                    </div>
                                    <div class=" mb-4">
                                        <h5 class="fw-bold mr-4 mb-0 d-inline-block">
                                            <!--                                            <img src="front/images/blue-equals.svg" class="mr-2" height="30">-->
                                            <i class="fa fa-times"></i>
                                            <span v-if="quotes != undefined && quotes.rate != undefined"> {{ (quotes.sourceAmount - quotes.fee) * quotes.rate }}  {{ quotes.target }}</span>
                                            <span v-else>-</span>
                                        </h5>
                                        <span class="text-grey d-block-sm">Exchange rate</span>
                                    </div>
                                </div>
                                <!--                                <h5 class="mb-4">You could save up to <span-->
                                <!--                                    class="text-primary "><strong>35.93 EUR </strong> </span>vs the average bank<br>-->
                                <!--                                    Should arrive <span class="text-primary "><strong>by September 2nd.</strong></span>-->
                                <!--                                </h5>-->
                                <button type="submit" class="btn btn-primary btn-fixwidth text-capitalize"
                                        :disabled="isLoad">Continue
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import {commonMethodMixin} from "../mixins/commonMethodMixin";
    import {transferWiseMixin} from "../mixins/transferWiseMixin";

    export default {
        mixins: [commonMethodMixin, transferWiseMixin],
        data() {
            return {
                quotes: null,
                quoteForm: new Form({
                    profile: '',
                    guaranteedTargetAmount: false,
                    preferredPayIn: null,
                    sourceAmount: 1000,
                    targetAmount: 0,
                    sourceCurrency: 'GBP',
                    targetCurrency: 'INR'
                }),
                paymentOptions: null,
                sendForm: '',
                apiCall: false,
                isLoad: true,

            }

        },
        beforeMount() {
        },
        mounted() {
        },
        created() {
            this.sendForm = JSON.parse(localStorage.getItem('sendForm'));

            // console.log("this.sendForm",this.sendForm);

            // this.quoteForm.profile = this.$userInfo.tfw_profile;
            // this.getCountry();
            if (this.sendForm != null) {
                this.quoteForm.sourceCurrency = this.sendForm.sourceCurrency;
                this.quoteForm.sourceAmount = this.sendForm.sourceAmount;

                this.quoteForm.targetCurrency = this.sendForm.targetCurrency;
                this.quoteForm.targetAmount = this.sendForm.targetAmount;
            }


            this.getCurrency();

            this.createQuotes();

        },
        methods: {
            createQuotes() {
                this.isLoad = true;
                this.$Progress.start();
                this.quoteForm.post('api/transferwise/quotes')
                    .then((response) => {
                        if (response.data.Success == true) {
                            this.quotes = response.data.Data;
                            // this.quoteForm.id = this.quotes.id;
                            // this.quoteForm.targetAmount = this.quotes.targetAmount;
                        }
                        this.$Progress.finish();
                        this.isLoad = false;
                    })
                    .catch((error) => {
                        this.$Progress.fail()
                        toast.fire({
                            icon: 'error',
                            title: error.message
                        });
                    });

            },
            moveToNext() {
                this.$router.push("senderdetail");
            }
        },
        watch: {
            "quotes": function () {
                localStorage.setItem('quotes_id', this.quotes.id);
                this.quoteForm.targetAmount = (this.quotes.sourceAmount - this.quotes.fee) * this.quotes.rate;

            },
            "quoteForm.sourceAmount": function () {
                if (this.isLoad == false) {
                    this.createQuotes();
                }
            },
            "quoteForm.targetAmount": function () {
                if (this.isLoad == false) {
                    this.createQuotes();
                }
            },
            "quoteForm.sourceCurrency": function () {
                if (this.isLoad == false) {
                    this.createQuotes();
                }
            },
            "quoteForm.targetCurrency": function () {
                if (this.isLoad == false) {
                    this.createQuotes();
                }
            },
        }
    }
</script>
<style lang="scss" scoped>
    ul {
        list-style: none;
        height: 200px;
        overflow-x: hidden;
        overflow-y: scroll;
        left: -241px !important;
        width: 362px !important;
    }

    .dropdown-menu li {
        padding-bottom: 10px;
    }
</style>

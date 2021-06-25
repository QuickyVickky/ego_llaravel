<template>

    <main class="dashboard-body">
        <div class="sendmoney-tabs">
            <send-money-tab activeTab="enterpayment"></send-money-tab>

            <div id="content" class="sm-content tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane show active" role="tabpanel" aria-labelledby="tab-A">
                    <div id="collapse-A" class="collapse show" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <h2 class="mb-4">Who are you sending money to?</h2>
                            <form @submit.prevent="recipientFormSubmit" name="recipientForm" id="recipientForm" action="">
                                <div v-if="recipients != null">
                                    <h5 class="pointer"> <a @click="showExistingRecipient=showExistingRecipient==true ? false : true">Existing recipient</a></h5>
                                    <hr>
                                    <div class="row" v-show="showExistingRecipient">
                                        <div class="col-sm-3" v-for="recipient in recipients">
                                            <a @click="recipientNewForm.recipientId=recipient.id" class="pointer">
                                            <div class="card custom_card">
                                                <div class="card-body">
                                                    <img :src="'https://ui-avatars.com/api/?rounded=true&&name='+recipient.accountHolderName" class="img-fluid rounded-circle"/>
                                                    <h5 class="card-title">{{ recipient.accountHolderName}}</h5>
                                                    <p class="card-text">
                                                        <img :src="'images/country/flag-'+recipient.currency+ '.svg'" class="mr-1" height="20" alt="">
                                                        {{ recipient.currency}} account
                                                        <br>
                                                        A/C No.: {{ recipient.details.accountNumber }}
                                                    </p>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <h5 style="marginTop:10px" class="pointer"><a @click="showNewRecipient=showNewRecipient==true ? false : true">New recipient</a></h5>
                                <hr>
                                <div v-show="showNewRecipient">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="email">Email</label>
                                                <input type="text" name="email" id="email" class="form-control"
                                                       placeholder="Enter your email" v-model="recipientForm.email">
                                                <has-error :form="recipientForm" field="email"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="accountHolderName">Account Holder Name</label>
                                                <input type="text" name="accountHolderName" id="accountHolderName" class="form-control"
                                                       placeholder="Enter recipient full name" v-model="recipientForm.accountHolderName">
                                                <has-error :form="recipientForm" field="accountHolderName"></has-error>
                                            </div>
                                        </div>

                                    </div>
                                    <recipient-form :quotesRequirement="quotesRequirement" :recipientForm="recipientForm" v-if="quotesRequirement != ''"></recipient-form>
                                    <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary" :disabled="recipientFormBtn">Confirm</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>


<script>
    import {commonMethodMixin} from "../mixins/commonMethodMixin";
    import {transferWiseMixin} from "../mixins/transferWiseMixin";

    export default {
        mixins: [commonMethodMixin, transferWiseMixin],
        data() {
            return {
                recipients:null,
                other_occupation: false,
                recipientForm: new Form({
                    email: '',
                    accountHolderName: '',
                }),
                quoteForm: new Form({
                    id: '',
                    profile: '',
                    guaranteedTargetAmount: false,
                    preferredPayIn: null,
                    sourceAmount: 1000,
                    targetAmount: 0,
                    sourceCurrency: 'GBP',
                    targetCurrency: 'INR'
                }),
                quotes:'',
                quotesRequirement:null,
                recipientFormBtn:false,
                showNewRecipient:true,
                showExistingRecipient:false,
                recipientNewForm: {
                    recipientId:'',
                    currency:'',
                    type:'sort_code',
                    details: {
                        address: {},
                    },

                },
            }

        },
        mounted() {

            if(this.isLogin == false){
                this.$router.push('/home')
            }
        },
        created() {
            this.getCurrency();
            // this.quotesForm.profile = this.$userInfo.tfw_id;
            this.quoteForm.id = JSON.parse(localStorage.getItem('quotes_id'));
            this.getAllRecipient();
            this.getAccountRequirement(this.quoteForm.id);
            console.log("quoteForm Id: ",this.quoteForm.id);
        },
        methods: {
            recipientFormSubmit(submitEvent) {
                this.recipientFormBtn = true;
                for(let element of submitEvent.target.elements) {
                    if(element.name != '') {
                        // console.log("index:",element.name.indexOf("details."));
                        if(element.name.indexOf("details.") != -1){

                            //address
                            if(element.name.indexOf("address.") != -1){
                                var str = element.name.substr(element.name.indexOf("address.")+8,element.name.length);
                                console.log(str);
                                this.recipientNewForm.details.address[str] = element.value;
                            }else {
                                //details
                                var str = element.name.substr(element.name.indexOf("details.") + 8, element.name.length);
                                console.log(str);
                                this.recipientNewForm.details[str] = element.value;
                            }
                        }
                        else{
                            this.recipientNewForm[element.name] = element.value;
                        }

                    }
                }
                var data = this.recipientNewForm;
                // console.log(JSON.stringify(data));

                this.$Progress.start();
                axios.post('api/transferwise/recipient',data)
                    .then((response) => {
                        if (response.data.Success == true) {
                            toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.recipientFormBtn = false;
                            localStorage.setItem('recipientId',this.recipientNewForm.recipientId);
                            this.$router.push('/verification')
                        } else {
                            toast.fire({
                                icon: 'error',
                                title: response.data.Message
                            });
                            this.recipientFormBtn = false;
                        }
                        this.$Progress.finish()
                    })
                    .catch((error) => {
                        this.$Progress.fail()
                        toast.fire({
                            icon: 'error',
                            title: error.message
                        });
                    });
            },
            getAccountRequirement(quotes_id) {
                // let quotes_id = localStorage.getItem('quotes_id');
                this.$Progress.start();
                axios.get('api/transferwise/quotes/'+quotes_id+'/account_requirement')
                    .then((response) => {
                        if (response.data.Success == true) {
                            this.recipientFormBtn = false;
                            this.quotesRequirement = response.data.Data;
                            console.log("quotesRequirement: ",this.quotesRequirement);
                            this.recipientNewForm.type = this.quotesRequirement.type;
                            if(this.recipientNewForm.currency == ''){
                                this.getQuotes();
                            }
                        }
                        this.$Progress.finish()
                    })
                    .catch((error) => {
                        this.$Progress.fail()
                        toast.fire({
                            icon: 'error',
                            title: error.message
                        });
                    });
            },
            getQuotes() {
                // let quotes_id = localStorage.getItem('quotes_id');
                this.$Progress.start();
                axios.get('api/transferwise/quotes/'+this.quoteForm.id)
                    .then((response) => {
                        if (response.data.Success == true) {
                            this.recipientFormBtn = false;
                            this.quotes = response.data.Data;
                            this.recipientNewForm.currency = this.quotes.target;
                        }else{
                            toast.fire({
                                icon: 'error',
                                title: response.data.Message
                            });
                        }
                        this.$Progress.finish()
                    })
                    .catch((error) => {
                        this.$Progress.fail()
                        toast.fire({
                            icon: 'error',
                            title: error.message
                        });
                    });
            },
            getAllRecipient() {
                this.$Progress.start();
                axios.get('api/transferwise/recipients')
                    .then((response) => {
                        if (response.data.Success == true) {
                            this.recipients = response.data.Data;
                        }else{
                            toast.fire({
                                icon: 'error',
                                title: response.data.Message
                            });
                        }
                        this.$Progress.finish()
                    })
                    .catch((error) => {
                        this.$Progress.fail()
                        toast.fire({
                            icon: 'error',
                            title: error.message
                        });
                    });
            },
            recipientUpdate(){
                try {
                    // this.recipientNewForm.recipientId
                }catch (e) {
                    console.log("Error:",e.message);
                }
            }

        },
        watch: {
            "quotes.id":function () {
                this.getQuotes();
            },
            "recipientNewForm.recipientId":function () {
                localStorage.setItem('recipientId',this.recipientNewForm.recipientId);
                this.$router.push('/verification')
            }
        }
    }
</script>
<style lang="scss" scoped>
    .custom_card{
        border: 1px solid rgba(0,0,0,.125);
        margin-bottom: 10px;
        text-align: center;
    }
    .pointer{
        cursor: pointer;
    }
</style>

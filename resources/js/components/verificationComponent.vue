<template>

    <main class="dashboard-body">
        <div class="sendmoney-tabs">
            <send-money-tab activeTab="verification"></send-money-tab>

            <div id="content" class="sm-content tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane show active" role="tabpanel" aria-labelledby="tab-A">
                    <div id="collapse-A" class="collapse show" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <h2 class="mb-4">What’s the reason for your transfer?</h2>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>To help us keep Egogram safe and secure, please let us know why you’re making this transfer.</p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="signin-label" for="reason">Reason for your transfer</label>
                                        <select class="form-control" id="reason">
                                            <option value="" selected="selected">Select a reason...</option>
                                            <option value="FAMILY_MAINTENANCE">Family maintenance</option>
                                            <option value="SAVINGS">Savings</option>
                                            <option value="NRE_DEPOSIT">Deposit to Non-Resident Rupee (NRE) accounts</option>
                                            <option value="GIFT_TO_FRIENDS">Payments to friends</option>
                                            <option value="OTHER_PERSONAL_EXPENSE">Other personal expenses</option>
                                            <option value="FAMILY_EDUCATION">Education related expenses for family</option>
                                            <option value="FAMILY_MEDICAL">Medical treatment for family</option>
                                            <option value="PROPERTY_PURCHASE">Purchase of property</option>
                                            <option value="EMPLOYEE_COMPENSATION">Compensation for employees</option>
                                        </select>
<!--                                        <has-error :form="recipientForm" field="email"></has-error>-->

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary" @click="moveToReview">Continue</button>
                                </div>
                            </div>

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
                recipientId:''
            }

        },
        mounted() {
            if(this.isLogin == false){
                this.$router.push('/home')
            }
            this.recipientId =  localStorage.getItem('recipientId');
            if(this.recipientId == undefined || this.recipientId == ''){
                this.$router.push('/recipient');
            }
        },
        created() {

        },
        methods: {
            moveToReview(){
                this.$router.push('/review');
            }
        },
        watch: {

        }
    }
</script>
<style lang="scss" scoped>
    .custom_card{
        border: 1px solid rgba(0,0,0,.125);
        margin-bottom: 10px;
        text-align: center;
    }
</style>

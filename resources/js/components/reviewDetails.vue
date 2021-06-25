<template>

    <main class="dashboard-body">
        <div class="sendmoney-tabs">
            <send-money-tab activeTab="verification"></send-money-tab>

            <div id="content" class="sm-content tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane show active" role="tabpanel" aria-labelledby="tab-A">
                    <div id="collapse-A" class="collapse show" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <h2 class="mb-4">Review details of your transfer</h2>
                            <div class="row">
                                <div class="col-sm-8">

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
                recipientId:'',
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

<template>
    <div class="sidebar">
            <ul id="tabs" class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="/enterpayment" class="nav-link " :class="$route.name == 'enterpayment' ? 'active': ''" data-toggle="tab" role="tab" @click="$router.push('enterpayment')">Amount</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="/senderdetail" class="nav-link" :class="$route.name == 'senderdetail' ? 'active': ''" data-toggle="tab" role="tab" @click="$router.push('senderdetail')">You</a>
                </li>
                <li class="nav-item">
                    <a id="tab-C" href="/recipient" class="nav-link" :class="$route.name == 'recipient' ? 'active': ''" data-toggle="tab" role="tab" @click="$router.push('recipient')">Recipients</a>
                </li>
                <li class="nav-item" v-show="$route.name == 'verification'">
                    <a id="tab-verification" href="/verification" class="nav-link" :class="$route.name == 'verification' ? 'active': ''" data-toggle="tab" role="tab" @click="$router.push('verification')">Verification</a>
                </li>
                <li class="nav-item">
                    <a id="tab-D" href="/review" class="nav-link" :class="$route.name == 'review' ? 'active': ''" data-toggle="tab" role="tab" @click="$router.push('review')">Review</a>
                </li>
                <li class="nav-item">
                    <a id="tab-E" href="#" class="nav-link" data-toggle="tab" role="tab">Pay</a>
                </li>
            </ul>

        </div>
</template>

<script>

    import {commonMethodMixin} from "../../mixins/commonMethodMixin";

    export default {
        mixins: [commonMethodMixin],
        data() {
            return {}
        },
        created() {

        },
        mounted() {
            // console.log("isLogin:", this.isLogin);
        },
        methods: {}
    }
</script>

<style>

</style>

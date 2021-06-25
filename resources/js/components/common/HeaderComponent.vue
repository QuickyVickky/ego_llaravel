<template>
    <div class="main">
        <!-- Header -->
        <header class="main-header home-header" id="header">
            <!-- Just an image -->
            <nav class="navbar navbar-light ">
                <div class="container">
                    <router-link :to="{path: '/'}" class="navbar-brand">
                        <img src="front/images/logo.svg" height="60" alt="egogram-logo"/>
                    </router-link>
                    <div class="row no-gutters">
                        <div class="dropdown mr-10">
                            <b-dropdown split>
                                <template v-slot:button-content>
                                    English
                                </template>
                                <b-dropdown-item>Hindi</b-dropdown-item>
                                <b-dropdown-item>German</b-dropdown-item>
                            </b-dropdown>

                        </div>
                        <router-link :to="{path: '/login'}" class="btn btn-primary" v-if="isLogin != true"><i class="fa fa-lock mr-md-2"></i> <span>Login</span>
                        </router-link>
                        <div class="dropdown" v-else>
                            <b-dropdown variant="primary">
                                <template v-slot:button-content>
                                    <i class="fa fa-user mr-md-2"></i><span>  My Account</span>
                                </template>
                                <b-dropdown-item href="/myaccount">My Details</b-dropdown-item>
                                <b-dropdown-item href="/myaccount">My Transaction</b-dropdown-item>
                                <b-dropdown-item @click="logout">Log Out</b-dropdown-item>
                            </b-dropdown>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!-- content section -->
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

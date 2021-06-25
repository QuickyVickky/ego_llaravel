<template>
    <div class="main">
        <header id="header" class="inner-header">
            <nav class="navbar navbar-expand-md ">
                <!-- Brand -->
                <router-link :to="{path: '/'}" class="navbar-brand">
                    <img src="front/images/logo.svg" height="50" alt="">
                </router-link>
                <button type="button" class="navbar-toggler" data-toggle="collapse-side" data-target="#navbarCollapse">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="side-collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ">
                        <!-- Links -->

                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link" href="dashboard.html">All Activity</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="send-money.html">Send Money</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="recipients.html">Recipients</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#">Add bank Account</a>
                            </li>


                        </ul>

                        <!-- Login View  -->
                        <div class="loggedin-detail text-white">

                            <div class="user-login">
                                <div class="nav-item dropdown">
                                    <b-dropdown variant="default">
                                        <template v-slot:button-content>
                                            <span style="color: white" v-if="$userInfo.first_name != null">{{ $userInfo.first_name }} {{ $userInfo.last_name }}</span>
                                            <span style="color: white" v-else>{{ $userInfo.email }}</span>
                                        </template>
                                        <b-dropdown-item @click="logout">Log Out</b-dropdown-item>
                                    </b-dropdown>

<!--                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">-->
<!--                                        <div class="user-avtar">-->
<!--                                        </div>-->
<!--                                        <span v-if="$userInfo.first_name != null">{{ $userInfo.first_name }} {{ $userInfo.last_name }}</span>-->
<!--                                        <span v-else>{{ $userInfo.email }}</span>-->
<!--                                    </a>-->
<!--                                    <div class="dropdown-menu p-2">-->
<!--&lt;!&ndash;                                        <a class="dropdown-item" href="#"> My Bookings</a>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <a class="dropdown-item" href="#">Favorites</a>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <a class="dropdown-item" href="#">Messages</a>&ndash;&gt;-->
<!--&lt;!&ndash;                                        <a class="dropdown-item" href="#">Past Trips</a>&ndash;&gt;-->
<!--                                        <a @click="logout" class="dropdown-item">Log Out</a>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </nav>
            <div class="notification">
                <img src="front/images/notification.svg" height="28" alt="">
            </div>
</header>
    </div>
</template>

<script>
    $(document).ready(function () {
        // Mobile navigation

        $('[data-toggle=collapse-side]').click(function (e) {
            $('.side-collapse').toggleClass('open');
        });
    });

    import {commonMethodMixin} from "../../mixins/commonMethodMixin";

    export default {
        mixins: [commonMethodMixin],
        data() {
            return {
            }
        },
        created() {

        },
        mounted() {
            // this.userInfo =  JSON.parse(this.user);
            // console.log("userInfo:",this.userInfo);

            // console.log("isLogin:", this.isLogin);
        },
        methods: {}
    }
</script>

<style>

</style>

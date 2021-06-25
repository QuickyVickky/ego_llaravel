<template>
    <div class="main">
        <section class="login-page">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="login-splash">
                        <div class="login-logo">
                            <router-link :to="{path: '/'}" class="navbar-brand">
                                <img src="front/images/logo.svg" alt=""/>
                            </router-link>
                        </div>
                        <div class="splash-image">
                            <img height="300" src="front/images/signup_girls.svg" alt=""/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <p class="text-right sign-in-text ">New to Egogram?
                            <strong>
                                <router-link :to="{path: '/register'}" class="">Sign Up</router-link>
                            </strong>
                             <a href=""><img src="front/images/cross.svg" class="ml-2" height="30" @click="$router.push('/login')"></a>
                        </p>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-6 m-auto">
                            <div class="center-container text-left ">
                                <h3 class="mb-4">Welcome back</h3>
                                <form class="form-signin" @submit.prevent="login">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-danger" v-show="loginError != ''">{{ loginError }}
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label text-grey" for="inputEmail">Email address</label>
                                                <input type="email" id="inputEmail" class="form-control"
                                                    placeholder="Email address" required v-model="loginForm.email"/>
                                             </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label text-grey" for="inputPassword">Password</label>
                                                <input type="password" id="inputPassword" class="form-control"
                                                    placeholder="Password" required v-model="loginForm.password"/>
                                             </div>
                                        </div>
                                        <div class="col-sm-12 ">
                                            <router-link :to="{path: '/forgot-password'}" class="">Forgot password?</router-link>
                                        </div>
                                        <div class="col-sm-12 mt-3 mb-4">
                                            <button class="btn btn-primary btn-block" type="submit">SIGN IN</button>
                                        </div>
                                    </div>
                                </form>
                                   <p class="text-center text-grey mt-5 mb-3">
                                -----Or Continue with-----
                            </p>

                            <div class="social-icon-image">
                                <!--                                        <a href="/redirect" class="btn btn-primary">-->
                                <!--                                            <img class="social-icons" src="front/images/ic_fb.svg" alt="">-->
                                <!--                                        </a>-->
                                <a href="./google/redirect" class="">
                                    <img class="social-icons" src="front/images/ic_google.svg" alt="">
                                </a>
                            </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>


<script>
    import {commonMethodMixin} from "../mixins/commonMethodMixin";

    export default {
        mixins: [commonMethodMixin],
        data() {
            return {
                loginForm: new Form({
                    email: '',
                    password: '',
                }),
                loginError: '',

            }

        },
        mounted() {

        },
        created() {

        },
        methods: {
            login() {
                this.loginError = '';
                this.$Progress.start();
                this.loginForm.post('api/login')
                    .then((response) => {
                        if (response.data.Success == true) {
                            localStorage.setItem('phone', response.data.phone);
                            localStorage.setItem('user_id', response.data.user_id);
                            localStorage.setItem('email', response.data.email);
                            this.loginForm.reset();
                            this.$router.push('/verify-otp');
                        } else {
                            toast.fire({
                                icon: 'error',
                                title: response.data.Message
                            });
                            // this.loginError = response.data.Message;
                        }
                        this.$Progress.finish()
                    })
                    .catch((e) => {
                        this.$Progress.fail()
                        toast.fire({
                            icon: 'error',
                            title: e.message
                        });
                    });

                // this.loginForm.reset();

            },
        },
    }
</script>
<style lang="scss" scoped>


</style>

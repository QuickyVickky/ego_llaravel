<template>
    <div class="main">
        <main>
            <section class="login-page">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <div class="login-splash">
                            <div class="login-logo">
                                <router-link :to="{path: '/'}" class="navbar-brand">
                                <img src="front/images/logo.svg" alt="" />
                            </router-link>
                            </div>
                            <div class="splash-image">
                                <img height="460" src="front/images/otp-hero.svg" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <img class="cross-icons" src="front/images/forgot-password.svg" alt="">

                        </div>
                        <div class="row no-gutters">
                            <div class="col-lg-6 m-auto">
                                <form @submit.prevent="forgotPassword">
                                    <div class="center-container text-left">
                                        <h3 class="mb-3">Forgot password?</h3>
                                        <p class="text-grey pt-0 mb-4"> Don’t worry, just enter the email address you
                                            registered with and we will send you a link to reset your password.</p>
                                        <div class="col-sm-12" v-show="forgotPwdError != ''">
                                            <div class="alert alert-danger">{{ forgotPwdError }}</div>
                                        </div>
                                        <div class="col-sm-12" v-show="forgotPwdSuccess != ''">
                                            <div class="alert alert-success">{{ forgotPwdSuccess }}</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label text-grey">Email Address</label>
                                            <input type="email" class="form-control"
                                                   placeholder="Email address" required
                                                   v-model="forgotPwdForm.email"/>
                                        </div>

                                        <div class="text-center mt-5">
                                            <button type="submit"
                                                    class="btn btn-primary text-center text-uppercase btn-block">Send
                                                password reset link
                                            </button>
                                        </div>

                                        <div class="mt-10">
                                            <p class="sign-in-text">
                                                Remembered your password?
                                                <router-link :to="{path: '/login'}" class="">Login</router-link>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

    </div>

</template>


<script>
    import {commonMethodMixin} from "../mixins/commonMethodMixin";

    export default {
        mixins: [commonMethodMixin],
        data() {
            return {
                forgotPwdForm: new Form({
                    email: '',
                }),
                forgotPwdError: '',
                forgotPwdSuccess: '',

            }

        },
        mounted() {

        },
        created() {

        },
        methods: {
            forgotPassword() {
                this.forgotPwdError = '';
                this.forgotPwdSuccess = '';
                this.$Progress.start();
                this.forgotPwdForm.post('api/forgot-password')
                    .then((response) => {
                        if (response.data.Success == true) {
                            this.forgotPwdForm.reset();
                            toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.forgotPwdSuccess = response.data.Message;
                        } else {
                            toast.fire({
                                icon: 'error',
                                title: response.data.Message
                            });
                            this.forgotPwdError = response.data.Message;
                        }

                        // End progress bar
                        this.$Progress.finish()
                    })
                    .catch((error) => {
                        // Progress bar failed
                        this.$Progress.fail()
                        this.forgotPwdError = 'Login Failed.!';
                    });

            },
        },
    }
</script>

<template>
    <div class="main">
        <section class="signup-page">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <div class="login-splash">
                        <div class="login-logo">
                            <img src="front/images/logo.svg" alt="" />
                        </div>
                        <div class="splash-image">
                            <img height="300" src="front/images/signup_girls.svg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row no-gutters">
                        <div class="col-md-6 m-auto">
                            <div class="signup-form">
                                <h3>Set your new password</h3>
                                <p></p>

                                <form class="form-signin" @submit.prevent="resetPassword">
                                    <div class="row">
                                        <div class="col-sm-12" v-show="forgotPwdError != ''">
                                            <div class="alert alert-danger" >{{ forgotPwdError }}</div>
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="signin-label" for="email">Email address</label>
                                            <input type="text" id="email" class="form-control" placeholder="Email address" required v-model="resetPwdForm.email" readonly/>
                                            <has-error :form="resetPwdForm" field="email"></has-error>
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="signin-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control" placeholder="Enter your password" required v-model="resetPwdForm.password"/>
                                            <has-error :form="resetPwdForm" field="password"></has-error>
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="signin-label" for="password_confirmation">Re-enter Password</label>
                                            <input type="password" id="password_confirmation" class="form-control" placeholder="Re-enter your password" required v-model="resetPwdForm.password_confirmation"/>
                                            <has-error :form="resetPwdForm" field="password_confirmation"></has-error>
                                        </div>
                                        <div class="col-sm-12 mt-20">
                                            <button class="btn btn-primary btn-block" type="submit"> Confirm</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="mt-10">
                                    <p class="sign-in-text">
                                        Remembered your password?<router-link  :to="{path: '/login'}" class="">Login</router-link>
                                    </p>
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
    import { commonMethodMixin } from "../mixins/commonMethodMixin";

    export default {
        mixins:[commonMethodMixin],
        data() {
            return {
                resetPwdForm: new Form({
                    token:'',
                    email: '',
                    password:'',
                    password_confirmation:'',
                }),
                forgotPwdError:'',

            }

        },
        mounted() {
            this.resetPwdForm.token = this.$route.params.token;
            this.resetPwdForm.email = this.$route.query.email;
        },
        created() {

        },
        methods: {
            resetPassword() {
                this.forgotPwdError = false;
                this.$Progress.start();
                this.resetPwdForm.post('api/reset-password')
                    .then((response) => {
                        if(response.data.Success == true){
                            this.forgotPwdForm.reset();
                            toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.$router.push('/login');
                        }else{
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
                        this.forgotPwdError = 'Reset password failed.!';
                    });

            },
        },
    }
</script>
<style lang="scss" scoped>


</style>

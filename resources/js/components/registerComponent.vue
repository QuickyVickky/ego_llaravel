<template>
    <div class="main">
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
                            <img height="300" src="front/images/signup_girls.svg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <p class="text-right sign-in-text pb-0">Already a member?
                            <strong><router-link  :to="{path: '/login'}" class="">Sign In</router-link></strong>
<!--                            <img class="cross-icons" src="front/images/cross.svg" alt="">-->
                        </p>

                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-6 m-auto">
                            <div class="center-container mt-3 text-left ">
                                <h3 class="mb-4">Create an account</h3>
                                <div class="mb-3 register-tabs">
                                    <button type="button" class="btn btn-primary mr-2" @click="registrationForm.type = 'personal'">
                                        Personal
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" @click="registrationForm.type = 'business'">
                                        Business
                                    </button>
                                    </div>
                                <form class="form-signin" @submit.prevent="registration">
                                    
                                    <div class="form-group">
                                        <label class="form-label text-grey" for="inputEmail">Email address</label>
                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                               required v-model="registrationForm.email" />
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label text-grey" for="inputEmail">Phone number</label>
                                        <input type="text" class="form-control" placeholder="Enter phone number"
                                               required v-model="registrationForm.phone" @keypress="onlyNumber($event)"
                                               maxlength="10"
                                        />
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label text-grey" for="inputPassword">Password</label>
                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required v-model="registrationForm.password"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label text-grey" for="inputPassword">Country of Registration</label>
                                        <div class="input-group">
<!--                                            <span class="input-group-addon btn btn-outline-secondary">-->
<!--                                                <img :src="'images/country/flag-'+registrationForm.countryCode+ '.svg'">-->
<!--                                            </span>-->
                                            <select class="form-control" v-model="registrationForm.country">
                                                <option v-for="(country,index) in countries" :key="index" :value="country.country_code" @click="registrationForm.countryCode=country.country_code">{{ country.name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary btn-block mt-3 mb-4" type="submit">
                                        SIGN UP
                                    </button>
                                    <p class="text-center text-grey mt-5 mb-3">
                                        -----Or Continue with-----
                                    </p>
                                    <div class="social-icon-image">
<!--                                        <img class="social-icons" src="front/images/ic_fb.svg" alt="" />-->
                                        <a href="./google/redirect" class="">
                                            <img class="social-icons" src="front/images/ic_google.svg" alt="" />
                                        </a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-right text-grey pr-5 pt-4">
                            Privacy Policy and Terms of Service </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>


<script>
    import {commonMethodMixin} from "../mixins/commonMethodMixin";

    export default {
        mixins:[commonMethodMixin],
        data() {
            return {
                registrationForm: new Form({
                    type:'personal',
                    email: '',
                    password: '',
                    country: 'IN',
                    phone:''
                }),
            }

        },
        mounted() {

        },
        created() {
            this.getCountry();
            // this.getCurrency();
        },
        methods: {
            registration() {

                this.$Progress.start();
                this.registrationForm.post('api/registration')
                    .then((response) => {

                        if(response.data.Success){
                            this.registrationForm.reset();
                            toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.$router.push('/login');
                        }else{
                            this.errorMsg = response.data.Message;
                            toast.fire({
                                icon: 'error',
                                title: response.data.Message
                            });
                        }

                        // End progress bar
                        this.$Progress.finish()
                    }).catch((error) => {
                    // Progress bar failed
                    this.$Progress.fail()
                    toast.fire({
                        icon: 'error',
                        title: error.message
                    });
                });

                // this.loginForm.reset();

            },
            onlyNumber($event) {
                // console.log($event.keyCode); //keyCodes value
                //  //keyCodes value
                let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
                if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                    $event.preventDefault();
                }

            },
        },
    }
</script>
<style lang="scss" scoped>

</style>

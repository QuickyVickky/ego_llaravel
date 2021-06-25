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
                            <img height="460" src="front/images/otp-hero.svg" alt=""/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-right">
                        <img class="cross-icons" src="front/images/cross.svg" alt="" @click="$router.push('/login')">
                    </div>
                    <div class="row no-gutters">
                        <div class="col-lg-6 m-auto">
                            <div class="center-container">
                                <h3>We just sent you an SMS</h3>
                                <p class="text-grey pt-0"> To log in, enter the security code we sent to</p>

                                <div class="d-flex justify-content-between  align-items-center mt-4">
                                    <h4 class="text-primary pt-0 m-0" v-if="verifyOTPForm.phone != null && verifyOTPForm.phone != 'null'">******{{ verifyOTPForm.phone.substr(6,4)}}</h4>
                                    <h4 class="text-primary pt-0 m-0" v-else>******{{ verifyOTPForm.email.substr(verifyOTPForm.email.indexOf("@")-3)}}</h4>
                                    <a href="" class=" ">Learn More</a>
                                </div>
                                <p class="text-grey text-left">Type your 6-digit security code here</p>
                                <div class="otp-form mb-4">
                                    <form @submit.prevent="verifyOTPFormSubmit" method="get" class="digit-group" data-group-name="digits"
                                          data-autosubmit="false" autocomplete="off">
                                        <input class="digit-input" type="text" id="digit-1" name="digit-1"
                                               data-current="0"
                                               data-next="digit-2" v-model.number="digits[0]"
                                               @keypress="onlyNumber($event)"
                                               @paste="onPaste($event)"
                                               @keyup="keyup($event)"
                                               min="1" max="9" maxlength="1"/>
                                        <input class="digit-input" type="text" id="digit-2" name="digit-2"
                                               data-current="1"
                                               data-next="digit-3" data-previous="digit-1" v-model.number="digits[1]"
                                               @keypress="onlyNumber($event)"
                                               @paste="onPaste($event)"
                                               @keyup="keyup($event)"
                                               min="1" max="9" maxlength="1"/>
                                        <input class="digit-input" type="text" id="digit-3" name="digit-3"
                                               data-current="2"
                                               data-next="digit-4" data-previous="digit-2" v-model.number="digits[2]"
                                               @keypress="onlyNumber($event)"
                                               @paste="onPaste($event)"
                                               @keyup="keyup($event)"
                                               min="1" max="9" maxlength="1"/>
                                        <input class="digit-input" type="text" id="digit-4" name="digit-4"
                                               data-current="3"
                                               data-next="digit-5" data-previous="digit-3" v-model.number="digits[3]"
                                               @keypress="onlyNumber($event)"
                                               @paste="onPaste($event)"
                                               @keyup="keyup($event)"
                                               min="1" max="9" maxlength="1"/>
                                        <input class="digit-input" type="text" id="digit-5" name="digit-5"
                                               data-current="4"
                                               data-next="digit-6" data-previous="digit-4" v-model.number="digits[4]"
                                               @keypress="onlyNumber($event)"
                                               @paste="onPaste($event)"
                                               @keyup="keyup($event)"
                                               min="1" max="9" maxlength="1"/>
                                        <input class="digit-input" type="text" id="digit-6" name="digit-6"
                                               data-current="5"
                                               data-previous="digit-5" v-model.number="digits[5]"
                                               @keypress="onlyNumber($event)"
                                               @paste="onPaste($event)"
                                               @keyup="keyup($event)"
                                               min="1" max="9" maxlength="1"/>
                                        <button class="btn btn-primary btn-block" type="submit" :disabled="btnDisabled">
                                            DONE
                                        </button>
                                    </form>
                                </div>
                                <div class="text-center" v-if="countDown == 0">
                                    <a class="text-center" @click="resendOTP()" :disabled="countDown == 0 ? false:true">I didn't receive the code</a>
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
                digits: [],
                verifyOTPForm: new Form({
                    user_id:null,
                    phone:null,
                    email:null,
                    otp:null
                }),
                btnDisabled:true,
                countDown : 10 //in second
            }

        },
        mounted() {
            $("#digit-1").focus();
            this.countDownTimer();
            // console.log("countDown:",this.countDown);
        },
        created() {
            this.verifyOTPForm.user_id = localStorage.getItem('user_id');
            this.verifyOTPForm.phone = localStorage.getItem('phone');
            this.verifyOTPForm.email = localStorage.getItem('email');
            if(this.verifyOTPForm.user_id == undefined || this.verifyOTPForm.user_id == null || this.verifyOTPForm.user_id == ''){
                this.$router.push("/home");
            }
        },
        methods: {
            keyup:function($event){
                // console.log("keyCode:",$event.keyCode);
                var target = $event.target;
                var current = $(target).data("current");

                if($event.keyCode == 46 || $event.keyCode == 8){
                    $("#digit-"+current).focus();
                }else if($event.keyCode >= 96 && $event.keyCode < 105){
                    $(':focus').next('input').focus();
                }
            },
            countDownTimer() {
                if(this.countDown > 0) {
                    setTimeout(() => {
                        this.countDown -= 1;
                        // console.log("countDown:",this.countDown);
                        this.countDownTimer();
                    }, 1000)
                }
            },
            resendOTP(){
                try {
                    this.$Progress.start();
                    this.verifyOTPForm.post('api/resend-otp')
                        .then((response) => {
                            if (response.data.Success == true) {
                                toast.fire({
                                    icon: 'success',
                                    title: response.data.Message
                                });
                                this.countDown = 10;
                                this.countDownTimer();
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
                        .catch((e) => {
                            // Progress bar failed
                            this.$Progress.fail();
                            toast.fire({
                                icon: 'error',
                                title: e.message
                            });

                        });
                }catch (e) {
                    console.error("error: ",e.message);
                }
            },
            verifyOTPFormSubmit() {
                this.$Progress.start();
                this.verifyOTPForm.post('api/verify-otp')
                    .then((response) => {
                        if (response.data.Success == true) {
                            this.verifyOTPForm.reset();
                            toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            localStorage.setItem('access_token', JSON.stringify(response.data.Data.access_token));
                            localStorage.setItem('user', JSON.stringify(response.data.Data.user));
                            this.$accessToken = response.data.Data.access_token;
                            this.$userInfo = response.data.Data.user;
                            this.$router.push("/enterpayment");
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
                    .catch((e) => {
                        // Progress bar failed
                        this.$Progress.fail();
                        toast.fire({
                            icon: 'error',
                            title: e.message
                        });

                    });

            },
            onlyNumber($event) {
                // console.log($event.keyCode); //keyCodes value
                //  //keyCodes value
                let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
                if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
                    $event.preventDefault();
                }

            },
            onPaste($event){
                // console.log("onPaste",$event.clipboardData.getData('text/plain'));
                var pastData = $event.clipboardData.getData('text/plain');
                var target = $event.target;
                // console.log("$event:",$(target).data("current"));
                var current = $(target).data("current");
                for (var i=0; i < pastData.length; i++){
                    if(current < 6){
                        // console.log("current:",current);
                        this.digits[current++] = pastData.substr(i,1);
                        $("#digit-"+current).focus();
                    }

                }

                // console.log("onPaste",$(this));
            }
        },
        watch:{
            "digits":function () {
                let arr = this.digits.filter(val => (val!==undefined) && (val!==null) && (val!==""));

                if(arr.length == 6 ){
                    this.btnDisabled = false;
                    this.verifyOTPForm.otp = this.digits.join('');
                }else{
                    // console.log("OTP",this.verifyOTPForm.otp);
                    this.btnDisabled = true;
                }
                // $(':focus').next('input').focus();
            }
        }
    }
</script>
 <style lang="scss" scoped>
//     .text-primary {
//         color: #255f99 !important
//     }

//     .form-control {
//         background-color: #E0E7FF33;
//         border: 1px solid #255F994D;
//         min-height: 45px;
//         border-radius: 5px;
//     }

//     .login-page a {
//         color: #FF7C7C;
//         text-decoration: underline;
//     }

//     .center-container {
//         max-width: 330px;
//         margin: 50px auto 0;
//         text-align: center;

//     }

//     .login-page {
//         height: 100vh;
//         background-image: url(/images/banner-bg.png)
//     }


//     .login-page .login-splash {
//         background-color: #255F99;
//         height: 100vh;
//         border-top-right-radius: 30px;
//         border-bottom-right-radius: 30px;
//     }

//     .cross-icons {
//         margin-top: 40px;
//         margin-right: 50px;
//     }

//     .form.digit-group {
//         display: flex;
//         align-items: center;
//         justify-content: center;
//         flex-direction: column;
//     }

//     .otp-form {
//         max-width: 320px;
//         text-align: center;
//         margin: 40px auto 0
//     }

//     .login-page .digit-input {
//         width: 45px;
//         height: 50px;
//         line-height: 50px;
//         text-align: center;
//         font-size: 24px;
//         font-weight: 200;
//         color: #8C98A9;
//         border: 1px solid #255F994D;
//         margin: 20px 2px;
//         background-color: #E0E7FF33;
//         box-shadow: none;
//         border-radius: 3px;
//     }

//     @media (max-width: 600px) {

//         .login-logo {
//             padding-bottom: 40px;
//         }

//         .login-logo img {
//             max-width: 150px;
//         }

//         .login-page .login-splash {
//             height: auto
//         }

//         .splash-image img {
//             height: 230px;
//             width: auto;
//         }

//         .center-container {
//             margin-bottom: 30px;
//             margin-top: 20px
//         }
//     }

// </style>

<template>
    <div class="main">
        <!-- Banner Section  -->
        <section class="banner-section ">
            <form @submit.prevent="senderFormSubmit" name="senderForm" id="senderForm" action="">
                <div class="container">
                    <h1 class="big-head text-center mb-50">Fill in your details</h1>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="signin-label" for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter your first name" v-model="senderForm.first_amount">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="signin-label" for="middle_name">Middle Name</label>
                                <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Enter your middle name " v-model="senderForm.middle_name">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="signin-label" for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter your last name" v-model="senderForm.last_name">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="signin-label" for="date_of_birth">Date Of Birth</label>
                                <input type="text" name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Enter your birth date(e.g: 06-07-1990)" v-model="senderForm.date_of_birth">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="signin-label" for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your birth date(e.g: 06-07-1990)" v-model="senderForm.phone">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="signin-label" for="country">Country</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <span class="input-group-addon">
                                                <img :src="'images/country/flag-'+senderForm.country+ '.svg'">
                                            </span>
                                            <select class="form-control" name="country" id="country" v-model="senderForm.country">
                                                <option v-for="(country,index) in countries" :key="index" :value="country.code">{{ country.name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="signin-label" for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address" v-model="senderForm.address">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="signin-label" for="city">City</label>
                                <input type="text" name="city" id="city" class="form-control" placeholder="Enter your city" v-model="senderForm.city">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="signin-label" for="occupation">Occupation</label>
                                <select name="occupation" id="occupation" class="form-control" v-model="senderForm.occupation" @change="changeOccupation">
                                    <option>Salaried personnel</option>
                                    <option>Self-employed</option>
                                    <option>Retired</option>
                                    <option>Entrepreneur</option>
                                    <option>Stay at home partner</option>
                                    <option>Stay at home partner</option>
                                    <option>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="signin-label" for="occupation">&nbsp;&nbsp;</label>
                                <input type="text" name="occupation" id="other_occupation" class="form-control"
                                       placeholder="Enter your occupation" v-model="senderForm.other_occupation" v-show="other_occupation">
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-md-center justify-content-sm-center mt-10">
                        <button type="submit" class="btn btn-primary">Continue</button>
                    </div>

                    <div class="row mt-10">
                        <a class="subtle-link" href="/forgotten-password" id="forgotten-password-link">Forgotten password?</a>
                    </div>
                </div>
            </form>
        </section>
    </div>
</template>


<script>
    import {commonMethodMixin} from "../mixins/commonMethodMixin";
    import {transferWiseMixin} from "../mixins/transferWiseMixin";

    export default {
        mixins: [commonMethodMixin, transferWiseMixin],
        data() {
            return {
                other_occupation:false,
                senderForm: {
                    first_name: '',
                    middle_name: '',
                    last_name: '',
                    date_of_birth: '',
                    phone:'',
                    country: '',
                    state: '',
                    city:'',
                    address:'',
                    postal_code:'',
                    occupation:'',
                    other_occupation:''
                },

            }

        },
        mounted() {

        },
        created() {
            this.senderForm.country = localStorage.getItem('sendForm.source');
            this.getCountry();
            console.log("countries: ",this.countries);

        },
        methods: {
            changeOccupation() {
                // alert(this.senderForm.occupation);
                if(this.senderForm.occupation == 'Other') {
                    this.other_occupation = true;
                }else{
                    this.other_occupation = false;
                }
            },
            senderFormSubmit(){
                
            }
        },
        watch:{
        }
    }
</script>
<style lang="scss" scoped>

</style>

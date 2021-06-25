<template>
    <main class="dashboard-body">
        <div class="sendmoney-tabs">
            <send-money-tab></send-money-tab>

            <div id="content" class="sm-content tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane show active" role="tabpanel" aria-labelledby="tab-A">
                    <form @submit.prevent="moveToNext" name="quoteForm" id="countryForm" action="">
                        <div id="collapse-A" class="collapse show" role="tabpanel" aria-labelledby="heading-A">
                            <div class="card-body">
                                <h2 class="mb-4">Who is sending the money?</h2>
                                <form @submit.prevent="senderFormSubmit" name="senderForm" id="senderForm" action="">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="first_name">First Name</label>
                                                <input type="text" name="first_name" id="first_name"
                                                       class="form-control"
                                                       placeholder="Enter your first name"
                                                       v-model="senderForm.first_name">
                                                <has-error :form="senderForm" field="first_name"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="middle_name">Middle Name</label>
                                                <input type="text" name="middle_name" id="middle_name"
                                                       class="form-control"
                                                       placeholder="Enter your middle name "
                                                       v-model="senderForm.middle_name">
                                                <has-error :form="senderForm" field="middle_name"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="last_name">Last Name</label>
                                                <input type="text" name="last_name" id="last_name" class="form-control"
                                                       placeholder="Enter your last name"
                                                       v-model="senderForm.last_name">
                                                <has-error :form="senderForm" field="last_name"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="date_of_birth">Date Of Birth</label>
                                                <input type="text" name="date_of_birth" id="date_of_birth"
                                                       class="form-control"
                                                       placeholder="Enter your birth date(e.g: 06-07-1990)"
                                                       v-model="senderForm.date_of_birth">
                                                <has-error :form="senderForm" field="first_name"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="phone">Phone</label>
                                                <input type="text" name="phone" id="phone" class="form-control"
                                                       placeholder="Enter your phone no(e.g: +911234567899)"
                                                       v-model="senderForm.phone">
                                                <has-error :form="senderForm" field="phone"></has-error>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="country">Country</label>
                                                <div class="input-group">
                                                <span class="input-group-addon btn btn-outline-secondary">
                                                    <img :src="'images/country/flag-'+senderForm.country+ '.svg'">
                                                </span>
                                                <select class="form-control" name="country" v-model="senderForm.country" id="country">
                                                    <option v-for="(country,code) in currencies" :key="code" :value="code">{{ country }}({{code}})</option>
                                                </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="address">Address</label>
                                                <input type="text" name="address" id="address" class="form-control"
                                                       placeholder="Enter your address" v-model="senderForm.address">
                                                <has-error :form="senderForm" field="address"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="city">City</label>
                                                <input type="text" name="city" id="city" class="form-control"
                                                       placeholder="Enter your city" v-model="senderForm.city">
                                                <has-error :form="senderForm" field="City"></has-error>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="occupation">Occupation</label>
                                                <select name="occupation" id="occupation" class="form-control"
                                                        v-model="senderForm.occupation" @change="changeOccupation">
                                                    <option value="">Select Occupation</option>
                                                    <option>Salaried personnel</option>
                                                    <option>Self-employed</option>
                                                    <option>Retired</option>
                                                    <option>Entrepreneur</option>
                                                    <option>Stay at home partner</option>
                                                    <option>Stay at home partner</option>
                                                    <option>Other</option>
                                                </select>
                                                <has-error :form="senderForm" field="occupation"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="signin-label" for="occupation">&nbsp;&nbsp;</label>
                                                <input type="text" name="occupation" id="other_occupation"
                                                       class="form-control"
                                                       placeholder="Enter your occupation"
                                                       v-model="senderForm.other_occupation"
                                                       v-show="other_occupation">
                                                <has-error :form="senderForm" field="other_occupation"></has-error>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary" :disabled="senderForm.busy">Continue</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </form>
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
                other_occupation: false,
                senderForm: new Form({
                    first_name: '',
                    middle_name: '',
                    last_name: '',
                    date_of_birth: '',
                    phone: '',
                    country: 'INR',
                    state: '',
                    city: '',
                    address: '',
                    postal_code: '',
                    occupation: '',
                    other_occupation: ''
                }),

            }

        },
        mounted() {

            if (this.$userInfo.trw_profile != null) {
                this.$router.push('/recipient');
            }
        },
        created() {
            // var sendForm = JSON.parse(localStorage.getItem('sendForm'));
            // this.quoteForm.sourceCurrency = sendForm.sourceCurrency;
            this.getCurrency();
            // console.log("countries: ", this.countries);

        },
        methods: {
            changeOccupation() {
                // alert(this.senderForm.occupation);
                if (this.senderForm.occupation == 'Other') {
                    this.other_occupation = true;
                } else {
                    this.other_occupation = false;
                }
            },
            senderFormSubmit() {

                this.loginError = '';
                this.$Progress.start();
                this.senderForm.post('api/user/profile')
                    .then((response) => {
                        if (response.data.Success == true) {
                            this.senderForm.reset();
                            toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.$router.push('/recipient');
                        } else {
                            toast.fire({
                                icon: 'error',
                                title: response.data.Message
                            });
                        }
                        this.$Progress.finish()
                    })
                    .catch((error) => {
                        this.$Progress.fail()
                        toast.fire({
                            icon: 'error',
                            title: error.message
                        });
                    });
            },

        },
        watch: {}
    }
</script>
<style lang="scss" scoped>

</style>

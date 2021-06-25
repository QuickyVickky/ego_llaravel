<template>
    <div id="content-block">
        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <router-link :to="{path: '/home'}">home</router-link>
                <a href="#">MyAccount</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="row">

                <div class="col-md-9 col-md-push-3">
                    <div class="empty-space col-xs-b35 col-md-b50"></div>

                    <div class="row" v-if="$route.params.page == 'addresses'">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6"><h4 class="h4 col-xs-b25">Manage Addresses</h4></div>
                                <div class="col-sm-6">
                                    <div class="text-right">
                                        <a class="button size-1 style-2" @click="newAddress()">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="public/front/img/icon-4.png" alt=""></span>
                                                <span class="text">new Address</span>
                                            </span>

                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row main-card" v-if="(addresses != undefined || addresses != null ) && Object.keys(addresses).length > 0">
                                    <div class="col-sm-6" v-for="(address,index) in addresses" :key="index">
                                    <div class="card" style="min-height: 130px; margin-bottom: 10px;">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ address.full_name }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">{{ address.phone }}</h6>
                                            <p class="card-text">
                                                {{ address.address1 }}, {{ address.address2 }}, {{ address.city }}, {{ address.state }}- {{ address.postcode }}
                                            </p>
                                            <a class="card-link mr-10" v-if="address.is_default == 1">Default</a>
                                            <a class="card-link mr-10" v-else>Make as Default</a>
                                            <a class="card-link mr-10" @click="editAddress(address)">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container text-center" v-else>
                                <img src="public/front/img/empty_myaddresses.png">
                                <div class="h4">Add a delivery address.</div>
                                <div class="simple-article size-4 grey">
                                    Add a delivery address.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-else-if="$route.params.page == 'wishlist'">
                        <div class="col-sm-12">
                            <h4 class="h4 col-xs-b25">My Wishlist</h4>
                            <div class="row m10 main-card">
                                <div class="container" v-if="Object.keys(wishlist).length > 0">
                                    <table class="cart-table">
                                        <thead>
                                        <tr>
                                            <th style="width: 95px;"></th>
                                            <th>product name</th>
                                            <th style="width: 150px;">price</th>
                                            <th style="width: 150px;">Date</th>
                                            <th style="width: 70px;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(list, index) in wishlist" :key="index">
                                            <td :data-title="list.product.name">
                                                <router-link class="cart-entry-thumbnail" :to="{path: 'product/'+list.product.slug}">
                                                    <img height="90" width="85" :src="$ImageUrl + list.product.default_image.image" alt="">
                                                </router-link>
                                            </td>
                                            <td data-title=" ">
                                                <h6 class="h6"><router-link :to="{path: '/product/'+list.product.slug}">{{ list.product.name }}</router-link></h6>
                                            </td>
                                            <td data-title="Price: ">₹{{ list.product.selling_price }}</td>
                                            <td data-title="Total:">{{ list.created_at|formatDate }}</td>
                                            <td data-title="">
                                                <div class="button-close" @click="removeToWishlist(list.id)"></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="empty-space col-xs-b35"></div>
                                </div>
                                <div class="container text-center" v-else>
                                    <img src="public/front/img/empty.png">
                                    <div class="h4">Empty Wishlist</div>
                                    <div class="simple-article size-4 grey">
                                        You have no items in your wishlist. Start adding!
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-else-if="$route.params.page == 'orders'">
                        <div class="col-sm-12">
                            <h4 class="h4 col-xs-b25">My Orders</h4>
                            <div class="row m10 main-card">
                                <div class="container" v-if="(orders != undefined || orders != null) && Object.keys(orders).length > 0">
                                    <table class="cart-table">
                                        <thead>
                                        <tr>
                                            <th>Order Detail</th>
                                            <th style="width: 150px;">Order Amount</th>
                                            <th>Shipping</th>
                                            <th style="width: 70px;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(order, index) in orders" :key="index">
                                            <td>
                                                <div class="entry">
                                                    <b>Order #: </b>{{ order.order_number }}<br>
                                                    <b>Order Mode: </b> {{ order.payment_type }}<br>
                                                    <b>Status: </b>{{ order.transaction_status }}<br>
                                                    <b>Date: </b>{{ order.created_at|formatDate }}
                                                </div>
                                            </td>
                                            <td>₹ {{ order.total_amount }}</td>
                                            <td>Name:  {{ order.ship_name }}<br>
                                                Phone:  {{ order.ship_phone }}<br>
                                                Address: {{ order.ship_address1}}, {{ order.ship_address2}}, {{ order.ship_city}},
                                                {{ order.ship_state}},  {{ order.ship_country}},  {{ order.ship_postcode}}</td>
                                            <td><div class="button-close" v-if="order.transaction_status == 'pending'"></div></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="empty-space col-xs-b35"></div>
                                </div>
                                <div class="container text-center col-md-b50" v-else>
                                    <img src="public/front/img/empty_orders.png">
                                    <div class="h4">You have no orders</div>
                                    <router-link class="button size-1 style-2" to="/">
                                            <span class="button-wrapper">
                                                <span class="icon"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                                                <span class="text">Start Shopping</span>
                                            </span>
                                    </router-link>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-else-if="$route.params.page == 'change-password'">
                        <div class="col-sm-12">
                            <form @submit.prevent="updatePassword()" name="changePwdForm" id="changePwdForm" action="">
                                <h4 class="h4 col-xs-b25">Change Password</h4>
                                <div class="row m10 main-card">
                                    <div class="col-sm-6">
                                        <input class="simple-input" type="password" v-model="changePwdForm.current_password" placeholder="Enter your current password" :class="{ 'is-invalid': changePwdForm.errors.has('current_password') }"/>
                                        <has-error :form="changePwdForm" field="current_password"></has-error>
                                        <div class="empty-space col-xs-b20"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="simple-input" type="password" v-model="changePwdForm.password" placeholder="Enter your new password"  :class="{ 'is-invalid': changePwdForm.errors.has('password') }"/>
                                        <has-error :form="changePwdForm" field="password"></has-error>
                                        <div class="empty-space col-xs-b20"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="simple-input" type="password" v-model="changePwdForm.confirm_password" placeholder="Enter confirm password"  :class="{ 'is-invalid': changePwdForm.errors.has('confirm_password') }"/>
                                        <has-error :form="changePwdForm" field="confirm_password"></has-error>
                                        <div class="empty-space col-xs-b20"></div>

                                    </div>


                                    <div class="col-sm-12 text-right">
                                        <div class="button size-2 style-3">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="public/front/img/icon-4.png" alt=""></span>
                                                <span class="text">Change Password</span>
                                            </span>
                                            <input type="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row" v-else-if="$route.params.page == 'review'">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6"><h4 class="h4 col-xs-b25">My Review</h4></div>
                                <div class="col-sm-6"></div>
                            </div>

                            <div class="row main-card">
                                <div class="row main-card" v-if="(reviews != undefined || reviews != null ) && Object.keys(reviews).length > 0">
                                    <table class="cart-table">
                                        <thead>
                                        <tr>
                                            <th style="width: 200px;">Product Detail</th>
                                            <th style="width: 150px;">Title</th>
                                            <th style="width: 200px;">Comments</th>
                                            <th style="width: 120px;">Rating</th>
                                            <th style="width: 150px;">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(review, index) in reviews" :key="index">
                                            <td>
                                                <div class="entry">
                                                    <router-link :to="{ path: '/product/'+review.product.slug }" class="color">{{ review.product.name }}</router-link><br>
                                                    {{ review.product.sku }}<br>
                                                    {{ review.product.selling_price }}
                                                </div>
                                            </td>
                                            <td>{{ review.title }}</td>
                                            <td>{{ review.comment }}</td>
                                            <td>
                                                <div class="rate-wrapper align-inline">
                                                    <i aria-hidden="true" v-for="item in 5" :key="item" class="fa" :class="item <= review.rating ? 'fa fa-star' : 'fa fa-star-o'"></i>
                                                </div>
                                                <div class="align-inline">
                                                    <span>{{ review.rating }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                {{ review.created_at|formatDate }}
<!--                                                <div class="icons">-->
<!--                                                    <a class="entry"><i class="fa fa-edit" aria-hidden="true"></i></a>-->
<!--                                                </div>-->
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="empty-space col-xs-b35"></div>
                                </div>
                                <div class="container text-center" v-else>
                                    <img src="public/front/img/empty_reviews.png">
                                    <div class="h4">No Reviews & Ratings</div>
                                    <div class="simple-article size-4 grey">
                                        You have not rated or reviewed any product yet!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-else>
                        <div class="col-sm-12">
                            <form @submit.prevent="updateProfile()" name="profileForm" id="profileForm" action="">
                                <h4 class="h4 col-xs-b25">Manage information</h4>
                                <div class="row m10 main-card">
                                    <div class="col-sm-6">
                                        <input class="simple-input" type="email" disabled v-model="$userInfo.email" placeholder="User Email" />
                                        <div class="empty-space col-xs-b20"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="simple-input" type="text" v-model="profileForm.name" placeholder="User name" :class="{ 'is-invalid': profileForm.errors.has('name') }"/>
                                        <has-error :form="profileForm" field="name"></has-error>
                                        <div class="empty-space col-xs-b20"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="simple-input" type="number" v-model="profileForm.phone" placeholder="Phone number"  :class="{ 'is-invalid': profileForm.errors.has('phone') }"/>
                                        <has-error :form="profileForm" field="phone"></has-error>
                                        <div class="empty-space col-xs-b20"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="simple-input" type="text" v-model="profileForm.date_of_birth" placeholder="Birth date"  :class="{ 'is-invalid': profileForm.errors.has('date_of_birth') }"/>
                                        <has-error :form="profileForm" field="date_of_birth"></has-error>
                                        <div class="empty-space col-xs-b20"></div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="align-inline">
                                            <div class="empty-space col-xs-b5"></div>
                                            <div class="simple-article size-3">Gender&nbsp;&nbsp;&nbsp;</div>
                                            <div class="empty-space col-xs-b5"></div>
                                        </div>
                                        <div class="align-inline">
                                            <div class="empty-space col-xs-b5"></div>
                                            <label class="checkbox-entry radio">
                                                <input type="radio" name="gender" value="Male" v-model="profileForm.gender"><span>Male</span>
                                            </label>
                                            <div class="empty-space col-xs-b5"></div>
                                        </div>
                                        <div class="align-inline">
                                            <div class="empty-space col-xs-b5"></div>
                                            <label class="checkbox-entry radio">
                                                <input type="radio" name="gender" value="FeMale" v-model="profileForm.gender"><span>FeMale</span>
                                            </label>
                                            <div class="empty-space col-xs-b5"></div>
                                        </div>
                                        <div class="empty-space col-xs-b20"></div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="button size-2 style-3">
                                            <span class="button-wrapper">
                                                <span class="icon"><i class="fa fa-upload"></i></span>
                                                <span class="text">Select Profile Image</span>
                                            </span>
                                            <input class="simple-input" type="file" ref="file" v-on:change="handleFileUpload()" />
                                        </div>


                                        <div class="empty-space col-xs-b20"></div>
                                    </div>

                                    <div class="col-sm-12 text-right">
                                        <div class="button size-2 style-3">
                                            <span class="button-wrapper">
                                                <span class="icon"><img src="public/front/img/icon-4.png" alt=""></span>
                                                <span class="text">Update</span>
                                            </span>
                                            <input type="submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b35 col-md-b70"></div>
                    <div class="empty-space col-md-b70"></div>
                </div>

                <div class="col-md-3 col-md-pull-9">
                    <div class="simple-article size-1">
                        Hello, <b class="grey">{{ profileForm.name}}</b>
                    </div>
                    <div class="empty-space col-xs-b25 col-sm-b30"></div>

                    <div class="h4 col-xs-b10">My Account</div>
                    <ul class="categories-menu transparent">
                        <li>
                            <router-link :to="{ path: '/myaccount' }">Manage Profile</router-link>
                        </li>
                        <li>
                            <router-link :to="{ path: '/myaccount/addresses' }">Manage Address</router-link>
                        </li>
                        <li>
                            <router-link :to="{ path: '/myaccount/wishlist' }">My Wishlist</router-link>
                        </li>
                        <li>
                            <router-link :to="{ path: '/myaccount/orders' }">My Orders</router-link>
                        </li>
                        <li>
                            <router-link :to="{ path: '/myaccount/change-password' }">Change Password</router-link>
                        </li>
                        <li>
                            <router-link :to="{ path: '/myaccount/review' }">My Review && Ratings</router-link>
                        </li>
                    </ul>
                    <div class="empty-space col-xs-b25 col-sm-b50"></div>
                </div>
            </div>

        </div>

        <div class="popup-wrapper">
            <div class="bg-layer"></div>
            <div class="popup-content" data-rel="1" id="addressDialog">
                <div class="layer-close"></div>
                <form @submit.prevent="addressEdit ? updateAddress() : saveAddress() " name="addressForm" id="addressForm" action="">
<!--                <form @submit.prevent="updateAddress" name="addressForm" id="addressForm" action="">-->
                    <div class="popup-container size-1">
                        <div class="popup-align">
                            <h3 class="h3 text-center" v-if="addressForm.id == ''">New Address</h3>
                            <h3 class="h3 text-center" v-else>Edit Address</h3>
                            <div class="empty-space col-xs-b30"></div>
                            <input class="simple-input" type="text" value="" placeholder="full name" v-model="addressForm.full_name" :class="{ 'is-invalid': addressForm.errors.has('full_name') }"/>
                            <has-error :form="addressForm" field="full_name"></has-error>
                            <div class="empty-space col-xs-b10 col-sm-b20"></div>
                            <input class="simple-input" type="number" value="" placeholder="Enter phone number" v-model="addressForm.phone" :class="{ 'is-invalid': addressForm.errors.has('phone') }" />
                            <has-error :form="addressForm" field="phone"></has-error>
                            <div class="empty-space col-xs-b10 col-sm-b20"></div>
                            <textarea class="simple-input" placeholder="Enter address1" v-model="addressForm.address1" :class="{ 'is-invalid': addressForm.errors.has('address1') }" ></textarea>
                            <has-error :form="addressForm" field="address1"></has-error>
                            <div class="empty-space col-xs-b10 col-sm-b20"></div>
                            <textarea class="simple-input" placeholder="Enter address2" v-model="addressForm.address2" :class="{ 'is-invalid': addressForm.errors.has('address2') }" ></textarea>
                            <has-error :form="addressForm" field="address2"></has-error>
                            <div class="empty-space col-xs-b10 col-sm-b20"></div>
                            <input type="text" class="simple-input" placeholder="Enter city" v-model="addressForm.city" :class="{ 'is-invalid': addressForm.errors.has('city') }" />
                            <has-error :form="addressForm" field="city"></has-error>
                            <div class="empty-space col-xs-b10 col-sm-b20"></div>
                            <input type="text" class="simple-input" placeholder="Enter state" v-model="addressForm.state" :class="{ 'is-invalid': addressForm.errors.has('state') }" />
                            <has-error :form="addressForm" field="state"></has-error>
                            <div class="empty-space col-xs-b10 col-sm-b20"></div>
                            <input type="number" class="simple-input" placeholder="Enter postcode" v-model="addressForm.postcode" :class="{ 'is-invalid': addressForm.errors.has('postcode') }" />
                            <has-error :form="addressForm" field="postcode"></has-error>
                            <div class="empty-space col-xs-b10 col-sm-b20"></div>
<!--                            <div class="row" v-if="errorMsg">-->
<!--                                <div class="alert alert-danger" >{{ errorMsg }}</div>-->
<!--                            </div>-->
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6 text-right">
                                    <button type="submit" class="button size-2 style-3 noshadow">
                                    <span class="button-wrapper">
                                        <span class="icon">
                                            <img src="public/front/img/icon-4.png" alt=""/></span>
                                        <span class="text">Save</span>
                                    </span>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="button-close"></div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</template>

<script>
    import { commonMethodMixin } from "../mixins/commonMethodMixin";
    import { wishlistMixin } from "../mixins/wishlistMixin";

    export default {
        mixins:[commonMethodMixin, wishlistMixin],
        data() {
            return {
                orders: {},
                changePwdForm: new Form({
                    current_password:'',
                    password:'',
                    confirm_password:''
                }),
                addressEdit: false,
                profileForm: new Form({
                    name:'',
                    date_of_birth:'',
                    gender:'Male',
                    phone:'',
                    image:'',
                }),
                reviews: {},
            }
        },
        created(){
            if(this.isLogin == false){
                this.openDialog('loginDialog');
                return false;
            }
            // console.log("User info",this.$userInfo);
            this.profileForm.fill(this.$userInfo);
        },
        mounted() {
            let route = this.$route.params.page
            this.getMethod(route);
        },
        methods: {
            getMethod(route){
                if(route == 'addresses'){
                    this.getAddresses();
                }else if(route == 'orders'){
                    this.getOrder();
                }else if(route == 'wishlist'){
                    this.getWishlist();
                }else if(route == 'review'){
                    this.getReview();
                }
            },
            newAddress(){
                try{
                    this.addressEdit = false;
                    this.$Progress.start();
                    this.addressForm.reset();
                    this.openDialog('addressDialog');
                }catch (e) {
                    this.$Progress.fail()
                    console.error('Error: ',e.message);
                }
            },
            editAddress(address){
                try{
                    this.$Progress.start();
                    this.addressEdit = true;
                    this.addressForm.reset();
                    this.addressForm.fill(address);
                    this.openDialog('addressDialog');
                }catch (e) {
                    this.$Progress.fail()
                    console.error('Error: ',e.message);
                }
            },
            getOrder() {
                this.$Progress.start();

                try {
                    axios.get('api/user/orders')
                        .then(response => {
                            console.log("response", response.data.Data)
                            this.orders = response.data.Data;
                            this.$Progress.finish()
                        });
                } catch (e) {
                    console.log('Error:', e.message);
                    this.$Progress.fail()
                }
            },
            updateProfile(){
                try{
                    this.$Progress.start();
                    this.profileForm.post('api/user/profile')
                        .then((response) => {
                            if (response.data.Success) {
                                toast.fire({
                                    icon: 'success',
                                    title: response.data.Message
                                });
                            } else {
                                toast.fire({
                                    icon: 'error',
                                    title: response.data.Message
                                });
                            }
                            // End progress bar
                            this.$Progress.finish();
                        }).catch((error) => {
                        // Progress bar failed
                        this.$Progress.fail()
                        toast.fire({
                            icon: 'error',
                            title: 'Sorry, something went wrong there.'
                        });
                    });
                }catch (e) {
                    this.$Progress.fail()
                    console.error('Error: ',e.message);
                    toast.fire({
                        icon: 'error',
                        title: 'Sorry, something went wrong there.'
                    });
                }
            },
            handleFileUpload(){
                this.profileForm.image = this.$refs.file.files[0];
            },
            updatePassword(){
                try{
                    this.$Progress.start();
                    this.changePwdForm.post('api/user/change-password')
                        .then((response) => {
                            if (response.data.Success) {
                                toast.fire({
                                    icon: 'success',
                                    title: response.data.Message
                                });
                                this.changePwdForm.reset();
                            } else {
                                toast.fire({
                                    icon: 'error',
                                    title: response.data.Message
                                });
                            }
                            // End progress bar
                            this.$Progress.finish();
                        }).catch((error) => {
                        // Progress bar failed
                        this.$Progress.fail()
                        toast.fire({
                            icon: 'error',
                            title: 'Sorry, something went wrong there.'
                        });
                    });
                }catch (e) {
                    this.$Progress.fail()
                    console.error('Error: ',e.message);
                    toast.fire({
                        icon: 'error',
                        title: 'Sorry, something went wrong there.'
                    });
                }
            },
            getReview(){
                try{
                    this.$Progress.start();
                    axios.get('api/user/reviews')
                        .then((response) => {
                        if (response.data.Success) {
                            this.reviews = response.data.Data;
                        }else{
                            this.$Progress.fail()
                            console.error('Error: ',e.message);
                        }
                    }).catch((error) => {
                        // Progress bar failed
                        this.$Progress.fail()
                        console.error('Error: ',e.message);
                    });
                }catch (e) {
                    this.$Progress.fail()
                    console.error('Error: ',e.message);
                }
            }
        },
        watch: {
            $route(to, from) {
                let route = to.params.page
                this.getMethod(route);
            }
        },

    }
</script>
<style>
    textarea.simple-input {
        padding-top: 10px;
        padding-bottom: 10px;
        line-height: 22px;
        height: 75px;
    }

    .categories-menu .router-link-exact-active{
        color: #b8cd06;
    }

    .cart-table tbody td{
        text-align: left;
    }
</style>

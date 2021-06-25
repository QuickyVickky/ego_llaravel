export const wishlistMixin = {
    data() {
        return {
            isLogin: false,
            wishlist:{},
            wishlistForm: new Form({
                product_id:null,
            }),
        }
    },
    created(){
        let userInfo = localStorage.getItem('user');
        // console.log('userInfo',userInfo);
        if (userInfo != null) {
            const userData = JSON.parse(userInfo);
            this.$accessToken = JSON.parse(localStorage.getItem('access_token'));
            this.$userInfo = userData;
            this.isLogin = true;
            // console.log('userData',userData);
        }
    },
    methods: {
        getWishlist(){
            try{
                this.$Progress.start();
                axios.get('api/user/favourite')
                    .then((response) => {
                        this.wishlist = response.data.Data;
                        // End progress bar
                        this.$Progress.finish();
                    }).catch((error) => {
                    // Progress bar failed
                    this.$Progress.fail()
                });;
            }catch (e) {
                console.error(e.message);
                this.$Progress.fail()
            }
        },
        addToWishlist(productId) {

            try {
                this.$Progress.start();
                if (!this.isLogin) {
                    this.openDialog('loginDialog');
                    return false;
                }
                this.wishlistForm.product_id = productId;
                this.wishlistForm.post('api/user/favourite')
                    .then((response) => {
                        if (response.data.Success) {
                            toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                        } else {
                            this.errorMsg = response.data.Message;
                            toast.fire({
                                icon: 'error',
                                title: this.errorMsg
                            });
                        }
                        // End progress bar
                        this.$Progress.finish();
                    }).catch((error) => {
                    // Progress bar failed
                    this.$Progress.fail()
                    toast.fire({
                        icon: 'error',
                        title: error.merge
                    });
                });

                // this.loginForm.reset();
            }catch (e) {
                this.$Progress.fail()
                console.error('Error: ',e.message);
            }
        },
        removeToWishlist(Id) {

            try {
                this.$Progress.start();
                axios.delete('api/user/favourite/'+Id)
                    .then((response) => {
                        if (response.data.Success) {
                            toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.getWishlist();
                        } else {
                            this.errorMsg = response.data.Message;
                            toast.fire({
                                icon: 'error',
                                title: this.errorMsg
                            });
                        }
                        // End progress bar
                        this.$Progress.finish();
                    }).catch((error) => {
                    // Progress bar failed
                    this.$Progress.fail()
                    toast.fire({
                        icon: 'error',
                        title: error.merge
                    });
                });

                // this.loginForm.reset();
            }catch (e) {
                this.$Progress.fail()
                console.error('Error: ',e.message);
            }
        },
    },
}

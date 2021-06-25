export const cartMixin = {
    data() {
        return {
            isLogin: false,
            carts: {},
            cartForm: new Form({
                product_id: null,
                color: '',
                size: '',
                name: '',
                quantity: 1
            }),
            totalCartAmount: 0
        }
    },
    created() {
        this.getCart();
    },
    methods: {
        getCart() {
            try {
                this.$Progress.start();
                axios.get('api/user/cart')
                    .then((response) => {
                        this.carts = response.data.Data;
                        this.totalCartAmount = this.cartTotal();
                        // End progress bar
                        this.$Progress.finish();
                    }).catch((error) => {
                    // Progress bar failed
                    this.$Progress.fail()
                });
            } catch (e) {
                console.error(e.message);
                this.$Progress.fail()
            }
        },
        addToCart() {
            this.$Progress.start();
            if (!this.isLogin) {
                this.openDialog('loginDialog');
                return false;
            }

            this.cartForm.post('api/user/cart')
                .then((response) => {

                    if (response.data.Success) {
                        toast.fire({
                            icon: 'success',
                            title: response.data.Message
                        });
                        this.cartForm.reset();
                        this.$router.push('/cart');
                        // window.location.reload();

                    } else {
                        this.errorMsg = response.data.Message;
                        toast.fire({
                            icon: 'error',
                            title: this.errorMsg
                        });
                    }

                    // Hide Modal

                    // End progress bar
                    this.$Progress.finish()
                }).catch((error) => {
                // Progress bar failed
                this.$Progress.fail()
            });

            // this.loginForm.reset();

        },
        totalPrice(price, quantity) {
            return price * quantity;
        },
        cartTotal() {
            try {
                let total = 0;
                if (this.carts != undefined || this.carts != null) {
                    for (let p of this.carts) {
                        total += (p.product.selling_price * p.quantity);

                    }
                }
                this.totalCartAmount = total;
                return total;
            } catch (e) {
                console.error('Error: ', e.message);
            }
        },
        removeToCart(Id) {
            try {
                this.$Progress.start();
                axios.delete('api/user/cart/' + Id)
                    .then((response) => {
                        if (response.data.Success) {
                            toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            this.getCart();
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
            } catch (e) {
                this.$Progress.fail()
                console.error('Error: ', e.message);
            }
        },
        updateCart(cartsData) {
            try {
                axios.post('api/user/cart/update',cartsData)
                    .then((response) => {

                        if(response.data.Success){
                            toast.fire({
                                icon: 'success',
                                title: response.data.Message
                            });
                            // this.$router.push('/cart');
                            this.getCart();
                            // window.location.reload();

                        }else{
                            this.errorMsg = response.data.Message;
                            toast.fire({
                                icon: 'error',
                                title: this.errorMsg
                            });
                        }

                        // Hide Modal

                        // End progress bar
                        this.$Progress.finish()
                    }).catch((error) => {
                    // Progress bar failed
                    this.$Progress.fail()
                });

            } catch (e) {
                this.$Progress.fail()
                console.error('Error: ', e.message);
            }
        }
    },
}

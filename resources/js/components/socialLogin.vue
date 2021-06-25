<template>

</template>
<script>
    import {commonMethodMixin} from "../mixins/commonMethodMixin";

    export default {
        mixins: [commonMethodMixin],
        props:['token','user','base_url'],
        data() {
            return {

            }

        },
        mounted() {

        },
        created() {
            try{
                console.log("base_url",this.base_url);
                localStorage.setItem('access_token', JSON.stringify(this.token));
                localStorage.setItem('user', JSON.stringify(this.user));
                this.$accessToken = this.token;
                this.$userInfo = this.user;
                // this.$router.push("/enterpayment");
                window.location.href = this.base_url+'/#/home';
            }catch (e) {
                console.log("Error: ",e.message);
            }



        },
    }
</script>

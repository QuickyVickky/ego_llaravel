<template>
    <div class="container">
        <div class="slider-wrapper" v-swiper:testimonialSwiper="swiperOption">
            <div class="swiper-button-prev hidden"></div>
            <div class="swiper-button-next hidden"></div>
            <div class="swiper-container" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2"
                 data-md-slides="2" data-lt-slides="3" data-slides-per-view="3" data-space="30">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" v-for="testimonial in testimonials" :key="testimonial.id">
                        <div class="icon-description-shortcode style-2">
                            <img class="image-icon image-thumbnail rounded-image" :src="$ImageUrl + testimonial.image"
                                 :alt="testimonial.name" style="height: 150px;width: 320px;" />
                            <div class="content">
                                <h6 class="title h6">{{ testimonial.name }}</h6>
                                <div class="description simple-article size-2">{{ testimonial.comment }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination relative-pagination"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                testimonials:[],
                swiperOption:{
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                }
            }
        },
        mounted() {
            this.getTestimonials();
        },
        methods:{
            getTestimonials(){
                try{
                    axios.get('api/testimonials')
                        .then(response => {
                            // console.log("response",response.data.Data);
                            this.testimonials = response.data.Data.testimonials;
                        });
                }catch (e) {
                    console.log('Error:',e.message);
                }
            }
        }
    }
</script>

<template>
    <div>
        <spin v-if="loading"></spin>
        <div class="shop-wrapper">
            <div style="display:flex; flex-wrap: wrap; " >
                <product 
                    v-for="product in products"
                    :id="product.id"
                    :name="product.name"
                    :price="product.price"
                    :img="product.img"
                    :description="product.description"
                    :catname="product.cat_name"
                    :isavailable="product.is_available"
                    
                />
            </div>
        </div>
     
    </div>
</template>

<script>
    import Spin from "../../components/Spin";
    import Product from "../../components/Shop/Product";
    import axios from 'axios';
    import {createCookie, getCookie} from '../../utils';
    export default {
        components: {
            Spin,
            getCookie,
            Product
        },
        data: () => ({
            loading: true,
            products: [],
            form: {
                user_id: "",
            },
            
        }),
        mounted() {
            this.getProductsInCart();
           
        },
        methods: {
            getProductsInCart() {
                this.form.user_id = getCookie('user_id');
                
                this.loading = true;
                axios.post('/api/v1/cart/get', this.form, {
                    headers: {
                        "Content-type": "application/json"
                    }
                })
                .then(res => {
                    console.log(res)
                    this.products = res.data;
                    if (res.data.status) {
                       
                        setTimeout(() => {
                            this.loading = false;
                        }, 300);
                    } else {
                      
                        this.error = true;
                    }
                })
            }

            
        }
    }
</script>

<style scoped>
    .uk-card {
        width: 40%;
        margin-right: 20px;
        margin-bottom: 20px;
    }

    .uk-card:last-child {
        margin-right: 0;
    }


    
</style>

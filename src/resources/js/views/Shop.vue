<template>
    <div>
        <spin v-if="loading"></spin>
        <button @click.prevent="sortByASC">Сортировать цены по ASC </button>
        <div class="shop-wrapper">
            
            <div class="category" style="display:flex; flex-wrap: wrap;" >
            <Cat 
                v-if="isShown"
                v-for="cat in cats"
                    :catname="cat.cat_name"
                    :cattag="cat.cat_tag"
                    :perentcattag="cat.perent_cat_tag"
                    :postscount="cat.posts_count"
                    :isshown="cat.is_shown"
            />
            </div>
      
            <div style="display:flex; flex-wrap: wrap; width:85%;" >
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
    import Spin from "../components/Spin";
    import axios from 'axios';
    import Product from "../components/Shop/Product";
    import Cat from "../components/Shop/Cat";
    export default {
        components: {
            Spin,
            Product,
            Cat
        },
        data: () => ({
            loading: true,
            isShown: true,
            products: [],
            cats: []
        }),
        mounted() {
            this.loadPosts();
            this.loadCats();
        },
        methods: {
            loadPosts() {
               axios.get('/api/v1/products')
                .then(res => {
                    console.log(res.data);
                    this.products = res.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 500)
                })
            },

            loadCats() {
               axios.get('/api/v1/cats')
                .then(res => {
                    console.log(res.data);
                    this.cats = res.data;
                    setTimeout(() => {
                        this.loading = false;
                    }, 500)
                })
            },

            sortByASC() {
               axios.get('/api/v1/filter/desc')
                .then(res => {
                    this.products = [];
                    this.products = res.data;
                    
                    setTimeout(() => {
                        this.loading = false;
                    }, 500)
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

    .category{
        flex-direction: column;
    }
    .category ul{
        margin: 5px 0px 5px;
        border: 1px solid grey;
        text-align: center;
        padding: 0px 20px 0px;
        border-radius: 3px;
    }
    .shop-wrapper{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    
</style>

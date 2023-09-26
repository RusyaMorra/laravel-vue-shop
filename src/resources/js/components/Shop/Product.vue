<template>
    <div class="uk-card uk-card-default uk-width-1-2@m">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom"><a v-bind:href="'/productspage/'+ id">{{name}}</a></h3>
                    <p class="uk-text-meta uk-margin-remove-top">
                        <h1 id = "product-id"></h1>
                        <time datetime="2016-04-01T19:00">{{price}} тенге</time><br>
                        <time datetime="2016-04-01T19:00">{{isavailable == '1'?'есть в наличии':'нет в наличии'}}</time> <br>
                        <div>{{catname}}</div> <br>
                        <time datetime="2016-04-01T19:00"></time>
                    </p>
                </div>
            </div>
        </div>
        <img :src="img" class="img-product" alt="">
        <div class="uk-card-body">
            <p>{{ description }}</p>
        </div>
        <div class="uk-card-footer">
            <button href="#" class="uk-button uk-button-text" ::data-id="id"  @click.prevent="addCart($event)">Добавить в корзину</button>
        </div>
    </div>
</template>

<script>
    import {createCookie, getCookie} from '../../utils';

    export default {
        props: {
            id: {
                type: Number,
                default: "NULL"
            },
            name: {
                type: String,
                default: "NULL"
            },
            price: {
                type: String,
                default: "NULL"
            },
            img: {
                type: String,
                default: "NULL"
            },
            description: {
                type: String,
                default: "NULL"
            },
            catname: {
                type: String,
                default: "NULL"
            },
            isavailable: {
                type: Number,
                default: "NULL"
            }
        },
        components: {
            getCookie
        },
        data: () => ({
            form: {
                user_id: "",
                product_id: "",
             
            },
            loading: false,
            error: false
        }),
        methods: {
            addCart(e) {
                this.form.user_id = getCookie('user_id');
                this.form.product_id = e.target.attributes[2].nodeValue;
                console.log(this.form);


                this.loading = true;
                axios.post('/api/v1/cart/add', this.form, {
                    headers: {
                        "Content-type": "application/json"
                    }
                })
                .then(res => {
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
  .img-product{
    width: 100% !important;
    
    
  }
</style>

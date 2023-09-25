<template>
    <div class="uk-card uk-card-default uk-width-1-2@m">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom"><a v-bind:href="'/productspage/'+ id">{{name}}</a></h3>
                    <p class="uk-text-meta uk-margin-remove-top">
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
            <a href="#" class="uk-button uk-button-text">Добавить в корзину</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            id: {
                type: String,
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
        }
    }
</script>

<style scoped>
  .img-product{
    width: 100% !important;
    
    
  }
</style>

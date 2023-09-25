<template>
    
            <ul><a>{{catname}}</a></ul>
        
    
</template>

<script>
    export default {
        props: {
            catname: {
                type: String,
                default: "NULL"
            },
            cattag: {
                type: String,
                default: "NULL"
            },
            perentcattag: {
                type: String,
                default: "NULL"
            },
            postscount: {
                type: Number,
                default: "NULL"
            },
            isshown: {
                type: String,
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

<template>
    <div>
        <p id="success"></p>
        <span>
           <i style="cursor:pointer" @click.prevent="likePost" class="fa fa-heart" aria-hidden="true"></i>
           <small>Vote up({{ totallike }})</small>
        </span>
       
    </div> 
</template>
<script>
    export default {
        props:['post'],
        data(){
            return {
                totallike:'',
            }
        },
        methods:{
            likePost(){
                axios.post('/like/'+this.post,{post:this.post})
                .then(response =>{
                    this.getlike()
                    $('#success').html(response.data.message)
                })
                .catch()
            },
            getlike(){
                axios.post('/like',{post:this.post})
                .then(response =>{
                    console.log(response.data.post.like)
                    this.totallike = response.data.post.like
                })
            }
        },
        mounted() {
            this.getlike()
        }
    }
</script> 

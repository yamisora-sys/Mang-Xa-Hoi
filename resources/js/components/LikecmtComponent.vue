<template>
    <span>
        <p id="success"></p>
           <i style="cursor:pointer" @click.prevent="likePost" class="fa fa-chevron-up" aria-hidden="true"></i>
           <small>Up({{ totallike }})</small>
    </span> 
</template>
<script>
    export default {
        props:['comment'],
        data(){
            return {
                totallike:'',
            }
        },
        methods:{
            likePost(){
                axios.post('/likecomment/'+this.comment,{comment:this.comment})
                .then(response =>{
                    this.getlike()
                    $('#success').html(response.data.message)
                })
                .catch()
            },
            getlike(){
                axios.post('/likecomment',{comment:this.comment})
                .then(response =>{
                    console.log(response.data.comment.like)
                    this.totallike = response.data.comment.like
                })
            }
        },
        mounted() {
            this.getlike()
        }
    }
</script> 

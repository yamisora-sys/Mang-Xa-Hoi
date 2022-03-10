<template>
    <span>
    <p id="success"></p>
       <i style="cursor:pointer" @click.prevent="disLikePost" class="fa fa-chevron-down" aria-hidden="true"></i>
       <small>
           Down({{ totalDislike }})
       </small>
    </span>
</template>
<script>
    export default {
        props:['comment'],
        data(){
            return {
                totalDislike:'',
            }
        },
        methods:{
            disLikePost(){
                axios.post('/dislikecomment/'+this.comment,{comment:this.comment})
                .then(response =>{
                    this.getDislike()
                    $('#success').html(response.data.message)
                })
                .catch()
            },
            getDislike(){
                axios.post('/dislikecomment',{comment:this.comment})
                .then(response =>{
                    console.log(response.data.comment.dislike)
                    this.totalDislike = response.data.comment.dislike
                })
            }
        },
        mounted() {
            this.getDislike()
        }
    }
</script> 
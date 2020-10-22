<template>
    <div>
        <button class="btn btn-primary ml-4 " @click="followUser" style="padding:1px 5px" v-text="btntext"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId','follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data: function (param) {
                return{
                    status: this.follows,
                }
            },

        methods: {
            followUser(){
                axios.post('/follow/' + this.userId)
                .then(response =>{
                    this.status = ! this.status;
                    console.log(response.data);
                })
                .catch(errors =>{
                    if (errors.response.status == 401) {
                        window,location = '/login';
                    }
                })
            }
        },
        computed:{
            btntext(){
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>

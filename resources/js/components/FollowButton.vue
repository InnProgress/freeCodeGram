<template>
    <button @click="toggleFollow"
    class="rounded border border-secondary px-4 ml-3 font-weight-bold d-inline"
    :class="{'btn-primary': !status, 'btn-secondary': status}">
        {{ buttonText }}
    </button>
</template>

<script>
    export default {
        props: [
            'userId',
            'follows'
        ],
        data() {
            return {
                status: this.follows
            }
        },
        methods: {
            toggleFollow() {
                axios.get(`/follow/${this.userId}`)
                .then((res)=> {
                    this.status = !this.status;
                }).catch(error => {
                    if(error.response.status === 401) {
                        window.location = '/login';
                    }
                });
            }
        },
        computed: {
            buttonText() {
                return this.status ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>

<template>
    <div class="ext-center">
        <button @click.prevent="logout" type="button" class="px-5 py-3 rounded-md text-md width-full text-white bg-blue hover:text-white hover:bg-indigo-700">Sign out</button>
    </div>
</template>

<script>
export default {
    props: ['route'],
    name: "sign-out-button",
    data: function(){
        return{
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods: {
        logout: function () {
            axios.post('/logout',).then(response => {

                // normal logout
                if (response.data.status === "success") {
                    window.location.href = this.route;
                }
            }).catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

<style scoped>

</style>

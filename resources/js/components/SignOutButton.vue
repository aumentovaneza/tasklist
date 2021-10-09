<template>
    <div class="ext-center">
        <button @click.prevent="logout"
                type="button"
                class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm
                font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none
                focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-red-500"
        >
           Sign out
        </button>
    </div>
</template>

<script>
export default {
    props: ['route'],
    name: "SignOutButton",
    data: function(){
        return{
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    },
    methods: {
        logout: function () {
            axios.post('/logout',).then(response => {
                window.location.href = this.route;
            }).catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

<style scoped>

</style>

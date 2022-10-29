<template>
    <div>
        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 h-full">
            <li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow h-96">
                <div class="w-full p-5 border-b border-gray-300">
                    <h2>Common</h2>
                </div>
            </li>
            <li v-for="group in groups" class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow h-96">
                <div class="w-full p-5 border-b border-gray-300">
                    <h2>{{ group.name }}</h2>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import draggable from 'vuedraggable';

export default {
    name: "GroupListComponent",
    components: {
        draggable,
    },
    data : function (){
        return {
            'id' : null,
            'showModal' : false,
            'groups' : [],
        }
    },
    mounted() {
        this.getGroups();
    },
    methods : {
        getGroups() {
            axios.get('../user/groups').then((response) => {
                console.log(response.data.data);
                this.groups  = response.data.data;
            });
        },
        hideModal(){
            this.showModal = false;
        }
    }
}
</script>

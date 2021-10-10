<template>
    <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none bg-black bg-opacity-60 focus:outline-none justify-center items-center" v-if="showModal">
        <div class="relative w-auto my-6 mx-auto max-w-5xl">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                    <h3 class="text-xl font-semibold">
                        <span class="wide">Restore Archived Tasks Modal</span>
                    </h3>
                    <button class="p-1 text-gray-500 ml-auto bg-transparent border-0 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="hideModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                <div class="space-y-8 sm:space-y-5">
                    <div class="space-y-6 p-5 sm:space-y-5">
                        <div class="bg-white shadow overflow-hidden sm:rounded-md">
                            <ul role="list" class="divide-y divide-gray-200">
                                <task-item-restore-component v-for="task in archived" :task="task" :key="task.id"></task-item-restore-component>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RestoreArchivedTasksModal",
    props : ['showModal','action'],
    data : function() {
        return {
            archived : []
        }
    },
    mounted(){
        if(this.action === 'restore_task'){
            this.getArchived();
        }
    },
    methods : {
        getArchived(){
            axios.get('../user/tasks/get/archived').then((response) => {
                this.archived  = response.data.data;
            });
        },
        hideModal() {
            this.$emit("click", this.showModal);
        },
    }
}
</script>

<style scoped>

</style>

<template>
    <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none bg-black bg-opacity-60 focus:outline-none justify-center items-center" v-if="showModal">
        <div class="relative w-auto my-6 mx-auto max-w-5xl">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                    <h3 class="text-xl font-semibold">
                        <span class="wide">Task Modal</span>
                    </h3>
                    <button class="p-1 text-gray-500 ml-auto bg-transparent border-0 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="hideModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                <div class="space-y-8 sm:space-y-5">
                    <div class="space-y-6 p-5 sm:space-y-5">
                        <form class="space-y-8 divide-y divide-gray-200">
                            <div class="space-y-8 divide-y divide-gray-200">
                                <div>
                                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Task Name
                                            </label>
                                            <div class="mt-1 mb-5">
                                                <input type="text" v-model="task.name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Task Description
                                            </label>
                                            <div class="mt-1 mb-5">
                                                <textarea rows="3" v-model="task.description" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                                            </div>
                                            <label class="block text-sm font-medium text-gray-700">Status</label>
                                            <div class="mt-1">
                                                <select v-model="task.status_id"
                                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                >
                                                    <option class="py-1 sm:text-sm" v-for="status in statusList" :value="status.id">{{ status.name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Start Date
                                            </label>
                                            <div class="mt-1 mb-5">
                                                <input type="date" v-model="task.start_date" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md">
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">
                                                End Date
                                            </label>
                                            <div class="mt-1 mb-5">
                                                <input type="date" v-model="task.end_date" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
<!--                <div class="space-y-8 sm:space-y-5">-->
<!--                    <div class="space-y-6 p-5 sm:space-y-5">-->
<!--                        <div class="space-y-8 divide-y divide-gray-200">-->
<!--                            <div class="flex">-->
<!--                                <h3 class="text-xl font-semibold mr-5">-->
<!--                                    <span class="wide">Subtasks</span>-->
<!--                                </h3>-->
<!--                                <generic-button text='Create Subtask' :parent="parent" color="blue" action="create_new_task"></generic-button>-->
<!--                            </div>-->
<!--                            <div v-if="subtasks.length > 0">-->
<!--                            <div class="bg-white shadow overflow-hidden sm:rounded-md">-->
<!--                                <ul role="list" class="divide-y divide-gray-200">-->
<!--                                    <task-item-component-->
<!--                                        v-for="task in subtasks"-->
<!--                                        :key="task.id"-->
<!--                                        :id = "task.id"-->
<!--                                        :name= "task.name"-->
<!--                                        :description= "task.description"-->
<!--                                        :started = "task.start_date"-->
<!--                                        :status =  "task.status"-->
<!--                                        :parent = "parent"-->
<!--                                    ></task-item-component>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="pt-5">
                    <div class="flex justify-end p-5">
                        <button @click="hideModal()" type="button" class="text-white py-2 px-6 border-2 border-red-500 bg-red-500 rounded-md shadow-sm text-sm font-medium bg-transparent hover:bg-red-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Cancel
                        </button>
                        <button @click="saveForm()" type="button" class="ml-3 inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";

export default {
    name: "TaskModal",
    props : ['showModal', 'action', 'id', 'parent'],
    data :function() {
        return {
            'parent_id'         : this.parent,
            'statusList'        : [],
            'subtasks'          : [],
            task:{
                'name'          : '',
                'description'   : '',
                'start_date'    : '',
                'end_date'      : '',
                'status_id'     : 2,
                'order'         : null
            }
        }
    },
    mounted() {
        console.log(this.id, this.action);
        if(this.id){
            this.getStatusList();
            this.getTaskItem();
        }

        if(this.action === 'create_new_task') {
            this.getStatusList();
        }

    },
    methods : {
        hideModal() {
            this.$emit("click", this.showModal);
        },
        getTaskItem() {
            axios.get('../user/task/'+this.id).then((response) => {
                this.task.name          = response.data.data.name;
                this.task.description   = response.data.data.description;
                this.task.start_date    = moment(response.data.data.start_date).format('yyyy-M-DD');
                this.task.end_date      = moment(response.data.data.end_date).format('yyyy-M-DD');
                this.task.order         = response.data.data.order;
                this.task.status_id     = response.data.data.status.id;
                this.subtasks           = response.data.data.subtasks;
            });
        },
        saveForm() {
            axios.post('../user/manage/task',{
                id              : this.id,
                name            : this.task.name,
                description     : this.task.description,
                status_id       : this.task.status_id,
                start_date      : this.task.start_date,
                end_date        : this.task.end_date,
                order           : this.task.order,
                parent_task_id  : this.parent_id,
            }).catch((error)=>{
                this.$swal('Error',error.data.message,"error");
            }).then((response) => {
                this.clearForm();
                this.hideModal();
                // this.$forceUpdate()
                window.location.reload();
            });
        },
        getStatusList(){
            axios.get('../user/get/all/statuses').then((data) => {
                this.statusList = data.data.data;
            });
        },
        clearParentId(){
          this.parent_id = '';
        },
        clearForm() {
            this.task.name = '';
            this.task.description = '';
            this.task.start_date = '';
            this.task.end_date = '';
            this.task.status_id = 2;
        }
    }
}
</script>

<style scoped>

</style>

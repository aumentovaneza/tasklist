<template>
    <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none bg-black bg-opacity-60 focus:outline-none justify-center items-center" v-if="showModal">
        <div class="relative w-auto my-6 mx-auto max-w-5xl">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                    <h3 class="text-xl font-semibold">
                        <span class="wide">Download Data Modal</span>
                    </h3>
                    <button class="p-1 text-gray-500 ml-auto bg-transparent border-0 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" @click="hideModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>
                <div class="space-y-8 sm:space-y-5">
                    <div class="space-y-6 p-5 sm:space-y-5">
                        <div class="space-y-8 divide-y divide-gray-200">
                            <div class="space-y-8 divide-y divide-gray-200">
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <div>
                                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
                                        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Total Done Tasks
                                            </dt>
                                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                                {{ stats.completed }}
                                            </dd>
                                        </div>

                                        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Total Pending Tasks
                                            </dt>
                                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                                {{ stats.pending }}
                                            </dd>
                                        </div>

                                        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Total Cancelled Tasks
                                            </dt>
                                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                                {{ stats.cancelled }}
                                            </dd>
                                        </div>
                                        <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Other Status
                                            </dt>
                                            <dd class="mt-1 text-3xl font-semibold text-gray-900">
                                                {{ stats.others }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "StatisticsModal",
    props : ['showModal'],
    data : function (){
      return {
          stats : []
      }
    },
    mounted() {
        this.getStats();
    },
    methods : {
        getStats(){
            axios.get('../user/tasks/get/stats').then((response) => {
                this.stats = response.data.data
            });
        },
        hideModal() {
            this.$emit("click", this.showModal);
        },
    }

}
</script>


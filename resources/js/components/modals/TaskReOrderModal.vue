<template>
    <div
        v-if="showModal"
        class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none bg-black bg-opacity-60 focus:outline-none justify-center items-center">
        <div class="relative w-auto my-6 mx-auto max-w-5xl">
            <!--content-->
            <div
                class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                    <h3 class="text-xl font-semibold">
                        <span class="wide">Reorder Tasks</span>
                    </h3>
                    <button
                        class="p-1 text-gray-500 ml-auto bg-transparent border-0 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                        @click="hideModal()">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                                  stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"/>
                        </svg>
                    </button>
                </div>
                <div class="space-y-8 sm:space-y-5">
                    <div class="space-y-6 p-5 sm:space-y-5">
                        <div class="space-y-8 divide-y divide-gray-200">
                            <div class="space-y-8 divide-y divide-gray-200">
                                <!-- This example requires Tailwind CSS v2.0+ -->
                                <ul class="divide-y divide-gray-200" role="list">
                                    <draggable v-model="tasks" @end="updateItemOrder">
                                        <li v-for="task in tasks">
                                            <a class="block hover:bg-gray-50">
                                                <div class="flex items-center px-4 py-4 sm:px-6">
                                                    <div class="min-w-0 flex-1 flex items-center">
                                                        <div
                                                            class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                                            <div>
                                                                <p class="text-sm font-medium text-indigo-600 truncate">
                                                                    {{ task.name }}</p>
                                                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                                                    <span class="truncate">{{ task.description }}</span>
                                                                </p>
                                                            </div>
                                                            <div class="hidden md:block">
                                                                <div class="float-right">
                                                                    <p class="text-sm text-gray-900">
                                                                        Started on
                                                                        <time datetime="2020-01-07">{{
                                                                                task.start_date
                                                                            }}
                                                                        </time>
                                                                    </p>
                                                                    <p class="mt-2 flex items-center text-sm text-gray-500">
                                                                        <!-- Heroicon name: solid/check-circle -->
                                                                        <span v-if="task.status.name === 'Cancelled'">
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-yellow-400 h-5 w-5"
                                                         fill="none" stroke="currentColor"
                                                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                      <path
                                                          d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
                                                          stroke-linecap="round"
                                                          stroke-linejoin="round"
                                                          stroke-width="2"/>
                                                    </svg>
                                                </span>
                                                                        <span
                                                                            v-else-if="task.status.name === 'Complete'">
                                                    <svg aria-hidden="true"
                                                         class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                         fill="currentColor"
                                                         viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path clip-rule="evenodd"
                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                              fill-rule="evenodd"/>
                                                    </svg>
                                                </span>
                                                                        <span
                                                                            v-else-if="task.status.name === 'Pending'">
                                                   <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-blue-400"
                                                        fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"/>
                                                    </svg>
                                                </span>
                                                                        <span v-else>
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-purple-400"
                                                         fill="currentColor" viewBox="0 0 20 20"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                      <path clip-rule="evenodd"
                                                            d="M5.05 3.636a1 1 0 010 1.414 7 7 0 000 9.9 1 1 0 11-1.414 1.414 9 9 0 010-12.728 1 1 0 011.414 0zm9.9 0a1 1 0 011.414 0 9 9 0 010 12.728 1 1 0 11-1.414-1.414 7 7 0 000-9.9 1 1 0 010-1.414zM7.879 6.464a1 1 0 010 1.414 3 3 0 000 4.243 1 1 0 11-1.415 1.414 5 5 0 010-7.07 1 1 0 011.415 0zm4.242 0a1 1 0 011.415 0 5 5 0 010 7.072 1 1 0 01-1.415-1.415 3 3 0 000-4.242 1 1 0 010-1.415zM10 9a1 1 0 011 1v.01a1 1 0 11-2 0V10a1 1 0 011-1z"
                                                            fill-rule="evenodd"/>
                                                    </svg>
                                                </span>
                                                                        {{ task.status.name }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </draggable>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable';

export default {
    name: "TaskReOrderModal",
    components: {
        draggable,
    },
    data: function () {
        return {
            'tasks': [],
        }
    },
    props: ['showModal'],
    mounted() {
        this.getTasks();
    },
    methods: {
        getTasks() {
            axios.get('../user/tasks').then((response) => {
                console.log(response.data.data);
                this.tasks = response.data.data;
            });
        },
        updateItemOrder() {
            var items = this.tasks.map(function (item, index) {
                return {item: item, order: index + 1}
            })

            axios.post('../user/tasks/update/order', {
                items: items,
            });
        },
        hideModal() {
            this.$emit("click", this.showModal);
            window.location.reload();
        },

    }
}
</script>

<style scoped>

</style>

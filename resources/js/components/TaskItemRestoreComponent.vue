<template>
    <li>
        <a class="block hover:bg-gray-50">
            <div class="flex items-center px-4 py-4 sm:px-6">
                <div class="min-w-0 flex-1 flex items-center">
                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                        <div>
                            <p class="text-sm font-medium text-indigo-600 truncate">{{ task.name }}</p>
                            <p class="mt-2 flex items-center text-sm text-gray-500">
                                <span class="truncate">{{ task.description }}</span>
                            </p>
                        </div>
                        <div class="hidden md:block">
                            <div class="float-right">
                                <p class="text-sm text-gray-900">
                                    Started on
                                    <time datetime="2020-01-07">{{ task.start_date }}</time>
                                </p>
                                <p class="mt-2 flex items-center text-sm text-gray-500">
                                    <!-- Heroicon name: solid/check-circle -->
                                    <span v-if="task.status === 'Cancelled'">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-yellow-400 h-5 w-5"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                    <span v-else-if="task.status === 'Complete'">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    <span v-else-if="task.status === 'Pending'">
                                           <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                            </svg>
                                        </span>
                                    <span v-else>
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-purple-400"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                              <path fill-rule="evenodd" d="M5.05 3.636a1 1 0 010 1.414 7 7 0 000 9.9 1 1 0 11-1.414 1.414 9 9 0 010-12.728 1 1 0 011.414 0zm9.9 0a1 1 0 011.414 0 9 9 0 010 12.728 1 1 0 11-1.414-1.414 7 7 0 000-9.9 1 1 0 010-1.414zM7.879 6.464a1 1 0 010 1.414 3 3 0 000 4.243 1 1 0 11-1.415 1.414 5 5 0 010-7.07 1 1 0 011.415 0zm4.242 0a1 1 0 011.415 0 5 5 0 010 7.072 1 1 0 01-1.415-1.415 3 3 0 000-4.242 1 1 0 010-1.415zM10 9a1 1 0 011 1v.01a1 1 0 11-2 0V10a1 1 0 011-1z" clip-rule="evenodd" />
                                            </svg>
                                        </span>

                                    {{ task.status }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <!-- Heroicon name: solid/chevron-right -->
                    <div class="flex">
                        <button @click="restoreTask(task.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </a>
    </li>
</template>

<script>
export default {
    name: "TaskItemRestoreComponent",
    props : ['task'],
    methods : {
        restoreTask(id){
            axios.post('../user/restore/task/'+id).then(response => {
                window.location.reload();
            });
        }
    }
}
</script>

<style scoped>

</style>

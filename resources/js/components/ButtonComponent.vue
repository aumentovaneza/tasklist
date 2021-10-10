<template>
    <div>
        <button @click="showModalOnClick"
                type="button"
                :class="getClass()"
                class="inline-flex mb-2 items-center justify-center px-4 py-2 border border-transparent text-sm
                font-medium rounded-md shadow-sm text-white  focus:outline-none focus:ring-2
                focus:ring-offset-2 "
        >
            {{ text }}
        </button>

        <creat-new-task-component :showModal="showCreateNewTaskModal" @click="hideNewTaskModal" ref="newTask"></creat-new-task-component>
    </div>
</template>

<script>
export default {
    name: "ButtonComponent",
    props: ['color','text','action','url'],
    data : function() {
        return {
            'class' : "",
            'showCreateNewTaskModal' : false
        }
    },
    methods: {
        getClass() {
            if (this.color === 'blue') {
                return 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500'
            }

            if (this.color === 'red') {
                return 'bg-red-600 hover:bg-red-700 focus:ring-red-500'
            }

            if (this.color === 'yellow') {
                return 'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500'
            }

            if (this.color === 'green') {
                return 'bg-green-600 hover:bg-green-700 focus:ring-green-500'
            }

            if (this.color === 'purple') {
                return 'bg-purple-600 hover:bg-purple-700 focus:ring-purple-500'
            }
        },
        showModalOnClick() {
            if (this.action === 'create_new_task') {
                this.showCreateNewTaskModal = true;
            }
        },
        hideNewTaskModal() {
            this.showCreateNewTaskModal = false;
        }
    }
}
</script>


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

        <task-modal-component :showModal="showCreateNewTaskModal" :action="action" :parent="parent" @click="hideModal" ref="newTask"></task-modal-component>
        <new-status-modal-component :showModal="showNewStatusModal" :action="action" @click="hideNewStatusModal"></new-status-modal-component>
        <download-data-modal-component :showModal="showDownloadDataModal" :action="action" @click="hideDownloadDataModal"></download-data-modal-component>
        <restore-data-modal-component :showModal="showRestoreDataModal"  :action="action" @click="hideRestoreDataModal"></restore-data-modal-component>
        <statistics-modal-component :showModal="showStatisticsDataModal" :action="action" @click="hideStatisticsDataModal"></statistics-modal-component>
        <task-reorder-modal-component :showModal="showTaskReOrderModal"  :action="action" @click="hideReOrderTaskModal"></task-reorder-modal-component>
        <group-modal :showModal="showGroupModal"  :action="action" @click="hideGroupModal"></group-modal>
        <group-member-modal :showModal="showGroupMemberModal"  :action="action" @click="hideGroupMemberModal"></group-member-modal>
    </div>
</template>

<script>
export default {
    name: "ButtonComponent",
    props: ['color','text','action','url', 'parent'],
    data : function() {
        return {
            'class' : "",
            'showCreateNewTaskModal' : false,
            'showNewStatusModal' : false,
            'showDownloadDataModal' : false,
            'showRestoreDataModal' : false,
            'showStatisticsDataModal' : false,
            'showTaskReOrderModal' : false,
            'showGroupModal' : false,
            'showGroupMemberModal' : false
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
            if(this.action === 'create_new_status'){
                this.showNewStatusModal = true;
            }
            if(this.action === 'download_data') {
                this.showDownloadDataModal = true;
            }
            if(this.action === 'restore_task') {
                this.showRestoreDataModal = true;
            }
            if(this.action === 'show_statistics') {
                this.showStatisticsDataModal = true;
            }
            if(this.action === 'change_order') {
                this.showTaskReOrderModal = true;
            }
            if(this.action === 'group_modal') {
                this.showGroupModal = true;
            }
            if(this.action === 'group_item_modal') {
                this.showGroupMemberModal = true;
            }
        },
        hideModal() {
            this.showCreateNewTaskModal = false;
        },
        hideNewStatusModal() {
            this.showNewStatusModal = false;
        },
        hideDownloadDataModal() {
            this.showDownloadDataModal = false;
        },
        hideRestoreDataModal(){
            this.showRestoreDataModal = false;
        },
        hideStatisticsDataModal(){
            this.showStatisticsDataModal = false;
        },
        hideReOrderTaskModal(){
            this.showTaskReOrderModal = false;
        },
        hideGroupModal(){
            this.showTaskReOrderModal = false;
        },
        hideGroupMemberModal(){
            this.showGroupMemberModal = false;
        }
    }
}
</script>


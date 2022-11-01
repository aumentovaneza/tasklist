<template>
    <div>
        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 h-full">
            <li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow h-96">
                <div class="w-full p-5 border-b border-gray-300">
                    <h2 class="text-xl font-bold">Common</h2>
                </div>
                <div class="p-5 overflow-y-scroll h-full">
                    <draggable :list="common" group="tasks">
                        <div v-for="member in common" :key="member.name"  class="truncate rounded border border-gray-200 bg-white p-5 mb-3">
                            <h3>{{ member.name }}</h3>
                        </div>
                    </draggable>
                </div>
            </li>
            <li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow h-96">
                <div class="w-full p-5 border-b border-gray-300">
                    <h2 class="text-xl font-bold">Philippines</h2>
                </div>
                <div class="p-5 overflow-y-scroll h-full">
                    <draggable :list="philippines" group="tasks" @change="updateList($event,'Philippines')">
                        <div v-for="member in philippines" :key="member.name"  class="truncate rounded border border-gray-200 bg-white p-5 mb-3">
                            <h3>{{ member.name }}</h3>
                        </div>
                    </draggable>
                </div>
            </li>
            <li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow h-96">
                <div class="w-full p-5 border-b border-gray-300">
                    <h2 class="text-xl font-bold">USA</h2>
                </div>
                <div class="p-5 overflow-y-scroll h-full">
                    <draggable :list="usa" group="tasks" @change="updateList($event,'United States')">
                        <div v-for="member in usa" :key="member.name"  class="truncate rounded border border-gray-200 bg-white p-5 mb-3">
                            <h3>{{ member.name }}</h3>
                        </div>
                    </draggable>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import draggable from 'vuedraggable';
import {isEmpty} from "lodash";

export default {
    name: "GroupListComponent",
    components: {
        draggable,
    },
    data : function (){
        return {
            'id' : null,
            'showModal' : false,
            'common' : [],
            'philippines' : [],
            'usa' : [],
        }
    },
    mounted() {
        this.getCommon();
    },
    methods : {
        getCommon() {
            let common = [];
            let philippines = [];
            let usa = [];

            axios.get('../user/groups/member/all').then((response) => {
                let data = response.data.data;
                console.log(data);
                data.forEach(function(item){
                    if(isEmpty(item.group)){
                        common.push(item)
                    } else {
                        if(item.group.name === 'Philippines') {
                            philippines.push(item)
                        }

                        if(item.group.name === 'United States') {
                            usa.push(item)
                        }
                    }
                });
            });

            this.common = common;
            this.philippines = philippines;
            this.usa = usa;
        },
        hideModal(){
            this.showModal = false;
        },
        updateList(evt,country){
            let cities;
            axios.post('https://countriesnow.space/api/v0.1/countries/cities', {
                "country": country
            }).then((data) => {
                cities = data.data.data;
                let found = cities.indexOf(evt.added.element.name)
                if(found === -1) {
                    alert('This does not belong to this group!')
                    window.location.reload();
                } else {
                    axios.put('../user/groups/member/update/'+evt.added.element.id,{
                        'group' : country
                    }).then((response) => {
                        let data = response.data.data;
                        alert('Success!')

                        data.forEach(function(item){
                            if(item.group === null){
                                this.common.push(item)
                            }

                            if(item.group.name === 'Philippines') {
                                this.philippines.push(item)
                            }

                            if(item.group.name === 'USA') {
                                this.usa.push(item)
                            }
                        });
                    })
                }

            })
        }
    }
}
</script>

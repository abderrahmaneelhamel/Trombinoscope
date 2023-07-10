<script setup>
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'


</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Trombinoscope
            </h2>
        </template>
        <div class="px-80 py-10">
            
            <form class="flex items-center">   
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                        </svg>
                    </div>
                    <input autofocus v-model="this.name" @keyup="filter" type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Rechercher : Colaborateurs , postes , pole..." required>
                </div>
            </form>
            <div class="title-container">
                <div>
                    <h3 class="py-5 font-semibold text-xl text-gray-500 leading-tight">
                        Filter By Pole
                    </h3>
                </div>
                <div class="filters">
                    <span class="filter" v-bind:class="{ active: currentFilter === 'ALL'  ,  'bg-indigo-300': currentFilter === 'ALL'}" v-on:click="setFilter('ALL')">ALL</span>
                    <span class="filter " v-bind:class="{ active: currentFilter === 'DOSI' ,  'bg-indigo-300': currentFilter === 'DOSI' }" v-on:click="setFilter('DOSI')">DOSI</span>
                    <span class="filter" v-bind:class="{ active: currentFilter === 'CDO'  ,  'bg-indigo-300': currentFilter === 'CDO'}" v-on:click="setFilter('CDO')">CDO</span>
                    <span class="filter" v-bind:class="{ active: currentFilter === 'DF'  ,  'bg-indigo-300': currentFilter === 'DF'}" v-on:click="setFilter('DF')">DIGITAL FACTORY</span>
                    <span class="filter" v-bind:class="{ active: currentFilter === 'SECURITE'  ,  'bg-indigo-300': currentFilter === 'SECURITE'}" v-on:click="setFilter('SECURITE')">SECURITE SI</span>
                    <span class="filter" v-bind:class="{ active: currentFilter === 'PROGSI'  ,  'bg-indigo-300': currentFilter === 'PROGSI'}" v-on:click="setFilter('PROGSI')">PROGRAMMES SI</span>
                </div>
            </div>
        </div>

        <div class="py-12 px-12">
            <div class="flex flex-wrap p-5">
            <transition-group class="project" name="projects">
            <div v-for="user in this.filteredUsers" :key="user.id">
            <div v-if="currentFilter === user.pole || currentFilter === 'ALL'" class="w-64 bg-white shadow-lg rounded-lg overflow-hidden my-4 mx-3" >
                    <img class="w-full h-56 object-cover object-center" :src="'../../'+user.image" alt="avatar">
                    <div :class="{'flex items-center px-6 py-3' : true , 'bg-red-500' : user.pole === 'DF' , 'bg-green-500' : user.pole === 'CDO' , 'bg-purple-500' : user.pole === 'SECURITE' , 'bg-orange-500' : user.pole === 'PROGSI' , 'bg-indigo-500' : true }">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-briefcase-fill" viewBox="0 0 16 16"> <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/> <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/> </svg>
                        <h1 class="mx-3 text-white font-semibold text-lg">{{ user.pole }}</h1>
                    </div>
                    <div class="py-4 px-6">
                        <h1 class="text-md font-semibold text-gray-800">{{ user.name+' '+user.last_name }}</h1>
                        <p class="py-2 text-sm text-gray-700">{{ user.poste }}</p>
                        <div class="flex items-center mt-4 text-gray-700">
                            <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                                <path d="M239.208 343.937c-17.78 10.103-38.342 15.876-60.255 15.876-21.909 0-42.467-5.771-60.246-15.87C71.544 358.331 42.643 406 32 448h293.912c-10.639-42-39.537-89.683-86.704-104.063zM178.953 120.035c-58.479 0-105.886 47.394-105.886 105.858 0 58.464 47.407 105.857 105.886 105.857s105.886-47.394 105.886-105.857c0-58.464-47.408-105.858-105.886-105.858zm0 186.488c-33.671 0-62.445-22.513-73.997-50.523H252.95c-11.554 28.011-40.326 50.523-73.997 50.523z"/><g><path d="M322.602 384H480c-10.638-42-39.537-81.691-86.703-96.072-17.781 10.104-38.343 15.873-60.256 15.873-14.823 0-29.024-2.654-42.168-7.49-7.445 12.47-16.927 25.592-27.974 34.906C289.245 341.354 309.146 364 322.602 384zM306.545 200h100.493c-11.554 28-40.327 50.293-73.997 50.293-8.875 0-17.404-1.692-25.375-4.51a128.411 128.411 0 0 1-6.52 25.118c10.066 3.174 20.779 4.862 31.895 4.862 58.479 0 105.886-47.41 105.886-105.872 0-58.465-47.407-105.866-105.886-105.866-37.49 0-70.427 19.703-89.243 49.09C275.607 131.383 298.961 163 306.545 200z"/></g>
                            </svg>
                            <h1 class="px-2 text-sm">{{ user.direction }}</h1>
                        </div>
                        <div class="flex items-center mt-4 text-gray-700">
                            <!-- <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                                <path d="M256 32c-88.004 0-160 70.557-160 156.801C96 306.4 256 480 256 480s160-173.6 160-291.199C416 102.557 344.004 32 256 32zm0 212.801c-31.996 0-57.144-24.645-57.144-56 0-31.357 25.147-56 57.144-56s57.144 24.643 57.144 56c0 31.355-25.148 56-57.144 56z"/>
                            </svg> -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16"> <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/> <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                            <h1 class="px-2 text-sm">{{ user.number }}</h1>
                        </div>
                        <div class="flex flex-wrap items-center mt-4 text-gray-700">
                            <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                                <path d="M437.332 80H74.668C51.199 80 32 99.198 32 122.667v266.666C32 412.802 51.199 432 74.668 432h362.664C460.801 432 480 412.802 480 389.333V122.667C480 99.198 460.801 80 437.332 80zM432 170.667L256 288 80 170.667V128l176 117.333L432 128v42.667z"/>
                            </svg>
                            <h1 class="px-2 text-sm">{{ user.email }}</h1>
                        </div>
                    </div>
                </div>
            </div>
            </transition-group>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import axios from '../lib/axios'
export default {
    data() {
        return {
            currentFilter: "ALL",
            users: null,
            name: '',
            filteredUsers: null
        }
    },
    async created(){
        this.users = await axios.get('/api/users').then(res => res.data).catch(error => { if (error.response.status == 401) axios.post('/logout') })
        this.filteredUsers = this.users
    },
    methods: {
        filter() {
            if(this.name == ''){
                this.filteredUsers = this.users
            }else{
                this.filteredUsers = this.users.filter(user => user.name.includes(this.name.toUpperCase()) || user.last_name.includes(this.name.toUpperCase()) || (user.name+' '+user.last_name).includes(this.name.toUpperCase()) || user.poste.includes(this.name.toUpperCase()) || user.pole.includes(this.name.toUpperCase()));
            }
        },
        setFilter: function (filter) {
			this.currentFilter = filter;
		}
    }    
}
</script>
<style scoped>
.title-container {
	display:flex;
	flex-direction:column;
	justify-content:center;
	align-items:center;
}

.title {
	font-family: 'Dawning of a New Day', cursive;
	font-size:30pt;
	font-weight:normal;
}

.project-title {
font-size:16pt	
}

.filter {
	font-family:arial;
	padding: 6px 6px;
	cursor:pointer;
	border-radius: 6px;
	transition: all 0.35s;
}

.filter.active {
	box-shadow:0px 1px 3px 0px #00000026;
}

.filter:hover {
	background:lightgray;
} 

.projects {
	margin-top:25px;
	display:flex;
	flex-wrap:wrap;
	justify-content:center;
}

.projects-enter {
	transform: scale(0.5) translatey(-80px);
	opacity:0;
}

.projects-leave-to{
	transform: translatey(30px);
	opacity:0;
}

.projects-leave-active {
	position: absolute;
	z-index:-1;
}

.circle {
	text-align:center;
	position:absolute;
	bottom:-38px;
	left:40px;
	width:100px;
	height:100px;
	border-radius:50px;
/* 	border:1px solid black; */
	display:flex;
	box-shadow: 0px -4px 3px 0px #494d3257;
	justify-content:center;
	align-items:center;
	background-color:#fff;
/* 	box-shadow:0px -3px 3px #484848a6; */
}

.project {
	transition: all .35s ease-in-out;
	margin:10px;
	box-shadow:0px 2px 8px lightgrey;
	border-radius:3px;
	width:180px;
	height:200px;
	display:flex;
	flex-direction:column;
	align-items:center;
}

.project-image-wrapper {
	position:relative;
}

.gradient-overlay {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:150px;
	opacity:0.09;
	background: 
		linear-gradient(to bottom, rgba(0,210,247,0.65) 0%,rgba(0,210,247,0.64) 1%,rgba(0,0,0,0) 100%), 
		linear-gradient(to top, rgba(247,0,156,0.65) 0%,rgba(247,0,156,0.64) 1%,rgba(0,0,0,0) 100%);
	border-bottom-left-radius:10px;
	border-bottom-right-radius:10px;
	border-top-left-radius:3px;
	border-top-right-radius:3px;
}

.project-image {
	width:100%;
	height:150px;
	border-bottom-left-radius:5px;
	border-bottom-right-radius:5px;
	border-top-left-radius:3px;
	border-top-right-radius:3px;
}
</style>
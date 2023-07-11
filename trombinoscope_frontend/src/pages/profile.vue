<script setup>
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'
</script>
<template>
    <AuthenticatedLayout>
        <div class="max-w-md mx-auto mt-8">
            <div class="bg-white rounded-lg shadow px-8 py-6">
                <h2 class="text-2xl font-semibold mb-6">Edit Profile</h2>

                <div class="flex items-center justify-center mb-8">
                <div class="w-24 h-24 rounded-full overflow-hidden">
                    <img :src="'../../'+image" alt="Profile Picture" class="w-full h-full object-cover" />
                </div>
                </div>

                <form @submit.prevent="updateUser">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" id="name" v-model="name" class="form-input mt-1 block w-full rounded-lg border-indigo-600" />
                    </div>

                    <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" id="last_name" v-model="last_name" class="form-input mt-1 block w-full rounded-lg border-indigo-600" />
                    </div>

                    <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" id="email" v-model="email" class="form-input mt-1 block w-full rounded-lg border-indigo-600" />
                    </div>

                    <div>
                    <label for="number" class="block text-sm font-medium text-gray-700">Number</label>
                    <input type="text" id="number" v-model="number" class="form-input mt-1 block w-full rounded-lg border-indigo-600" />
                    </div>

                    <div>
                    <label for="direction" class="block text-sm font-medium text-gray-700">Direction</label>
                    <input type="text" id="direction" v-model="direction" class="form-input mt-1 block w-full rounded-lg border-indigo-600" />
                    </div>

                    <div>
                    <label for="poste" class="block text-sm font-medium text-gray-700">Poste</label>
                    <input type="text" id="poste" v-model="poste" class="form-input mt-1 block w-full rounded-lg border-indigo-600" />
                    </div>

                    <div>
                    <label for="pole" class="block text-sm font-medium text-gray-700">Pole</label>
                    <input type="text" id="pole" v-model="pole" class="form-input mt-1 block w-full rounded-lg border-indigo-600" />
                    </div>

                    <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Change Password</label>
                    <input type="text" id="password" v-model="password" class="form-input mt-1 block w-full rounded-lg border-indigo-600" />
                    </div>
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Profile
                    </button>
                </div>
                </form>
            </div>
            </div>
    
    </AuthenticatedLayout>
    </template>
    <script>
import axios from '../lib/axios';

    export default {
        data(){
        return {
            user : null,
            name: '',
            last_name: '',
            email: '',
            number: '',
            direction: '',
            poste: '',
            pole: '',
            image: '',
            password : ''
        }
        },
        async created(){
            this.user = await axios.get('/api/user').then(res => res.data).catch(error => { if (error.response.status == 401) axios.post('/logout') })
            this.name = this.user.name;
            this.last_name = this.user.last_name;
            this.email = this.user.email;
            this.number = this.user.number;
            this.direction = this.user.direction;
            this.poste = this.user.poste;
            this.pole = this.user.pole;
            this.image = this.user.image;
        },
        methods:{
            async updateUser(){              
                const csrf = () => axios.get('/sanctum/csrf-cookie')

                await csrf()

                const res = await axios.post('/api/user/update',
                {
                    id : this.user.id,
                    name : this.name,
                    last_name : this.last_name,
                    email : this.email,
                    number : this.number,
                    direction : this.direction,
                    poste : this.poste,
                    pole : this.pole,
                    password : this.password,
                }
                 ).then(res => res.data).catch(error => { if (error.response.status == 401) axios.post('/logout') })

                 this.$router.go();
            }
        }
    }
    </script>
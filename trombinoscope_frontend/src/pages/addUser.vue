<script setup>
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'
</script>
<template>
  <AuthenticatedLayout>
  <div class="flex justify-center items-center my-5 bg-gray-100">
    <div class="max-w-md w-full bg-white shadow-md rounded-md px-8 py-6">
      <h2 class="text-2xl font-semibold mb-6">Create User</h2>
      <form @submit.prevent="createUser">
        <div class="mb-4">
          <label for="name" class="block font-medium text-gray-700">Name</label>
          <input v-model="user.name" type="text" id="name" class="form-input mt-1  w-full rounded-lg border-indigo-400" required />
        </div>
        <div class="mb-4">
          <label for="last_name" class="block font-medium text-gray-700">Last Name</label>
          <input v-model="user.last_name" type="text" id="last_name" class="form-input mt-1  w-full rounded-lg border-indigo-400" required />
        </div>
        <div class="mb-4">
          <label for="email" class="block font-medium text-gray-700">Email</label>
          <input v-model="user.email" type="email" id="email" class="form-input mt-1  w-full rounded-lg border-indigo-400" required />
        </div>
        <div class="mb-4">
          <label for="number" class="block font-medium text-gray-700">Number</label>
          <input v-model="user.number" type="text" id="number" class="form-input mt-1  w-full rounded-lg border-indigo-400" required />
        </div>
        <div class="mb-4">
          <label for="direction" class="block font-medium text-gray-700">Direction</label>
          <input v-model="user.direction" type="text" id="direction" class="form-input mt-1  w-full rounded-lg border-indigo-400" required />
        </div>
        <div class="mb-4">
          <label for="poste" class="block font-medium text-gray-700">Poste</label>
          <input v-model="user.poste" type="text" id="poste" class="form-input mt-1  w-full rounded-lg border-indigo-400" required />
        </div>
        <div class="mb-4">
          <label for="pole" class="block font-medium text-gray-700">Pole</label>
          <input v-model="user.pole" type="text" id="pole" class="form-input mt-1  w-full rounded-lg border-indigo-400" required />
        </div>
        <div class="mb-4">
          <label for="superiority" class="block font-medium text-gray-700">Superiority</label>
          <input v-model="user.superiority" type="text" id="superiority" class="form-input mt-1  w-full rounded-lg border-indigo-400" required />
        </div>
        <div class="mb-4">
          <label for="profile-picture" class="block font-medium text-gray-700">Profile Picture</label>
          <input type="file" id="profile-picture" @change="handleFileUpload" accept="image/*" class="form-input mt-1  w-full rounded-lg border-indigo-400" />
        </div>
        <div>
          <button type="submit" class="w-full bg-indigo-600 text-white rounded-md px-4 py-2 hover:bg-indigo-700">
            Create
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
  data() {
    return {
      user: {
        name: '',
        last_name: '',
        email: '',
        number: '',
        direction: '',
        poste: '',
        pole: '',
        superiority: '',
      },
      profilePicture: null,
    };
  },
  methods: {
    async createUser() {

      const csrf = () => axios.get('/sanctum/csrf-cookie')

      await csrf()

      const res = await axios.post('/api/user/create',
      {
          name : this.user.name,
          last_name : this.user.last_name,
          email : this.user.email,
          number : this.user.number,
          direction : this.user.direction,
          poste : this.user.poste,
          pole : this.user.pole,
          superiority : this.user.superiority,
          image : this.profilePicture,
      }
        ).then(res => res.data).catch(error => { if (error.response.status == 401) axios.post('/logout') })

        this.$router.go();
    },
    handleFileUpload(event) {
      this.profilePicture = `images/${event.target.files[0].name}`;
    },
  },
};
</script>

<style>
/* Tailwind CSS classes */
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.form-input {
  padding: 0.5rem;
  border: 1px solid #e5e7eb;
  border-radius: 0.25rem;
}

.btn-primary {
  padding: 0.5rem 1rem;
  background-color: #6b46c1;
  color: #ffffff;
  border: none;
  border-radius: 0.25rem;
  cursor: pointer;
  transition: background-color 0.3s;
}

.btn-primary:hover {
  background-color: #9333ea;
}
</style>

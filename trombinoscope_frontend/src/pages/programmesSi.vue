<script setup>
import AuthenticatedLayout from '@/layouts/AuthenticatedLayout.vue'
</script>
<template>
  <AuthenticatedLayout>
  <div class="tree-container">
    <div class="tree-layer flex flex-wrap pl-6 pt-5" v-for="(layer, index) in filteredLayers" :key="index">
      <div class="font-semibold text-xl text-gray-800 leading-tight">{{ getLayerName(layer) }}</div>
      <div class="layer-content">
            <div v-for="user in getMembersByLayer(layer)" :key="user.id">
            <div class="w-64 bg-white shadow-lg rounded-lg overflow-hidden my-4 mx-3" >
                    <img class="w-full h-56 object-cover object-center" :src="'../../'+user.image" alt="avatar">
                    <div class="flex items-center px-6 py-3 bg-indigo-500" :style="{ backgroundColor: getLayerColor(index) }">
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
      </div>
    </div>
  </div>
</AuthenticatedLayout>
</template>

<script>
import axios from '../lib/axios'

export default {
  data() {
    return {
      members: [],
      layers: ['m1', 'm2', 'm3', 'm4', 'm5'],
      layerColors: ['#7825c1', '#F97316', '#EF4444', '#8B5CF6', '#10B981']
    };
  },
  computed: {
    filteredLayers() {
      return this.layers.filter(layer => this.hasMembers(layer));
    }
  },
  async mounted() {
    const csrf = () => axios.get('/sanctum/csrf-cookie')

    await csrf()

    this.members = await axios.post('/api/page',
      {
          pole : 'PROGSI',
      }
      ).then(res => res.data).catch(error => { if (error.response.status == 401) axios.post('/logout') })
      console.log('====================================');
      console.log(this.members);
      console.log('====================================');
  },
  methods: {
    getMembersByLayer(layer) {
      return this.members.filter(member => member.superiority === layer);
    },
    hasMembers(layer) {
      return this.getMembersByLayer(layer).length > 0;
    },
    getLayerName(layer) {
        switch (layer) {
            case 'm1':
                return 'chef'
                break;
            case 'm2':
                return 'chef departement'
                break;
            default:
                return layer;
                break;
        }
    },
    getLayerColor(index) {
      return this.layerColors[index % this.layerColors.length];
    }
  }
};
</script>

<style>
.tree-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.tree-layer {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 1rem;
}

.layer-title {
  font-size: 1.2rem;
  font-weight: bold;
}

.layer-content {
  display: flex;
  flex-direction: row;
  align-items: center;
  flex-wrap: wrap;
  gap: 2rem;
}

.tree-node {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.tree-member {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}

.member-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 1rem;
  border-radius: 0.5rem;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s, box-shadow 0.3s;
  cursor: pointer;
}

.member-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 12px rgba(207, 146, 14, 0.607);
}

.member-image {
  width: 4rem;
  height: 4rem;
}

.member-name {
  font-weight: bold;
}

.member-role {
  color: #888;
}

.tree-layer:not(:last-child)::after {
  content: '';
  display: block;
  width: 100%;
  height: 2px;
  background-color: #6B7280;
  margin-top: 1rem;
}

.layer-title,
.tree-layer:not(:last-child)::after {
  transition: background-color 0.3s;
}

.tree-layer:hover .layer-title,
.tree-layer:hover:not(:last-child)::after {
  background-color: #cd9a0e;
}

.layer-title,
.tree-layer:not(:last-child)::after {
  background-color: #7825c1;
}
</style>

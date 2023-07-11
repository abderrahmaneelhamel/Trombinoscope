<script setup>
import { useUsers } from '@/stores/user'

const store = useUsers()

const auth = store.authUser
</script>

<template>
    <div class="antialiased flex justify-center items-center">
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <router-link
                v-if="auth"
                to="/Trombinoscope"
                class="text-sm text-gray-700 underline">
                Trombinoscope
            </router-link>

            <template v-else>
                <router-link
                    to="/login"
                    class="ml-4 text-sm text-gray-700 underline">
                    Log in
                </router-link>
                <router-link
                    to="/register"
                    class="ml-4 text-sm text-gray-700 underline">
                    Register
                </router-link>
            </template>
        </div>
        <img src="../../public/logo-labelvie.png" width="1100" alt="labelvie">
    </div>
</template>

<style scoped>
.image{
    background-image: url('../../public/logo-labelvie.png');
    background-repeat:no-repeat;
    background-size:cover;
}

.btn-conteiner {
    display: flex;
    justify-content: center;
    --color-text: #ffffff;
    --color-background: #9eab00;
    --color-outline: #9eab00;
    --color-shadow: #00000080;
  }
  
  .btn-content {
    display: flex;
    align-items: center;
    padding: 5px 30px;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-size: 30px;
    color: var(--color-text);
    background: var(--color-background);
    transition: 1s;
    border-radius: 100px;
    box-shadow: 0 0 0.2em 0 var(--color-background);
  }
  
  .btn-content:hover, .btn-content:focus {
    transition: 0.5s;
    -webkit-animation: btn-content 1s;
    animation: btn-content 1s;
    outline: 0.1em solid transparent;
    outline-offset: 0.2em;
    box-shadow: 0 0 0.4em 0 var(--color-background);
  }
  
  .btn-content .icon-arrow {
    transition: 0.5s;
    margin-right: 0px;
    transform: scale(0.6);
  }
  
  .btn-content:hover .icon-arrow {
    transition: 0.5s;
    margin-right: 25px;
  }
  
  .icon-arrow {
    width: 20px;
    margin-left: 15px;
    position: relative;
    top: 6%;
  }
    
  /* SVG */
  #arrow-icon-one {
    transition: 0.4s;
    transform: translateX(-60%);
  }
  
  #arrow-icon-two {
    transition: 0.5s;
    transform: translateX(-30%);
  }
  
  .btn-content:hover #arrow-icon-three {
    animation: color_anim 1s infinite 0.2s;
  }
  
  .btn-content:hover #arrow-icon-one {
    transform: translateX(0%);
    animation: color_anim 1s infinite 0.6s;
  }
  
  .btn-content:hover #arrow-icon-two {
    transform: translateX(0%);
    animation: color_anim 1s infinite 0.4s;
  }
  
  /* SVG animations */
  @keyframes color_anim {
    0% {
      fill: white;
    }
  
    50% {
      fill: var(--color-background);
    }
  
    100% {
      fill: white;
    }
  }
  
  /* Button animations */
  @-webkit-keyframes btn-content {
    0% {
      outline: 0.2em solid var(--color-background);
      outline-offset: 0;
    }
  }
  
  @keyframes btn-content {
    0% {
      outline: 0.2em solid var(--color-background);
      outline-offset: 0;
    }
  }
</style>

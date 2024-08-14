<template>
    <h2>¿Desea eliminar a {{  name  }}?</h2>
    <div class="flex gap-2 mt-3">
        <router-link class="btn" to="/">Volver</router-link>
        <form @submit.prevent="handleSubmit">
            <button type="submit" class="btn btn-error">Si</button>
        </form>
    </div>
</template>

<script setup>
import { onBeforeMount, ref} from 'vue' 
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'

const route = useRoute()
const router = useRouter()
const name = ref('')

function getEmployee() {
    axios.get('/api/employees/' + route.params.id)
        .then((response) => {
            name.value = response.data.name
        })
        .catch(error => {
            router.push({ path: '/' })
        })
}

function handleSubmit() {
    axios.delete('/api/employees/' + route.params.id)
        .then(response => {
            router.push({ 
                path: '/', 
                query: {
                    success: true,
                    action: 'deleted'
                }})
        })
        .catch(error => {
            console.log(error)
        })
}

onBeforeMount(() => getEmployee())
</script>
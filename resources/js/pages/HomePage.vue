<template>
    <div>
        <Alert v-if="showAlert" :message="alertMessage" />
        <div class="w-full bg-white rounded-md p-5">
            <h2 class="text-xl font-bold">Empleados</h2>
            <div class="flex justify-between items-center">
                <Search @update-after-search="updateAfterSearch" />
                <router-link to="/add"> Agregar </router-link>
            </div>
            <TableEmployees :employees="employees" />
        </div>
    </div>
</template>

<script setup>
import { ref, onBeforeMount, onMounted } from 'vue'
import { useRoute, useRouter } from 'vue-router'

import axios from 'axios'

import Search from '../components/Search.vue';
import TableEmployees from '../components/TableEmployees.vue';
import Alert from '../components/Alert.vue';

const route = useRoute()
const router = useRouter()

const employees = ref([])
const showAlert = ref(false)
const alertMessage = ref('')

onMounted(() => {
    if (route.query.success === 'true') {
        showAlert.value = true

        if (route.query.action === 'added') {
            alertMessage.value = 'Empleado agregado correctamente'
        } else if (route.query.action === 'edited') {
            alertMessage.value = 'Empleado editado correctamente'
        } else if (route.query.action === 'deleted') {
            alertMessage.value = 'Empleado eliminado correctamente'
        }

        setTimeout(() => {
            showAlert.value = false
            alertMessage.value = ''
        }, 3000)
        router.replace({ path: route.path })
    }
})

function getAllEmployees() {
    axios.get('/api/employees').then((response) => { axios
        employees.value = response.data
    });
}

function updateAfterSearch(updated) {
    employees.value = updated
}

function updateAfterStore(inserted) {
    employees.value.push(inserted)
}

onBeforeMount(() => getAllEmployees())
</script>

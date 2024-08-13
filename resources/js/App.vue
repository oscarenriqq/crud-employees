<template>
    <header>
        <NavBar />
    </header>
    <main>
        <div class="max-w-screen-lg mx-auto pt-10">
            <div class="w-full bg-white rounded-md p-5">
                <h2 class="text-xl font-bold">Empleados</h2>
                <div class="flex justify-between items-center">
                    <Search @update-after-search="updateAfterSearch" />
                    <AddEmployeeButton @update-after-store="updateAfterStore" />
                </div>
                <TableEmployees :employees="employees" />
            </div>
        </div>
    </main>
</template>

<script setup>
import { ref, onBeforeMount } from 'vue'

import axios from 'axios'

import NavBar from './components/NavBar.vue';
import Search from './components/Search.vue';
import TableEmployees from './components/TableEmployees.vue';
import AddEmployeeButton from './components/AddEmployeeButton.vue';

const employees = ref([])

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
<template>
    <div>
        <h2 class="text-xl font-bold">Agregar un empleado</h2>
        <form class="pt-5 text-black" @submit.prevent="handleSubmit">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Ingresa el nombre</span>
                </div>
                <input 
                    class="input input-bordered w-full"
                    placeholder="Nombre"
                    v-model="formData.name"
                    required
                />
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Ingresa el correo</span>
                </div>
                <input 
                    class="input input-bordered w-full"
                    placeholder="Correo electrónico"
                    v-model="formData.email"
                    required
                />
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Ingresa el teléfono</span>
                </div>
                <input 
                    class="input input-bordered w-full"
                    placeholder="Teléfono"
                    v-model="formData.phone"
                    required
                />
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Ingresa el País</span>
                </div>
                <select 
                    class="select select-bordered w-full" 
                    v-model="formData.country"
                    required
                >
                    <option value="Panamá">Panamá</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Perú">Perú</option>
                    <option value="España">España</option>
                    <option value="USA">USA</option>
                </select>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Ingresa la posición de trabajo</span>
                </div>
                <input 
                    class="input input-bordered w-full"
                    placeholder="Posición de trabajo"
                    v-model="formData.jobposition"
                    required
                />
            </label>
            <button type="submit" class="btn btn-neutral w-full mt-5"> Guardar</button>
        </form>
    </div>
</template>

<script setup>

import axios from 'axios'
import { useRoute, useRouter } from 'vue-router'
import { ref, onBeforeMount } from 'vue'

const route = useRoute()
const router = useRouter()

const id = route.params.id

const formData = ref({
    name: '',
    email: '',
    phone: '',
    country: '',
    jobposition: '',
})

function getEmployee() {
    axios.get(`/api/employees/${id}`)
        .then(response => {
            formData.value = response.data
        })
}

function handleSubmit() {
    axios.put(`/api/employees/${id}`, formData.value)
        .then(response => {
            router.push({ path: '/', query: { success: true, action: 'edited' } })
        })
        .catch(error => {
            console.log(error)
        })
}

onBeforeMount(() => getEmployee())

</script>
<template>
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

</template>

<script setup>
import { ref, defineEmits } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

const router = useRouter()

const emit = defineEmits(['updateAfterStore'])

const formData = ref({
    name: '',
    email: '',
    phone: '',
    country: '',
    jobposition: '',
})

function handleSubmit() {
    axios.post('/api/employees', formData.value)
        .then(response => {
            router.push({ 
                path: '/',
                query: { 
                    success: true,
                    action: 'added'
                } 
            })
        })
        .catch(error => {
            console.log(error)
        })
}
</script>

<style lang="scss" scoped>

</style>
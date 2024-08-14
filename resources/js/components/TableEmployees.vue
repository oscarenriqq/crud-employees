<template>
    <div>
        <table class="min-w-full text-left text-sm">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>País</th>
                    <th>Posición</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="employee in employees" :key="employee.id">
                    <td>{{ employee.name }}</td>
                    <td>{{ employee.email }}</td>
                    <td>{{ employee.phone }}</td>
                    <td>{{ employee.country }}</td>
                    <td>{{ employee.jobposition }}</td>
                    <td>
                        <div class="flex gap-2 w-auto">
                            <router-link :to="{ 
                                name: 'edit',
                                params: {
                                    id: employee.id
                                } 
                            }" > Editar </router-link>
                            <router-link :to="{ 
                                name: 'delete',
                                params: {
                                    id: employee.id
                                } 
                            }" > Eliminar </router-link>
                            <!-- <RouterLink> Eliminar </RouterLink> -->
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { defineProps } from 'vue'

import { RouterLink } from 'vue-router'

const props = defineProps(['employees'])

</script>
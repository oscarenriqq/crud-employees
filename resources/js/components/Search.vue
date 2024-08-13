<template>
    <input
        type="text" 
        class="w-1/2 h-9 border-2 mt-4 mb-2 rounded pl-2 input-bordered"
        placeholder="Buscar por nombre..."
        v-model="search"
        @input="debouncedInput"
    />
</template>

<script setup>

import { ref, defineEmits } from 'vue'
import { debounce } from 'lodash'

const emit = defineEmits(['updateAfterSearch'])

const search = ref('')

function handleInput() {
    axios.post('/api/employees/search', {
        name: search.value
    })
    .then((response) => {
        emit('updateAfterSearch', response.data)
    })
}

const debouncedInput = debounce(handleInput, 350)

</script>

<style lang="scss" scoped>

</style>
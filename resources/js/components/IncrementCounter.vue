<template>
    <button
      type="button"
      @click="counter++"
      class="bg-slate-600 h-10 w-10"
    >
      Counter is: {{ counter }}
    </button>
  </template>

<script setup>
import { ref } from 'vue'
 
 const counter = ref(0)
</script>
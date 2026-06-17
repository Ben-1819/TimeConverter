<script setup lang="ts">
import { useRouter } from 'vue-router';
import NavigationButton from '@/components/NavigationButton.vue';
import { SidebarProvider, SidebarTrigger } from '@/components/ui/sidebar';
import Sidebar from '@/components/Sidebar.vue';

const router = useRouter();
</script>
<template>
  <SidebarProvider>
    <Sidebar />
    <main class="w-full">
      <div class="flex justify-start">
        <SidebarTrigger />
      </div>
      <div class="flex justify-center">
        <h1 class="text-xl pb-10 text-green-600">Time Converter</h1>
      </div>
      <div class="flex justify-center">
        <div class="grid grid-cols-2 gap-8">
          <NavigationButton>Batch Menu</NavigationButton>
          <NavigationButton>Time Menu</NavigationButton>
          <NavigationButton>All Batches</NavigationButton>
          <NavigationButton>All Times</NavigationButton>
        </div>
      </div>
    </main>
  </SidebarProvider>
</template>

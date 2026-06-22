<script setup lang="ts">
import { useRouter } from 'vue-router';
import { SidebarProvider, SidebarTrigger } from '@/components/ui/sidebar';
import Sidebar from '@/components/Sidebar.vue';
import NavigationButton from '@/components/NavigationButton.vue';

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
        <h1 class="text-xl pb-10 text-green-600">Batch Menu</h1>
      </div>
      <div class="flex justify-center">
        <div class="grid grid-cols-2 gap-8">
          <NavigationButton>All Batches</NavigationButton>
          <NavigationButton>Create Batch</NavigationButton>
        </div>
      </div>
    </main>
  </SidebarProvider>
</template>

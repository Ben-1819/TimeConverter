<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';

import {
  Sidebar,
  SidebarContent,
  SidebarGroup,
  SidebarGroupContent,
  SidebarGroupLabel,
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
  SidebarHeader,
  SidebarFooter,
} from '@/components/ui/sidebar';
import { HomeIcon, NotebookIcon, NotebookPenIcon, ClockIcon } from '@lucide/vue';
import NavigationButton from '@/components/NavigationButton.vue';
import router from '@/router';

interface SidebarItems {
  title: string;
  name: string;
  icon: unknown;
}

const sidebarItems = ref<SidebarItems[]>([
  {
    title: 'Home',
    name: 'Home',
    icon: HomeIcon,
  },
  {
    title: 'Batches',
    name: 'Batches',
    icon: NotebookIcon,
  },
  {
    title: 'Times',
    name: 'Times',
    icon: ClockIcon,
  },
  {
    title: 'Create Batch',
    name: 'CreateBatch',
    icon: NotebookPenIcon,
  },
  {
    title: 'Create Time',
    name: 'CreateTime',
    icon: NotebookPenIcon,
  },
]);
</script>

<template>
  <Sidebar>
    <SidebarHeader>
      <div class="flex justify-center">
        <span class="font-semibold text-green-600">Time Converter</span>
      </div>
    </SidebarHeader>
    <SidebarContent>
      <SidebarGroup>
        <SidebarGroupLabel>Links</SidebarGroupLabel>
      </SidebarGroup>
      <SidebarGroupContent>
        <SidebarMenu>
          <SidebarMenuItem v-for="sidebarItem in sidebarItems" :key="sidebarItem.title">
            <SidebarMenuButton as-child>
              <a @click.prevent="router.push({ name: sidebarItem.name })">
                <component :is="sidebarItem.icon" />
                <span>{{ sidebarItem.title }}</span>
              </a>
            </SidebarMenuButton>
          </SidebarMenuItem>
        </SidebarMenu>
      </SidebarGroupContent>
    </SidebarContent>
    <SidebarFooter>
      <div class="flex justify-center">
        <span class="font-semibold">Might add login/logout later on</span>
      </div>
    </SidebarFooter>
  </Sidebar>
</template>
